<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::paginate(10);
        return view('CRM.pages.companies',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('CRM.pages.add-company');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        //
        $company= new Company();
        $company->name=$request['company_name'];
        $company->email=$request['company_email'];
        $company->website=$request['company_website'];
        if ($logo= $request->file('company_logo')){
        $imageUrl= explode('/',Storage::putFile('public/company',$logo));
        $company->logo= last($imageUrl);
        }

        return $company->save()? redirect()->back()->with(['success'=>'Company added successfully']):
            redirect()->back()->with(['fail'=>'Whooops, Something Wrong please try again.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('CRM.pages.edit-company',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $this->validate($request,[
            'company_name'=>'required|string|max:190',
            'company_logo'=>'nullable|image|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100',
            'company_email'=>'nullable|email|max:190',
            'company_website'=>'nullable|url|max:250'
        ]);
        $company->name=$request['company_name'];
        $company->email=$request['company_email'];
        $company->website=$request['company_website'];
        if ($logo= $request->file('company_logo')){
            if ($company->logo) Storage::delete('public/company/'.$company->logo);

            $imageUrl= explode('/',Storage::putFile('public/company',$logo));
            $company->logo= last($imageUrl);
        }

        return $company->update()? redirect()->back()->with(['success'=>'Company updated successfully']):
            redirect()->back()->with(['fail'=>'Whooops, Something Wrong please try again.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        if ($company->logo) Storage::delete('public/company/'.$company->logo);
        return $company->delete()? redirect()->back()->with(['success'=>'Company deleted successfully']):
            redirect()->back()->with(['fail'=>'Whooops, Something Wrong please try again.']);
    }
}
