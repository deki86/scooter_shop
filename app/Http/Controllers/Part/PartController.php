<?php

namespace App\Http\Controllers\Part;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use App\Part;
use App\PartCategory;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        $sub = PartCategory::with('subcategories')->get();
        $brands = Brand::all();
        $manufacturers = Manufacturer::all();

        return view('part', compact('part', 'sub', 'brands', 'manufacturers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        //
    }
}
