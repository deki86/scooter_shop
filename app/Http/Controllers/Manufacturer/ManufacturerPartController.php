<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Manufacturer;

class ManufacturerPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Manufacturer $manufacturer)
    {
        $parts = $manufacturer->part()->paginate(6);

        return view('parts', compact('parts', 'sub'));
    }

}
