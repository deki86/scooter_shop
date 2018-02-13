<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\PartCategory;
use App\PartSubcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
     * Display a listing of subcategories in table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = PartSubcategory::paginate(10);
        return view('admin.subcategories.listAll', compact('subCategories'));
    }

    /**
     * Show the form for creating a new subcategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = PartCategory::all();
        return view('admin.subcategories.create', compact('category'));

    }

    /**
     * Store a newly created subcategory in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'categories_id' => 'required|exists:part_categories,id',
        ]);

        $input = $request->all();
        PartSubcategory::create($input);

        return redirect('subcategories')->with('status', 'Succesfuly created new SubCategory');

    }

    /**
     * Show the form for editing the subcategory resource.
     *
     * @param  \App\PartSubcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PartSubcategory $subcategory)
    {
        $category = PartCategory::all();
        return view('admin.subcategories.edit', compact('subcategory', 'category'));
    }

    /**
     * Update a subcategory resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PartSubcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartSubcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'categories_id' => 'required|exists:part_categories,id',
        ]);

        $input = $request->all();
        $subcategory->update($input);
        return redirect('subcategories')->with('status', 'Succesfuly updated a SubCategory');

    }

    /**
     * Remove a subcategory from database.
     *
     * @param  \App\PartSubcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartSubcategory $subcategory)
    {
        $subcategory->delete();
        return redirect('subcategories')->with('status', 'Succesfuly deleted a Subcategory');
    }
}
