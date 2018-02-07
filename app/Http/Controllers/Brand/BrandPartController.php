<?php

namespace App\Http\Controllers\Brand;

use App\Brand;
use App\Http\Controllers\Controller;
use App\PartCategory;

class BrandPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand)
    {
        $sub = PartCategory::with('subcategories')->get();
        $parts = $brand->part()->paginate(6);

        return view('parts', compact('parts', 'sub'));
    }

}
