<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $username = Auth()->user()->name;
        $balance = Auth()->user()->balance;
        $id = Auth()->user()->id;
        

        return view('home')->with(['username' => $username, 'balance' => $balance, 'id' => $id]);
    }
}
