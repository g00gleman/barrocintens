<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\maintenaceAppointments;
use App\Models\werkbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function getmaintenance()
    {
        $melding = maintenaceAppointments::all();
        $company = companies::all();
        $werkbon = werkbon::all();
        return view('maintenance.MeldingOverzicht', compact('melding','company','werkbon'));
    }

    public function create()
    {
        $company = companies::all();
        return view('maintenance.create', compact('company'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'description' => 'required',
            'materials' => 'required',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'company_id' => $request->company_id ,
            'description' => $request->description ,
            'materials' => $request->materials ,
        ];
        werkbon::create($data);

        return redirect()->route('maintenance.MeldingOverzicht')->with('success','werkbon has been created successfully.');
    }
}
