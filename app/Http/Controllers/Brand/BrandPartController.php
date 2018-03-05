<?php

namespace App\Http\Controllers\Brand;

use App\Brand;
use App\Http\Controllers\Controller;

class BrandPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand)
    {

        $parts = $brand->part()->paginate(6);

        return view('parts', compact('parts'));
    }

}
