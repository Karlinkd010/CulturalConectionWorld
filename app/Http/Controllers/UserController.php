<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{
    public function index(){

        $users= user::all();

        return view('users.index', compact('users'));
    }

    public function create(Request $request){

        return $request->all();

    }
}
