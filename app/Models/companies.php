<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone','street','HouseNumber','city','CountryCode','BkrCheckedAt'];


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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
