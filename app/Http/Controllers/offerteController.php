<?php

namespace App\Http\Controllers;

use App\Models\offerteproducts;
use App\Models\offertes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class offerteController extends Controller
{
    public function get()
    {
        $offerte = offertes::all();
        $offerteproduct = offerteproducts::all();

        return view('offerte.overzicht', compact('offerte','offerteproduct'));
    }

    public function getedit()
    {
        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $offerte = offertes::all()->where('id', $id)->first();

        return view('offerte.edit', compact('offerte'));
    }

    public function storeedit(Request $request)
    {
        $url = URL::previous();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $offerte = offertes::all()->where('id', $id)->first();


        if ($request->input('check')  == "on"){
            $check = 1;
        }
        else {
            $check = 0;
        } 


        $offerte->naam = $request->input('naam');
        $offerte->achternaam = $request->input('achternaam');
        $offerte->bedrijfnaam = $request->input('bedrijfnaam');
        $offerte->email = $request->input('email');
        $offerte->telefoonnummer = $request->input('telefoonnummer');
        $offerte->land = $request->input('land');
        $offerte->stad = $request->input('stad');
        $offerte->straat = $request->input('straat');
        $offerte->huisnummer = $request->input('huisnummer');
        $offerte->check = $check;
        $offerte->save();

        return redirect('offerte/overzicht');

    }
    public function destroy($id)
    {

        $offerte = offertes::all()->where('id', $id)->first();
        $offerteproducts = offerteproducts::all()->where('offerte_id', $offerte->id)->first();

        $offerteproducts->delete();
        $offerte->delete();

        return redirect('offerte/overzicht');
    }

    public function getshow()
    {
        $url = URL::current();
        $parts = Explode('/', $url);
        $id = $parts[count($parts) - 1];

        $offerte = offertes::all()->where('id', $id)->first();

        return view('offerte.show', compact('offerte'));
    }
}
