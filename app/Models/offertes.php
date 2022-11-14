<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offertes extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function offerteproducts()
    {
        return $this->hasMany(offerteproducts::class,'offerte_id');
    }
}
