<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('layouts.backend.company.index',compact('companies'));
    }


    public function create()
    {
        return view('layouts.backend.company.create');

    }

 
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $save_company=New Company();
        $save_company->name=$request->name;
        $save_company->email=$request->email;
        $save_company->website=$request->website;
        
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = time() . '.' .$file->getClientOriginalName();
            $file->storeAs('public/',$filename);
            $save_company->logo=$filename;

          }
        $save_company->save();
        // Company::create($request->all());

        return redirect()->route('company.index')
            ->with('success', 'Company created successfully.');
    }

  
   
  
    public function edit($id)
    {
        $edit_company=Company::find($id);
        return view('layouts.backend.company.edit',compact('edit_company'));


    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $update_company=Company::find($id);
        $update_company->name=$request->name;
        $update_company->email=$request->email;
        $update_company->logo=$request->logo;
        $update_company->website=$request->website;
        $update_company->update();

        return redirect()->route('company.index')
            ->with('success', 'Company Updated successfully.');
    }    


 
    public function destroy($id)
    {
        $delete_company=Company::find($id);
        $delete_company->delete();
        return redirect('/company')->with('success','Company deleted Successfully');

    }
}
