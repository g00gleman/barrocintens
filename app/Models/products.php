<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','product_description','image_path','product_price','category_id'];

    public function product_catogorie()
    {
        return  $this->belongsTo(ProductCatogorie::class);
    }
    public function invoice_products()
    {
        return $this->hasMany(InvoiceProducts::class,'product_id');
    }
}
