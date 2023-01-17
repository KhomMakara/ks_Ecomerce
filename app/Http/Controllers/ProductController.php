<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;

use App\Models\multi_image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    //view all product
    public function index(){
        $product = Product::all();
        return view('backend.product.index')->with('product',$product);
    }
    public function addProduct(){
        $category = Category::all();
        $brand = Brand::all();
        return view('backend.product.create')
        ->with('category',$category)
        ->with('brand',$brand);
    }

    //getSUbcategory by Category
    public function getsubcategory($category_id){
        $subcategoroies = SubCategory::where('category_id',$category_id)->get();
        return json_encode($subcategoroies);
    }

     //getSUbSUbcategory by Category
     public function getsubsubcategory($subcategory){
        $subsubcategories = SubSubCategory::where('subcategory_id',$subcategory)->get();
        return json_encode($subsubcategories);
    }

    //store
    public function store(Request $request){

        $file = $request->product_thumbnail;
        $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($file)->resize(900,1000)->save('upload/product_thumbnail/'.$name_gen);
        $save_url = 'upload/product_thumbnail/'.$name_gen;
        $product_id = Product::insertGetId([
            'brand_id'           => $request->brand_id,
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'subsubcategory_id'  => $request->subsubcategory_id,
            'product_name'       => $request->product_name,
            'product_code'       => $request->product_code,
            'product_color'      => $request->color,
            'product_size'       => $request->size,
            'product_price'      => $request->product_price,
            'product_qty'        => $request->product_qty,
            'discount_price'     => $request->product_discount,
            'short_des'          => $request->sort_des,
            'long_des'           => $request->long_des,
            'specail_offer'      => $request->specail_offer,
            'hot_deals'          => $request->hot_deals,
            'features'           => $request->feature,
            'special_deals'      => $request->special_deal,
            'product_slug'       => strtolower(str_replace(' ','-',$request->product_name)),
            'product_thumbnail'  => $save_url,
            'product_tag'        => $request->tags,
            'status'             => 1,
        ]);

        // $image = $request->file('multi_images');

        foreach($request->multi_images as $multi_image) {

           $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($multi_image)->resize(900,1000)->save('upload/multi_images/'.$name_gen);
            $save_url = 'upload/multi_images/'.$name_gen;

            multi_image::create([
                'product_id'   => $product_id,
                'image_name'   => $save_url
            ]);

        }
            return redirect()->back()->with('success','insert Success');
    }

    //edit
    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();
        $subcategory = SubCategory::all();
        $subsubcategory = SubSubCategory::all();
        $brand = Brand::all();

        $multi = multi_image::where('product_id',$id)->get();


        return view('backend.product.edit',compact('multi','category','subcategory','subsubcategory','brand','product'));

    }

    //update
    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->brand_id  = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_color = $request->color;
        $product->product_size = $request->size;
        $product->product_price = $request->product_price;
        $product->short_des = $request->sort_des;
        $product->long_des = $request->long_des;
        $product->specail_offer = $request->specail_offer;
        $product->hot_deals = $request->hot_deals;
        $product->product_slug    = strtolower(str_replace(' ','-',$request->product_name));
        $product->features = $request->feature;
        $product->special_deals = $request->special_deal;
        $product->product_tag = $request->tags;
        $product->status = 1;
        $product->save();
        return redirect()->route('product.index')->with('success','product Update success');
    }


    //update_thumnbnail
    public function updatethumbnail(Request $request,$id){
        $product = Product::find($id);

        if($request->file('product_thumnbnail')){
            $image = $product->product_thumbnail;
            if($image){
                @unlink($image);
            }
            $file = $request->product_thumnbnail;
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($file)->resize(900,1000)->save('upload/product_thumbnail/'.$name_gen);
            $save_url = 'upload/product_thumbnail/'.$name_gen;

        }
        $product->product_thumbnail = $save_url;


        $product->save();
        return redirect()->back()->with('success','update thumbnail success');
    }

    //update multiple image
    public function updateMulti(Request $request){
        $image = $request->multi;
        foreach($image as $id => $img){
            $multi = multi_image::findorFail($id);
            @unlink($multi->image_name);

            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($img)->resize(900,1000)->save('upload/multi_images/'.$name_gen);
            $save_url = 'upload/multi_images/'.$name_gen;

            multi_image::where('id',$id)->update([
                'image_name'  => $save_url,
                'updated_at'  => Carbon::now(),
            ]);

        }
    }

    public function deleteMul(Request $request){
        $id = $request->id;

        $multi = multi_image::findorFail($id);
        @unlink($multi->image_name);
        $multi->delete();
        return "/product/view";
    }
}

