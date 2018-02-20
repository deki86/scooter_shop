<?php

namespace App\Http\Controllers\Part;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use App\Part;
use App\PartCategory;
use App\PartSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['show']);
    }
    /**
     * Display a listing of parts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::paginate(20);
        return view('admin.part.listAll', compact('parts'));
    }

    /**
     * Show the form for creating new part.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = PartSubcategory::all();
        $brands = Brand::all();
        $manufacturers = Manufacturer::all();
        return view('admin.part.create', compact('sub', 'brands', 'manufacturers'));
    }

    /**
     * Store a newly created part in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'subcategories_id' => 'required|exists:part_subcategories,id',
            'status' => 'required|in:unavailable,available',
            'quantity' => 'required|digits_between:1,999',
            'brand_id' => 'required|exists:brands,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'price' => 'required|digits_between:1,9999',
            'description' => 'required|min:20|max:500',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $input = $request->all();

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }

        Part::create($input);
        return redirect('parts')->with('status', 'Succesfuly created a new Brand with image.');
    }

    /**
     * Display the specified part.
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
     * Show the form for editing a part.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        $sub = PartSubcategory::all();
        $brands = Brand::all();
        $manufacturers = Manufacturer::all();
        return view('admin.part.edit', compact('part', 'sub', 'brands', 'manufacturers'));
    }

    /**
     * Update the specified part in a database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'subcategories_id' => 'required|exists:part_subcategories,id',
            'status' => 'required|in:unavailable,available',
            'quantity' => 'required|digits_between:1,999',
            'brand_id' => 'required|exists:brands,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'price' => 'required|digits_between:1,9999',
            'description' => 'required|min:20|max:500',
            'image' => 'mimes:jpeg,png,jpg',
        ]);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $path = public_path() . '/images/';
            $image = $part->image;
            //delete old file
            if (file_exists($path . $image)) {
                unlink($path . $image);
            }
            //upload new file
            if ($file = $request->file('image')) {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $input['image'] = $name;
            }
        }

        $part->update($input);
        return redirect('parts')->with('status', 'Succesfuly updated a Part');
    }

    /**
     * Remove the specified part with image from storage.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        //delete image first
        $path = public_path() . '/images/';
        unlink($path . $part->image);

        $part->delete();
        return redirect('parts')->with('status', 'Succesfuly deleted part with image.');
    }
}
