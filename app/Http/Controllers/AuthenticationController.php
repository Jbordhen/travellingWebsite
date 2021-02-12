<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    public function login(){

        $rules=array(
            'email'=>'required|email',
            'password'=>'required|alphanum|min:6',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            /*if(User::find($userdata)==true){
                return redirect('/home');
            }*/

            if(Auth::attempt($userdata)){
                return redirect('/home');
            }
            else{
                return redirect('/');
            }

        }

    }

    public function signup(){

        $this->validate(request(),[
            'userName'=>'required|alphanum|min:3|max:50',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'phoneNo'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $data=request(['userName','email','password','phoneNo']);
        $data['password']=Hash::make(request('password'), [
            'rounds' => 12
        ]);
        $user=User::create($data);
        auth()->login($user);
        return redirect('/home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}