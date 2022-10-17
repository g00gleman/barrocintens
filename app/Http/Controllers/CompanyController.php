<?php

namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CompanyController extends Controller
{
    public function getcompany(){
        $company = companies::all();
        return view('company.overzicht', compact('company'));
}

public function getcreate()
{
    return view('company.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'street' => 'required',
        'city' => 'required',
        'HouseNumber' => 'required',
        'CountryCode' => 'required',
        'date' => 'required',
    ]);

    companies::create([
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'street' => $request->input('street'),
        'city' => $request->input('city'),
        'HouseNumber' => $request->input('HouseNumber'),
        'CountryCode' => $request->input('CountryCode'),
        'BkrCheckedAt' => $request->date,

    ]);
    return redirect('/company/overzicht');
        
}

public function getedit()
{

        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $company = companies::all()->where('id', $id)->first();

        return view('company.edit', ['company' => $company]);
    
}

public function edit(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'street' => 'required',
        'city' => 'required',
        'HouseNumber' => 'required',
        'CountryCode' => 'required',
        'date' => 'required',
    ]);

        $url = URL::previous();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];
        
        $company = companies::all()->where('id', $id)->first();

        $company->name = $request->input('name');
        $company->phone = $request->input('phone');
        $company->street = $request->input('street');
        $company->city = $request->input('city');
        $company->HouseNumber = $request->input('HouseNumber');
        $company->CountryCode = $request->input('CountryCode');
        $company->BkrCheckedAt = $request->date;


        $company->save();
        return redirect('company/overzicht');
    
}

public function destroy($id)
{
    $post = companies::where('id', $id);
    $post->delete();

    return redirect('company/overzicht');
}
}
