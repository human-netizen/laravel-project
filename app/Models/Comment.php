<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'listing_id',
        'parent_id',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function subcomments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
