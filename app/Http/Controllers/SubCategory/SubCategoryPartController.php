<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\PartSubcategory;

class SubCategoryPartController extends Controller
{
    /**
     * Display a listing of the parts resource
     *
     * @return mixed
     */
    public function index(PartSubcategory $subcategory)
    {
        $parts = $subcategory->part()->paginate(9);

        return view('parts', compact('parts', 'sub'));
    }

}
