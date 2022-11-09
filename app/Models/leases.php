<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leases extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function company()
    {
        return  $this->belongsTo(companies::class);
    }
    public function invoice()
    {
        return $this->hasMany(invoice::class,'leases_id');
    }
}
