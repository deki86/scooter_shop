<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\PartCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of categories with actions (delete and edit)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partCategory = PartCategory::paginate(10);
        return view('admin.categories.listAll', compact('partCategory'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in a database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
        ]);

        $input = $request->all();
        PartCategory::create($input);

        return redirect('categories')->with('status', 'Succesfuly created new Category');
    }
    /**
     * Show the form for editing a category
     *
     * @param  \App\PartCategory  $partCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PartCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PartCategory  $partCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartCategory $category)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
        ]);
        $input = $request->all();
        $category->update($input);
        return redirect('categories')->with('status', 'Succesfuly updated a Category');
    }

    /**
     * Remove a one category.
     *
     * @param  \App\PartCategory  $partCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartCategory $category)
    {
        $category->delete();

        return redirect('categories')->with('status', 'Succesfuly deleted a Category');
    }
}
