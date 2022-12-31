<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.index');
    }

    public  function proFile(){
        $users = accounts::all();

        return view('Admin.profile',compact('users'));
    }
}
