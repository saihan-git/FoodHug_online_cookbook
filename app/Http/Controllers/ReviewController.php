<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReviewController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recipes = Recipe::with('category')
            ->withAvg('ratings', 'rating')
            ->latest()
            ->take(8)
            ->get();
        return view('frontend.home', compact('categories', 'recipes'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function recipe_items()
    {
        $recipes = Recipe::with('category')
            ->withAvg('ratings', 'rating')
            ->latest()
            ->simplePaginate(12);
        return view('frontend.recipe_items', compact('recipes'));
    }

    public function recipe_search(Request $request)
    {
        $searchName = $request->input('search_name');
        $recipes = Recipe::with('category')
            ->where('name', 'like', '%' . $searchName . '%')
            ->withAvg('ratings', 'rating')
            ->get();
        return view('frontend.recipe_items', compact('recipes'));
    }

    public function filter_category(Request $request, $id)
    {
        $searchName = $request->input('search_name');
        $recipes = Recipe::with('category')
            ->where('category_id', $id)
            ->withAvg('ratings', 'rating')
            ->latest()
            ->simplePaginate(4);
        return view('frontend.recipe_items', compact('recipes'));
    }

    public function profile(Request $request, $id)
    {
        $user = User::find($id);
        return view('frontend.profile', compact('user'));
    }

    public function profileStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required|min:8|confirmed', // Ensure password is confirmed
            'password_confirmation' => 'required|min:8',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role ?? "Admin";
        $user->update();

        return redirect()->route('index')->with('success', 'Update Profile successfully!');
    }

    public function recipe_detail($id)
    {
        $recipe = Recipe::findOrFail($id);
        $reviews = Review::where('recipe_id', $id)->get();
        $starRating = Rating::where('recipe_id', intval($id))->where('created_by', Auth::id())->first();

        return view('frontend.recipedetail', compact('recipe', 'reviews', 'starRating'));
    }

    public function store_review(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new Review();
        $review->recipe_id = $request->input('recipe_id');
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->created_by = Auth::id();
        $review->save();

        return redirect()->route('recipe_detail', ['id' => $id])->with('success', 'Review added successfully!');
    }
}
