<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    public function custom_voices()
    {
        return $this->hasMany(CustomVoices::class,'company_id');
    }

    public function maintenance_appointments()
    {
        return $this->hasMany(MaintenanceAppointments::class,'company_id');
    }

    public function notes()
    {
        return $this->hasMany(notes::class,'company_id');
    }

    public function users()
    {
        return  $this->belongsTo(users::class);
    }
}
