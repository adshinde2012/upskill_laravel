<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\EmployeeNotifyMail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::join('companies', 'employees.company_id', '=', 'companies.id')->get(['employees.*', 'companies.name']);
        // $employees = DB::table('employees')
        // ->join('companies', 'employees.company_id', '=', 'companies.id')
        // ->select('employees.*', 'companies.name')
        // ->get();
        $companies = Company::all();
        return view('employees', ['employees' => $employees, 'companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('manage_employee', ['companies' => $companies]);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:employees',
            'company_id' => 'required'
        ]);
        Employee::create($request->all());
        $empEmail = $request->email;
        Mail::to($empEmail)->send(new EmployeeNotifyMail());
        return redirect()->route('employees.index')->with('success', 'Employee has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('manage_employee', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:employees,email,' . $id . ',id',
            'company_id' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the company!');
        return redirect()->route('employees.index')->with('success', 'Employee has been deleted successfully');
    }
}
