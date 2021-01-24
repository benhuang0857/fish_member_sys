<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashbordController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return view('welcome')->with('USERS', $Users);
    }
}
