<?php

namespace App\Http\Controllers\Brand;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
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
     * Display a listing of all Brands
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::paginate(10);
        return view('admin.brand.listAll', compact('brand'));
    }

    /**
     * Show the form for creating a new Brand
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created brand in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);
        $input = $request->all();
        Brand::create($input);

        return redirect('brands')->with('status', 'Succesfuly created a new Brand');
    }
    /**
     * Show the form for editing a brand
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the brand in a database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);
        $input = $request->all();
        $brand->update($input);
        return redirect('brands')->with('status', 'Succesfuly updated a Brand');
    }

    /**
     * Remove the specified brand from a database.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('brands')->with('status', 'Succesfuly deleted a Brand from database.');
    }
}
