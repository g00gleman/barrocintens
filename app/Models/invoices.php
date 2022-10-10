<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;
    public function companies()
    {
        return  $this->belongsTo(companies::class);
    }
    public function invoice_products()
    {
        return $this->hasMany(InvoiceProducts::class,'invoice_id');
    }
}
