<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceProducts extends Model
{
    use HasFactory;

    public function products()
    {
        return  $this->belongsTo(products::class);
    }
    public function invoices()
    {
        return  $this->belongsTo(invoices::class);
    }
}
