<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    public function product_catogorie()
    {
        return  $this->belongsTo(ProductCatogorie::class);
    }
    public function invoice_products()
    {
        return $this->hasMany(InvoiceProducts::class,'product_id');
    }
}
