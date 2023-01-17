<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategory = SubCategory::all();

        $category = Category::all();
        return view('backend.subcategory.index')->with('subcategory',$subcategory)->with('category',$category);
    }

    public function store(Request $request){
        $request->validate([
            'category_id'  => 'required',
            'subcategory_name'  => 'required',
        ]);

        SubCategory::create([
            'category_id'  => $request->category_id,
            'subcategory_name'  => $request->subcategory_name,
            'subcategory_slug'  => strtolower(str_replace(' ','-',$request->subcategory_name))
        ]);

        return redirect()->back()->with('success','Insert Success');
    }

    //edit
    public function edit($id){
        $category = Category::all();
        $subcategory = SubCategory::find($id);
        return view('backend.subcategory.edit')->with('category',$category)->with('subcategory',$subcategory);
    }

    //update
    public function update(Request $request,$id){
        $request->validate([
            'category_id'  => 'required',
            'subcategory_name'  => 'required',
        ]);

        $subcategory = SubCategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_name = strtolower(str_replace(' ','-',$request->subcategory_name));
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('success','Update Success');
    }
    public function delete($id){
        SubCategory::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Success');
    }
}
