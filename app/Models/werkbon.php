<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class werkbon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'description',
        'materials',
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
