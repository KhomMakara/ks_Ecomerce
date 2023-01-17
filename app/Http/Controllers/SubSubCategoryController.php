<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{

    //view all data
    public function index()
    {
        $category = Category::all();
        $subsubcategory = SubSubCategory::all();
        return view('backend.subsubcategory.index')->with('category', $category)->with('subsubcategory', $subsubcategory);
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required',
            'subcategory_id'  => 'required',
            'subsubcategory_name'  => 'required',
        ]);

        SubSubCategory::create([
            'category_id'  => $request->category_id,
            'subcategory_id'  => $request->subcategory_id,
            'subsubcategory_name'  => $request->subsubcategory_name,
            'subsubcategory_slug'  => strtolower(str_replace(' ', '-', $request->subsubcategory_name))
        ]);

        return redirect()->back()->with('success', 'Insert Success');
    }

    //edit
    public function edit($id)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $subsubcategory = SubSubCategory::find($id);
        return view('backend.subsubcategory.edit')
            ->with('subsubcategory', $subsubcategory)
            ->with('category', $category)
            ->with('subcategory', $subcategory);
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'  => 'required',
            'subcategory_id'  => 'required',
            'subsubcategory_name'  => 'required',
        ]);
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->subcategory_id = $request->subcategory_id;
        $subsubcategory->subsubcategory_name = $request->subsubcategory_name;
        $subsubcategory->subsubcategory_slug = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
        $subsubcategory->save();
        return redirect()->route('subsubcategory.index')->with('success', 'Updated Success');
    }

    //delete
    public function delete($id)
    {
        SubSubCategory::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Delete Success');
    }

    public function ajax($category_id)
    {
        $subcategory = SubCategory::where('category_id', $category_id)->get();
        return json_encode($subcategory);
    }
}
