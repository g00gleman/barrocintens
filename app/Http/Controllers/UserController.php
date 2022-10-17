<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getuser(){
            $user = User::all();
            return view('user.overzicht', compact('user'));
    }

}