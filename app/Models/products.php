<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  products extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product_catogorie()
    {
        return  $this->belongsTo(productCategories::class);
    }
    public function invoice_products()
    {
        return $this->hasMany(InvoiceProducts::class,'product_id');
    }

    public function voorraad()
    {
        return $this->hasMany(voorraad::class,'product_id');
    }

    public function leases_products()
    {
        return $this->hasMany(leasesProducts::class,'product_id');
    }

    public function offerte_products()
    {
        return $this->hasMany(offerteproducts::class,'product_id');
    }
}
