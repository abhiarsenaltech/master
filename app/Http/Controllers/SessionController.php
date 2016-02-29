<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/8/16
 * Time: 11:08 AM
 */

namespace App\Http\Controllers;


use App\Events\UserRegister;
use App\Listeners\EmailSend;
use App\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Auth;

class SessionController extends Controller
{

    public function create()
    {
        return View::make('auth.login');
    }

    public function store()
    {
//        echo $hash = bcrypt('123456');exit;

        $user = ['email'=>Input::get('email'),'password'=>Input::get('password')];
        if(Auth::attempt($user))
        {
           // dd(Auth::user());
            return Redirect::to('/flyers/create');
        } else {

            Session::flash('message','Enter valid email and password');
            return Redirect::back();
        }
    }
    public function logout(){
        Auth::logout();
        return view('auth.login');
    }
    public function register(){

        return View::make('auth.register');

    }
    public function saveUser(){

        $rules = array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        );
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $name=Input::get('name');
        $email=Input::get('email');
        $password=bcrypt(Input::get('password'));

        $user->name=$name;
        $user->email=$email;
        $user->password=$password;
        if ($user->save()) {
            return redirect('login');

            Session::flash('flash_message', 'Login Here...');

        } else {
            return Redirect::back();
            Session::flash('flash_message', 'There is some Problem in registrationProcess');
        }
    }

}