<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\voorraad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class voorraadController extends Controller
{

    public function getcreate()
    {
        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $products = products::all()->where('id', $id)->first();
        return view('product.voorraad', compact('products'));
    }

    public function store(Request $request)
    {
        $url = URL::previous();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $products = products::all()->where('id', $id)->first();

        $request->validate([
            'amount' => 'required',
        ]);

        if($request->input('amount') <= 5000){
            $check = 1;
        }else{
            $check = 0;
        }
        voorraad::create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'amount' => $request->input('amount'),
            'check' => $check,                
        ]);

        if($check == 1){
            $totaal = $products->amount + $request->input('amount');
            $products->amount = $totaal;
            $products->save();
        }


        return redirect('/product/overzicht');
    }

    public function getvoorraad()
    {
        
        $voorraad = voorraad::all();
        $product = products::all();
        return view('voorraad.overzicht', compact('voorraad','product'));
    }
    

    public function destroy($id)
    {
        $voorraad = voorraad::all()->where('id', $id)->first();

        if($voorraad->check == 0){

        }else{
            $products = products::all()->where('id', $voorraad->product_id)->first();

            $totaal = $products->amount - $voorraad->amount;
            $products->amount = $totaal;
            $products->save();
        }

        $voorraad->delete();

        return redirect('voorraad/overzicht');
    }

    
    public function getedit()
    {

            $url = URL::current();
            $parts = Explode('/', $url);
            $id = $parts[count($parts) - 1];

            $voorraad = voorraad::all()->where('id', $id)->first();
            $product = products::all()->where('id', $voorraad->product_id)->first();

            return view('voorraad.edit', compact('voorraad','product'));
        
    }

    public function edit(Request $request)
    {

            $url = URL::previous();
            $parts = Explode('/', $url);
            $id = $parts[count($parts) - 1];

            $voorraad = voorraad::all()->where('id', $id)->first();
            $products = products::all()->where('id', $voorraad->product_id)->first();

            if ($request->input('check')  == "on"){
                $check = 1;
            }
            else {
                $check = 0;
            } 
            if($voorraad->check !=$check){
                if($check == 0){
                    $totaalvoor = $products->amount - $voorraad->amount;
                    $products->amount = $totaalvoor;
                    $products->save();
                }else{
                    if($voorraad->check == 1){
                        $totaalvoor = $products->amount - $voorraad->amount;
                        $products->amount = $totaalvoor;
                    }
                    $totaalerna = $products->amount + $request->input('amount') ;
                    $products->amount = $totaalerna;
                    $products->save();
                }
            }

            $voorraad->amount = $request->input('amount');
            $voorraad->check = $check;
            $voorraad->save();
            return redirect('voorraad/overzicht');
        
    }
}
