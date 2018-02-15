<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
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
     * Display a listing of all manufacturers resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::paginate(10);
        return view('admin.manufacturer.listAll', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new manufacturer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturer.create');
    }

    /**
     * Store a newly created manufacturer in database.
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
        Manufacturer::create($input);

        return redirect('manufacturers')->with('status', 'Succesfuly created a new Manufecturer.');
    }

    /**
     * Show the form for editing the manufacturer resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified manufacturer in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);
        $input = $request->all();
        $manufacturer->update($input);

        return redirect('manufacturers')->with('status', 'Succesfuly updated manufacturer in database.');
    }

    /**
     * Remove the manufacturer form database.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return redirect('manufacturers')->with('status', 'Succesfuly deleted a manufacturer from database.');
    }
}
