<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //get_all_data
    public function index(){
        $brand = Brand::all();
        return view('backend.brand.index')->with('brand',$brand);
    }

    //store
    public function store(Request $request){
        $brand = new Brand();

        $filename = '';
        if($request->hasFile('brand_image')){
            $file = $request->brand_image;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/brand_images',$filename);
        }

        $brand->brand_name = $request->brand_name;
        $brand->brand_slug =  strtolower(str_replace(' ','-',$request->brand_name));
        $brand->brand_image =    $filename;
        $brand->save();
        return redirect()->back()->with('success','Insert Success');
    }

    public function edit($id){
         $brand = Brand::find($id);
         return view('backend.brand.edit')->with('brand',$brand);
    }

    public function update(Request $request,$id){

        $brand = Brand::find($id);
        $brand_img = $brand->brand_image;
       
        $filename = '';
        if($request->hasFile('brand_image')){
            if($brand_img != null){
                unlink('storage/brand_images/'.$brand->brand_image);
            }
            
            $file = $request->brand_image;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/brand_images',$filename);
        }
        else{
            $filename =$brand_img;
        }
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug =  strtolower(str_replace(' ','-',$request->brand_name));
        $brand->brand_image =    $filename;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Updated Success');
    }

    public function delete($id){
        $brand = Brand::find($id);
        $old_img = $brand->brand_image;
        
        if($old_img){
            unlink('storage/brand_images/'.$brand->brand_image);
        }
      
        $brand->delete();
        return redirect()->back()->with('success','delete Success');
    }

  
}
