<?php

namespace App\Http\Controllers;

use App\Models\invoiceProducts;
use App\Models\invoice;
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
        $request->validate([
            'company_id' => 'required',
            'product_id' => 'required'
        ]);
            
        $company = companies::all()->where('company_id', $id)->first();   
        $invoice = invoice::all()->where('id', $id)->first(); 
        $invoiceProducts = invoiceProducts::all()->where('id', $id)->first();     
            
        $total_price = '0';


        foreach($invoiceProducts as $invoice_products){
            $products = products::all()->where('product_id', $id)->first();

            $total_price = ($products->price + $total_price);

            print $total_price;
        }



        // factuur id auto
        $invoice->contract_id = ('1');   
        $invoice->user_id = ('1'); //klant id

        $invoice->company_id = $request->input('company_id');
        $invoice->company_name = $company->name;
        $invoice->company_street = $company->street;
        $invoice->company_house_number = $company->HouseNumber;
        $invoice->company_city = $company->city;
        $invoice->company_country_code = $company->CountryCode;
        $invoice->total_price = $total_price;
        $invoice->date = ('');

        $invoice->total_price = (''); // foreach alle producten en pak de 

        print_r($invoice);

        $invoice->save();
        
        
        foreach($invoiceProducts as $invoice_products){

            $products = products::all()->where('product_id', $id)->first();

            $invoice_products->invoice_id = $invoice->id;
            $invoice_products->product_id = $request->input('product_id');
            $invoice_products->product_name = $products->name;
            $invoice_products->product_price = $products->price;
            $invoice_products->amount = $request->input('amount');

            print_r($invoice_products);

            $invoice_products->save();
        }



        // return redirect('product/overzicht');
    }

    public function doDownloadFactuur()
    {
        $pathToFile = storage_path('app\factuur\factuur1.pdf');
        
        return response()->download($pathToFile);
    }

}
