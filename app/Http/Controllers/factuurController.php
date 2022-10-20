<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\products;
use App\Models\factuur;
use Illuminate\Http\Request;

class factuurController extends Controller
{
    public function getList()
    {
        return view('factuur.list');
    }

    public function getCreate()
    {
        $company = companies::all();
        $products = products::all();
        return view('factuur.create',compact('company'),compact('products'));
    }

    public function doCreate(Request $request)
    {
        // $request->validate([
        //     'company_id' => 'required',
        //     'product_id' => 'required'
        // ]);
        //     $products = products::all()->where('product_id', $id)->first();
        //     $companies = companies::all()->where('company_id', $id)->first();    

        //     $factuur->contract_id = ('');   
        //     $factuur->user_id = ('klant id');

        //     $products->product_name = $request->input('name');
        //     $products->product_description = $request->input('description');
        //     $products->product_price = $request->input('price');
        //     $products->save();
        //     return redirect('product/overzicht');
    }

    public function doDownloadFactuur()
    {
        $pathToFile = storage_path('app\factuur\factuur1.pdf');
        
        return response()->download($pathToFile);
    }

}
