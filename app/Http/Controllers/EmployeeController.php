<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        $employees=Employee::paginate(10);
        return view('CRM.pages.employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies= Company::all();
        return view('CRM.pages.add-employee',compact('companies'));
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
        $this->validate($request,[
            'employee_first_name'=>'required|string|max:190',
            'employee_last_name'=>'required|string|max:190',
            'employee_email'=>'nullable|email|max:190',
            'employee_phone'=>'nullable|numeric|digits:11',
            'employee_company'=>'required|integer',
        ]);


        $company= Company::findOrFail($request['employee_company']);

        $employee= new Employee();
        $employee->first_name=$request['employee_first_name'];
        $employee->last_name=$request['employee_last_name'];
        $employee->email=$request['employee_email'];
        $employee->phone=$request['employee_phone'];
        return $company->employees()->save($employee)? redirect()->back()->with(['success'=>'Employee added successfully']):
            redirect()->back()->with(['fail'=>'Whooops, Something Wrong please try again.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $companies=Company::all();
        return view('CRM.pages.edit-employee',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        //
        $this->validate($request,[
            'employee_first_name'=>'required|string|max:190',
            'employee_last_name'=>'required|string|max:190',
            'employee_email'=>'nullable|email|max:190',
            'employee_phone'=>'nullable|numeric|digits:11',
            'employee_company'=>'required|integer',
        ]);

        $employee->first_name=$request['employee_first_name'];
        $employee->last_name=$request['employee_last_name'];
        $employee->email=$request['employee_email'];
        $employee->phone=$request['employee_phone'];
        $employee->company_id=$request['employee_company'];
        return $employee->update()? redirect()->back()->with(['success'=>'Employee updated successfully']):
            redirect()->back()->with(['fail'=>'Whooops, Something Wrong please try again.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        return $employee->delete()? redirect()->back()->with(['success'=>'Employee deleted successfully']):
            redirect()->back()->with(['fail'=>'Whooops, Something Wrong please try again.']);
    }
}
