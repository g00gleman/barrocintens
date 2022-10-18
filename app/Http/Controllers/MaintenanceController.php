<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\maintenaceAppointments;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function getmaintenance()
    {
        $melding = maintenaceAppointments::all();
        $company = companies::all();
        return view('maintenance.MeldingOverzicht', compact('melding','company'));
    }
}
