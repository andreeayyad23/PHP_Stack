<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_persons',
        'description',
        'location',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'number_of_persons' => 'integer',
        'description' => 'string',
        'location' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
