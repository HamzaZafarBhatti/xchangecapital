<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();
        return view('admin.countries.index', compact('countries'));
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
        $request->validate([
            'name' => ['required', 'string'],
            'is_active' => ['required', 'boolean']
        ]);
        try {
            $data = $request->except('_token');
            Country::create($data);
            Session::flash('success', 'Country added.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Country addition failed.');
        }
        return redirect()->route('admin.countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        $request->validate([
            'name' => ['required', 'string'],
            'is_active' => ['required', 'boolean']
        ]);
        try {
            $country->update([
                'name' => $request->name,
                'is_active' => $request->is_active,
            ]);
            Session::flash('success', 'Country updated.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Country update failed.');
        }
        return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        try {
            $country->delete();
            return back()->with('deleted', 'Country deleted');
        } catch (\Exception $e) {
            return back()->with('error', 'Error! Country delete failed');
        }
    }
}
