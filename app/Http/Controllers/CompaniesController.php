<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompaniesController extends Controller
{
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
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:companies,name,NULL,id,deleted_at,NULL',
            'email' => 'nullable|email:dns',
            'logo' => "nullable|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100",
            'website' => "nullable"
        ]);

        $image_path = null;
        if ($request->file('logo')) {
            $image_path = $request->file('logo')->store('image', 'public');
        }
        $validatedData['logo'] = $image_path;

        Companies::create($validatedData);

        return redirect('dashboard')->with('success', "Successfully added new company!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $company)
    {
        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $company)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', Rule::unique('companies')->ignore($company->id)],
            'email' => 'nullable|email:dns',
            'logo' => "nullable|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100",
            'website' => "nullable"
        ]);

        $image_path = null;
        if ($request->file('logo')) {
            $image_path = $request->file('logo')->store('image', 'public');
        }
        $validatedData['logo'] = $image_path;
        Companies::find($company->id)->update($validatedData);

        return redirect('dashboard')->with('success', "Successfully edited a company!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $company)
    {
        Companies::find($company->id)->delete();

        return redirect('dashboard')->with('success', "Successfully deleted a company!");
    }
}
