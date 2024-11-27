<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::simplePaginate(8);
        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'category_id' => 'required|not_in:0',
            'ingredient' => 'required',
            'instruction' => 'required',
        ]);

        $recipe = Recipe::create($request->all());
        $recipe->created_by = Auth::id();
        $fileName = time() . '.' . $request->photo->extension();
        // dd($fileName);

        $upload = $request->photo->move(public_path('images/recipe'), $fileName);
        if ($upload) {
            $recipe->photo = "/images/recipe/" . $fileName;
        }

        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::find($id);
        $categories = Category::all();

        return view('recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe = Recipe::find($id);
        // Prepare the data for update
        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $upload = $request->photo->move(public_path('images/recipe/'), $fileName);
            if ($upload) {
                $data['photo'] = "/images/recipe/" . $fileName;
            }
        } else {
            $data['photo'] = $request->old_image;
        }

        $recipe->updated_by = Auth::id();

        // Update the category with the prepared data
        $recipe->update($data);

        return redirect()->route('recipes.index')->with('success', 'Recipe Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->deleted_by = Auth::id();
        $recipe->save();
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe Delete successfully');
    }
}
