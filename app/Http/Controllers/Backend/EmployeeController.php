<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
        // $employees = Employee::with('company_name')->latest()->paginate(10);
        $employees = DB::table('employees')->leftJoin('companies', 'companies.id', 'employees.company_id')->select('employees.*', 'companies.name as company_name')->orderBy('id', 'desc')->paginate(10);
        // dd($employees);
        return view('layouts.backend.employee.index', compact('employees'));
    }


    public function create()
    {
        $all_companies = Company::orderBy('id', 'desc')->get();
        //  dd($all_companies);
        return view('layouts.backend.employee.create', compact('all_companies'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $save_employee = new Employee();
        $save_employee->first_name = $request->first_name;
        $save_employee->last_name = $request->last_name;
        $save_employee->company_id = $request->company_id;
        $save_employee->email = $request->email;
        $save_employee->phone = $request->phone;

        $save_employee->save();

        return redirect()->route('employee.index')
            ->with('success', 'Employee created successfully.');
    }


    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $edit_employee = Employee::find($id);
        $all_companies = Company::orderBy('id','desc')->get();

        return view('layouts.backend.employee.edit', compact('edit_employee','all_companies'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $update_employee = Employee::find($id);
        $update_employee->first_name = $request->first_name;
        $update_employee->last_name = $request->last_name;
        $update_employee->company_id = $request->company_id;
        $update_employee->email = $request->email;
        $update_employee->phone = $request->phone;

        $update_employee->update();

        return redirect()->route('employee.index')
            ->with('success', 'Employee Updated successfully.');
    }


    public function destroy($id)
    {
        $delete_employee = Employee::find($id);
        $delete_employee->delete();
        return redirect('/employee')->with('success', 'Employee deleted Successfully');
    }
}
