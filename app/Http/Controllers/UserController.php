<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;   
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Session;

class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user=User::where(['email'=>$req->email])->first();
        
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return redirect()->back()->with('errorMsg',"Current Passowrd is Invalid");
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req)
    {
        $user= new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login')->with('success','Product successfully added.');

    }
    
    public function changePassword(Request $req)
    {
        $userId=Session::get('user')['id'];
        $user = DB::table('users')->where('id', '$userId')->value('password');
        
        return redirect('/');

    }


}
