<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenaceAppointments extends Model
{
    use HasFactory;
    public function companies()
    {
        return  $this->belongsTo(companies::class);
    }
}
