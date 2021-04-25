<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Model\admin;
session_start();

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')
        ->where('email', $admin_email)
        ->where('password', $admin_password)
        ->first();

        if ($result) 
        {
            $request->session()->put('admin_name', $result->name);
            return redirect('admin/dashboard/all-category');
        }
        else
        {
            $request->session()->flash('errors', 'Tài khoản hoặc mật khẩu không chính xác !');
            return redirect('admin/login');
        } 

    }

    public function admin_login()
    {
        return view('admin-login');
    }

    public function logout()
    {
        Session::put('admin_name', null);
        return Redirect::to('admin/login');
    }

    public function add()
    {
        return "xin chào";
    }
}
