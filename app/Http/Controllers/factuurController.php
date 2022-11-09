<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
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
        $invoices = invoices::with(['invoice_products'])->get();
        $invoice_products = invoiceProducts::all();

        foreach($invoices as $invoice)
        {
            //dump($invoice->invoice_products);
            $invoiceArr = array('invoice_id' => $invoice->id);
            //dump($invoiceArr);
        }


        return view('factuur.list', compact('invoices', 'invoice_products', 'invoiceArr'));
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
        
        $productID = $request->input('product_id');

        $invoice = invoices::create([
            'company_id' => $company_id,
            'company_name' => $company->name,
            'company_street' => $company->street,
            'company_house_number' => $company->HouseNumber,
            'company_city' => $company->city,
            'company_country_code' => $company->CountryCode,
        ]);

        
        foreach($productID as $product_id){
            

            $products = products::all()->where('id', $product_id)->first();
            $amount = $request->input($product_id);

            $productID[] = invoiceProducts::create([
                'invoice_id' => $invoice->id,
                'product_id' => $product_id,
                'product_name' => $products->name,
                'product_price' => $products->price,
                'amount' => $amount,

            ]);

        }


        return redirect('factuur');
    }

    public function doDownloadFactuur($id)
    {
        $invoice = invoices::find($id);
        $invoice_products = invoiceProducts::all()->where('invoice_id', $id);

        $pdf = Pdf::loadView('factuur.pdf', compact('invoice', 'invoice_products',));
        
        return $pdf->download('factuur.pdf');

        // $pathToFile = storage_path('app\factuur\factuur1.pdf');
        
        // return response()->download($pathToFile);
    }

}
