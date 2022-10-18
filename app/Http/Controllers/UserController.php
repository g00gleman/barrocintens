<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function getuser(){
            $user = User::all();
            return view('user.overzicht', compact('user'));
    }

    public function getcreate()
{
    return view('user.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    ]);

    $user = User::create([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => "123welkom",
    ]);

    return redirect('/user/overzicht');
        
}

public function getedit()
{

        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $user = User::all()->where('id', $id)->first();

        return view('user.edit', ['user' => $user]);
    
}

public function edit(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    ]);

        $url = URL::previous();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];
        
        $user = User::all()->where('id', $id)->first();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $user->save();
        return redirect('user/overzicht');
    
}

public function destroy($id)
{
    $post = User::where('id', $id);
    $post->delete();

    return redirect('user/overzicht');
}
}