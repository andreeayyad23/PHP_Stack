<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_persons',
        'description',
        'location',
        'user_id',
        'start_date',
        'end_date',
    ];

    // Relationships (if needed)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
