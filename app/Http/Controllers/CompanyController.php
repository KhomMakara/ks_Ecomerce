<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();

        return view('backend.company.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $companies = new Company();

        $filename = '';
        if($request->hasFile('image')){
            $file = $request->image;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('company_images',$filename);
        }

        $companies->name=$request->name;
        $companies->email=$request->email;
        $companies->address=$request->address;
        $companies->contact=$request->contact;
        $brand->image =    $filename;

        $companies->save();

        return redirect()->back()->with('success', 'The data was successfully inserted into database.');

    }

    public function edit($id)
    {
        $companies = Company::find($id);
        
        return view('backend.company.edit')->with('companies', $companies);
    }
}
