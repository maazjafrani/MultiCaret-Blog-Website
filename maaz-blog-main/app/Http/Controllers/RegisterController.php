<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {

            $requestData = $request->all();
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $requestData['image'] = '/storage/' . $path;
        } else {
            $requestData = $request->all();
            $path = '/storage/images/defaultImage.jpg';
            $requestData['image'] = $path;      //add default image if user doesnt select any image


        }

//        $user=User::create($requestData);

        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'email|required|unique:users,email',
            'password' => 'required',
//            'image' => 'required'
        ]);

        $user = User::create($requestData);


        auth()->login($user);    //to login the user before user gets redirected!
        session()->flash('success', 'Your account has been created! ');
        return redirect('/');


//        if($request->hasFile('image')){
//            $filename=$request->image->getClientOriginalName();
//            $request->image->storeAs('images',$filename,'public');
//           auth()->user()->update(['avatar'=>$filename]);
//        }


//        $input = $request->all();
////        $image = $request->image;
////
////        $name = $image->getClientOriginalName();
////        $image->storeAs('public/images', $name);
////        $input['image'] = $name;
//        $user = User::create($input);
//
//


//        $attributes = $request->validate([
//            'name' => 'required|unique:users,name',
//            'email' => 'email|required|unique:users,email',
//            'password' => 'required'
//        ]);


////        $user = User::create($attributes);

//
//        auth()->login($user);    //to login the user before user gets redirected!
//        return redirect('/');


    }
}
