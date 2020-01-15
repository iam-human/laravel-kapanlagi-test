<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $admin = Admin::where('nia',$request->nia)->first();
        if (isset($admin->nia)) {
            if(\Hash::check($request->password, $admin->password)){
                \Session::put('admin',$admin);
                return redirect('admin');
            }else{
                \Session::flash('error', 'NIA / PASSWORD tidak cocok !');    
                return redirect('login');
            }
        }else{
            \Session::flash('error','NIA tidak ditemukan');
            return redirect('login'); 
        }
    }

    public function getLogout(){
        \Session::flush();
        return redirect('login');
    }
}
