<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offerteproducts extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function products()
    {
        return  $this->belongsTo(products::class);
    }

    public function offertes()
    {
        return  $this->belongsTo(offertes::class);
    }
}
