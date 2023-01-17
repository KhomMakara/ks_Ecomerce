<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        // dd($users);
        
        return view('backend.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'nullable',
            'email'=>'',
            'password' => Hash::make($password),
            'phone'=>'required',
            'images'=>'required'
        ]);


        $filename = '';
        if($request->hasFile('images')){
            $file = $request->brand_image;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('user_images',$filename);
        }

        $users = new User();
        $users->name=$request->name;
        $users->email=$request->email;
        $users->phone=$request->phone;
        $users->password=$request->password;
        $users->images = $filename;


        $users->save();

        return redirect()->back()->with('message', 'Successfully inserted');
    }

    // public function create(StoreAdminRequest $request)
    // {
    //     $users = new User();
            
    //         $users->name = $request->name;
    //         $users->email = $request->email;
    //         $users->phone = $request->phone;
    //         $users->password = bcrypt($request->password);
        
    //     $admin->save();

    //     return redirect()->to('/admin/admin')->with('message', 'Successfully Create Admin');
    // }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->images=$request->images;

        $user_img = $users->images;
       
        $filename = '';
        if($request->hasFile('images')){
            if($user_img != null){
                unlink('storage/user_images/'.$users->images);
            }
            
            $file = $request->images;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/user_images',$filename);
        }
        else{
            $filename =$user_img;
        }
        
        $users->name=$request->name;
        $users->email=$request->email;
        $users->password=$request->password;
        $users->phone=$request->phone;
        $users->images =    $filename;

        $users->save();

        return redirect()->back()->with('message', 'Successfully updated.');

    }

    public function edit($id)
    {
        $users = User::find($id);

        return view('backend.user.edit')->with('users', $users);
    }

    public function delete($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect()->back()->with('message', 'Successfully deleted.');
    }
    public function create()
    {
        $users= User::all();

        return view('backend.user.create', compact('users'));
    }

    public function store_create(Request $request)
    {
        $request->validate([
            'name'=>'nullable',
            'email'=>'',
            'password' => 'required',
            'phone'=>'required',
        ]);

        $users = new User();
        $users->name=$request->name;
        $users->email=$request->email;
        $users->phone=$request->phone;
        $users->password = bcrypt($request->password);
  
        $users->save();

        return redirect()->back()->with('message', 'Successfully inserted');
    }

    public function logout()
    {
       Auth::logout();

        return redirect()->to('/login');
    }
}
