<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Validator;
use Hash;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

   
    public function store(Request $request)
    {
        
    	$validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'email' => 'required|email|unique:registrations',
            'phone_number' => 'required|numeric|unique:registrations',
            'password' => 'required|confirmed'
        ],

        [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Last Name is required',
            'age.required' => 'Age is required',
            'email.required' => 'Email is required',
            'phone_number.required' => 'Pohne Number is required',
            'password.required' => 'Password is required'
        ]
        
        );

               
        if ($validator->fails()) {
            //pass validator errors as errors object for ajax response
                  return response()->json(['errors'=>$validator->errors()]);
                }
                   
                $register = new Registration();
                $register->fname = $request->fname;
                $register->lname = $request->lname;
                $register->email = $request->email;
                $register->phone_number = $request->phone_number;
                $register->age = $request->age;
                $register->password = Hash::make($request->password);
                $register->save();

                   return response()->json(['success'=>'User has been registered Successfully']);

    }

}
