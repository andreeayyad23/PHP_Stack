<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    // Optional: specify the table name if it's different from the plural of the model
    protected $table = 'posts';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    /**
     * Define the relationship with the User model (many-to-many).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
};
