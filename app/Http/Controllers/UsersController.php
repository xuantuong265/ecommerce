<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\customers;

class UsersController extends Controller
{
    public function listUsers()
    {
        $datas = customers::all();
        return view('admin.users.list-users')->with('datas', $datas);
    }
}
