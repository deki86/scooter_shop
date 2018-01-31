<?php

namespace App\Http\Controllers;

use App\Part;
use App\PartCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetching all categories with subcategories
        $sub = PartCategory::with('subcategories')->get();

        // Fetching random parts, display only 12
        $parts = Part::all()->random(12);

        return view('home', compact('sub', 'parts'));
    }
    /**
     * Show about page
     * @return \Iluminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
}
