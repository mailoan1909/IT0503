<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login'); //return login page
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $remember = $request->remember;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->role == 2) {
                return view('home');
            } else {
                return view('admin');
            }
        }
    }

    public function store(Request $request)
    {
        if($request ->isMethod('POST')){
            if($request->hasFile('avatar')){
                $file = $request ->file('avatar');
                $path =public_path('image/avatar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }  else {
                $fileName = 'noname.jpg';
            }
            //Kiểm tra có trùng email hay ko?
            $newUser = DB::table('users')->where('email',$request->email)->first();
            if(!$newUser){
                $newUser = new User();
                $newUser->email = $request->email;
                $newUser->password = $request->password;
                $newUser->name = $request->name;
                $newUser->avatar = $fileName;
                $newUser->role = $request->role;
                $newUser->save();
                return redirect()->route('welcome.login')->with('message', 'Create success');
            }
            else{
                return redirect()->route('welcome.login')->with('message', 'Create fail');
            }

        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome.login');
    }


}
