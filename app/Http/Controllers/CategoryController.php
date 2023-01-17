<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('backend.category.index')->with('category',$category);
    }

    //store
    public function store(Request $request){
        $request->validate([
            'category_name'  => 'required',
            'category_icon'  => 'required',
        ]);

        Category::create([
            'category_name'  => $request->category_name,
            'category_icon'  => $request->category_icon,
            'category_slug'  => strtolower(str_replace(' ','-',$request->category_name))
        ]);

        return redirect()->back()->with('success','Insert Success');
       
    }

    //edit
    public function edit($id){
        $category = Category::find($id);
        return view('backend.category.edit')->with('category',$category);
    }

    //update
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_icon = $request->category_icon;
        $category->category_slug = strtolower(str_replace(' ','-',$request->category_name));
        $category->save();
        return redirect()->route('category.index')->with('success','update Success');;
    }

    //delete
    public function delete($id){
        
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','deleted Success');
    }
}
