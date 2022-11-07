<?php

namespace App\Http\Controllers;

use App\Models\leases;
use App\Models\companies;
use App\Models\leasesProducts;
use App\Models\products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Input\Input;

class LeaseController extends Controller
{
    public function getcontract()
    {
        $company = companies::all();
        $leases = leases::all();

        $date = leases::all()->first();
        $begindate =0;
        $finalDate = 0;
        foreach($leases as $lease)
        {
            $begindate =$lease->created_at->format('d M Y');
            
            $finalDate = $lease->created_at->addDays($date->duur)->format('d M Y');
        }
        
        return view('leasecontracten.overzicht', compact('leases','company','finalDate','begindate'));
    }

    public function getcreate()
    {
        $company = companies::all();
        $lease = leases::all();
        $products = products::all();

        return view('leasecontracten.create', compact('lease','company','products'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'weken' => 'required_without_all:dagen',
            'dagen' => 'required_without_all:weken',
            'dagen' => 'required'
        ]);

        $request->validate([
            'product_id' => 'required'
        ]);
        
        $leases =leases::create([
            'company_id' => $request->input('selcompany'),
            'weken' => $request->input('weken'),
            'dagen' => $request->input('dagen'),
            'duur' => $request->input('duur'),
            
        ]);
        $productID = $request->input('product_id');

        $totaalprice = 0;
        

        foreach($productID as $product_id){
            
           

            $products = products::all()->where('id', $product_id)->first();
            $amount = $request->input($product_id);

            $productID[] = leasesProducts::create([
                'leases_id' => $leases->id,
                'product_id' => $product_id,
                'product_name' => $products->name,
                'product_price' => $products->price,
                'amount' => $amount,

            ]);

            $price = $products->price * $amount;
            $totaalprice = $totaalprice + $price;
           
        }

        $lease = leases::all()->where('id', $leases->id)->first();
        $lease->total_price = $totaalprice;
        $lease->save();
        return redirect('/leasecontracten/overzicht');
    }

    public function destroy($id)
    {
        $lease = leases::where('id', $id);
        $lease_product = leasesProducts::where('leases_id', $id);
        $lease_product->delete();
        $lease->delete();

        return redirect('leasecontracten/overzicht');
    }

    public function getedit()
    {
            $url = URL::current();
            $parts = Explode('/', $url);
            $id = $parts[count($parts) - 1];

            $lease = leases::all()->where('id', $id)->first();

            return view('leasecontracten.edit', ['lease' => $lease]);
    }

    
    public function edit(Request $request)
    {
        $request->validate([
            'weken' => 'required_without_all:dagen',
            'dagen' => 'required_without_all:weken',
            'dagen' => 'required'
        ]);

            $url = URL::previous();
            $parts = Explode('/', $url);
            $id = $parts[count($parts) - 1];

            $lease = leases::all()->where('id', $id)->first();

            $lease->weken = $request->input('weken');
            $lease->dagen = $request->input('dagen');
            $lease->duur = $request->input('duur');
            $lease->save();
            return redirect('leasecontracten/overzicht');
        
    }
}
