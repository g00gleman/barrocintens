<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\rollen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;


class UserController extends Controller
{

public function getuser(){
        $user = User::all();
        $userrollen = rollen::all();
        return view('user.overzicht', compact('user','userrollen'));
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

    User::create([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => Hash::make('123welkom'),
    ]);

    return redirect('/user/overzicht');
        
}

public function getedit()
{

        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $user = User::all()->where('id', $id)->first();


        $userrollen = rollen::all()->where('user_id', $id)->first();
        if($userrollen == null){
            rollen::create([
                'user_id' => $id,
            ]);
            $userrollen = rollen::all()->where('user_id', $id)->first();
        }
        
        return view('user.edit', compact('user','userrollen'));
    
}

public function edit(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email' => [ 'string', 'max:255'],
    ]);

        $url = URL::previous();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];
        
        $user = User::all()->where('id', $id)->first();
        $userrollen = rollen::all()->where('user_id', $id)->first();

        if ($request->Admin == "on"){
            $Admin = 1;
        }
        else {
            $Admin = 0;
        } 

        if ($request->Headfinance == "on"){
            $Headfinance = 1;
        }
        else {
            $Headfinance = 0;
        } 

        if ($request->Finance == "on"){
            $Finance = 1;
        }
        else {
            $Finance = 0;
        } 
        
        if ($request->Headmaintenance == "on"){
            $Headmaintenance = 1;
        }
        else {
            $Headmaintenance = 0;
        } 

        if ($request->Maintenance == "on"){
            $Maintenance = 1;
        }
        else {
            $Maintenance = 0;
        } 

        if ($request->Headsales == "on"){
            $Headsales = 1;
        }
        else {
            $Headsales = 0;
        } 

        if ($request->Sales == "on"){
            $Sales = 1;
        }
        else {
            $Sales = 0;
        } 

        if ($request->Headinkoop == "on"){
            $Headinkoop = 1;
        }
        else {
            $Headinkoop = 0;
        } 

        if ($request->Inkoop == "on"){
            $Inkoop = 1;
        }
        else {
            $Inkoop = 0;
        } 

        if ($request->Klant == "on"){
            $Klant = 1;
        }
        else {
            $Klant = 0;
        } 


        $userrollen = rollen::all()->where('user_id', $id)->first();
        $userrollen->user_id = $id;
        $userrollen->admin = $Admin;   
        $userrollen->head_finance = $Headfinance;  
        $userrollen->finance = $Finance;  
        $userrollen->head_maintenance = $Headmaintenance;  
        $userrollen->maintenance = $Maintenance;  
        $userrollen->head_sales = $Headsales;  
        $userrollen->sales = $Sales;  
        $userrollen->head_inkoop = $Headinkoop; 
        $userrollen->inkoop = $Inkoop;
        $userrollen->klant = $Klant;  
        $userrollen->save();
        

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $user->save();

        if(Auth::user()->id == $id){
            $userrollen = rollen::all()->where('user_id', $id)->first();

            session()->put('admin', $userrollen->admin);
            session()->put('head_finance', $userrollen->head_finance);
            session()->put('finance', $userrollen->finance);
            session()->put('head_maintenance', $userrollen->head_maintenance);
            session()->put('maintenance', $userrollen->maintenance);
            session()->put('head_sales', $userrollen->head_sales);
            session()->put('sales', $userrollen->sales);
            session()->put('head_inkoop', $userrollen->head_inkoop);
            session()->put('inkoop', $userrollen->inkoop);
            session()->put('klant', $userrollen->klant);
        }
        
        return redirect('user/overzicht');

}

public function destroy($id)
{
    $post = User::where('id', $id);
    $post->delete();

    return redirect('user/overzicht');
}

}