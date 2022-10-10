<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    use HasFactory;
    public function users()
    {
        return  $this->belongsTo(users::class);
    }
    public function companies()
    {
        return  $this->belongsTo(companies::class);
    }
}
