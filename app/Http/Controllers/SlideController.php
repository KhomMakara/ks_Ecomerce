<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();

        return view('backend.slide.index',compact('slides'));

    }
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'description' => 'required|max:1000',
           'image' => 'required' 
        ]);

        if($request->file('image')){
            $file = $request->image;
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($file)->resize(990,400)->save('upload/slide_images/'.$name_gen);
            $save_url = 'upload/slide_images/'.$name_gen;
        }
          
            $slides = new Slide();
            $slides->title = $request->title;
            $slides->description = $request->description;
            $slides->image = $save_url;

        $slides->save();

        return redirect()->back()->with('success','Insert Success');


    }
    //edit
    public function edit($id){

        $slides = Slide::find($id);

        return view('backend.slide.edit')->with('slides',$slides);
    }
    //update
    public function update(Request $request,$id){

        $slides = Slide::find($id);
        $slides->title = $request->title;
        $slides->description = $request->description;
        $slides->image= $request->image;
        $slides->save();

        return redirect()->route('slide.index')->with('success','Update successfully');
    }

    //delete
    public function delete($id){
        
        $slides = Slide::where('id',$id)->delete();

        // $old_img = $slides->image;

        // if($old_img){
        //     unlink('storage/slide_images/'.$slides->image);
        // }

        return redirect()->back()->with('success','Deleted successfully');
    }
}
