<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leasesProducts extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function products()
    {
        return  $this->belongsTo(products::class);
    }
    public function leasecontracten()
    {
        return  $this->belongsTo(leasecontracten::class);
    }
}
