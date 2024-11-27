<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'required',
        ]);
        $category = Category::create($request->all());
        $category->created_by = Auth::id();
        $fileName = time() . '.' . $request->photo->extension();
        // dd($fileName);

        $upload = $request->photo->move(public_path('images/category'), $fileName);
        if ($upload) {
            $category->photo = "/images/category/" . $fileName;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
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
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        // Prepare the data for update
        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $upload = $request->photo->move(public_path('images/category/'), $fileName);
            if ($upload) {
                $data['photo'] = "/images/category/" . $fileName;
            }
        } else {
            $data['photo'] = $request->old_image;
        }

        $category->updated_by = Auth::id();

        // Update the category with the prepared data
        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->deleted_by = Auth::id();
        $category->save();
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Delete successfully');
    }
}
