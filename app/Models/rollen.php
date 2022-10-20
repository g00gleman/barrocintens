<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rollen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin',
        'head_finance',
        'finance',
        'head_maintenance',
        'maintenance',
        'head_sales',
        'sales',
        'head_inkoop',
        'inkoop',
        'klant',
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
