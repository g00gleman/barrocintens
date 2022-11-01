<?php

namespace App\Http\Controllers;

use App\Models\invoiceProducts;
use App\Models\invoices;
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

    public function store(Request $request)
    {

        $request->validate([
            'company_id' => 'required',
            'product_id' => 'required'
        ]);
    
        // foreach($invoiceProducts as $invoice_products){

        //     $total_price = '0';

        //     $products = products::all()->where('id', $product_id)->first();

        //     $total_price = ($products->price + $total_price);

        // }

        $company_id = $request->input('company_id');

        $company = companies::all()->where('id', $company_id)->first();   
  

        invoices::create([

            'company_id' => $company_id,
            'company_name' => $company->name,
            'company_street' => $company->street,
            'company_house_number' => $company->HouseNumber,
            'company_city' => $company->city,
            'company_country_code' => $company->CountryCode,
        ]);

        
        foreach($invoiceProducts as $invoice_products){

            $product_id = $request->input('product_id');

            $products = products::all()->where('id', $product_id)->first();

            $invoice_products->invoice_id = $invoice->id;
            $invoice_products->product_id = $product_id;
            $invoice_products->product_name = $products->name;
            $invoice_products->product_price = $products->price;
            $invoice_products->amount = $request->input('amount');

            print_r($invoice_products);

            $invoice_products->save();
        }


        return redirect('factuur');
    }

    public function doDownloadFactuur()
    {
        $pathToFile = storage_path('app\factuur\factuur1.pdf');
        
        return response()->download($pathToFile);
    }

}
