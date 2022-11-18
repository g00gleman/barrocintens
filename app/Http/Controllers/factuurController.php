<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\invoiceProducts;
use App\Models\invoices;
use App\Models\companies;
use App\Models\products;
use App\Models\factuur;
use App\Models\User;
use Illuminate\Http\Request;

class factuurController extends Controller
{
    public function getList()
    {
        if(session()->get('klant') == 1){
            //dd(Session()->get('user_id'));
            $user_id = session()->get('user_id');
            $currend_user = User::all()->where('id', '=', $user_id)->first();
            $invoices = invoices::with(['invoice_products'])->get()->where('company_id', '=', $currend_user->company_id);
        }else{
            $invoices = invoices::with(['invoice_products'])->get();
        }
        
        $invoice_products = invoiceProducts::all();
        $product = products::all();

        return view('factuur.list', compact('invoices', 'invoice_products','product'));
    }

    public function getCreate()
    {
        $company = companies::all();
        $products = products::all()->where('is_employee_only','!=','1');
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
        ]);


        foreach($productID as $product_id){


            $products = products::all()->where('id', $product_id)->first();
            $amount = $request->input($product_id);

            $productID[] = invoiceProducts::create([
                'invoice_id' => $invoice->id,
                'product_id' => $product_id,
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
