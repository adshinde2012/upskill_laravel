<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();
        return view('companies', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_company');
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
        // dd('aniket shinde');
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'website' => 'required|unique:companies'
        ]);
        $input = $request->all();
        if ($image = $request->file('logo')) {
            $destinationPath = storage_path('app/public/img/');
            // dd($image);
            $profileImage = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";
        }
        if (!empty($request->id)) {
            $company = Company::find($request->id);
            $company->update($input);
        } else {
            Company::create($input);
        }
        return redirect()->route('companies.index')->with('success','Company has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //        
        return redirect()->route('dash');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('add_company', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'website' => 'required'
        ]);
        $input = $request->all();
        if ($image = $request->file('logo')) {
            $destinationPath = 'public/img/';
            // dd($image);
            $profileImage = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";
        }
        $company = Company::find($id);
        $company->update($input);
        return redirect()->route('companies.index')->with('success','Company has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = Company::find($id);
        $company->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the company!');
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }
}
