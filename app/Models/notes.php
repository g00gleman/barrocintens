<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'company_id',
        'note',
        'date',
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function company()
    {
        return  $this->belongsTo(companies::class);
    }
}
