<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'tags', 'logo', 'user_id', 'likeCount'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tags'] ?? false)
            $query->where('tags', 'like', '%' . $filters['tags'] . '%');
        if ($filters['search'] ?? false)
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%')
                ->orWhere('company', 'like', '%' . $filters['search'] . '%');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');  // Only retrieves top-level comments
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes', 'listing_id', 'user_id')->withTimestamps();
    }
    public function trendingScore()
    {
        // Define weights
        $likesWeight = 1;
        $commentsWeight = 2;
        $recencyWeight = 3;

        // Calculate factors
        $likes = $this->likeCount;
        $comments = $this->comments()->count();
        $daysSinceCreation = now()->diffInDays($this->created_at) + 1; // Add 1 to avoid division by zero

        // Calculate trending score
        $trendingScore = ($likes * $likesWeight) + ($comments * $commentsWeight) + ($recencyWeight / $daysSinceCreation);

        return $trendingScore;
    }

    public function scopeTrending($query)
    {
        return $query->withCount('comments')
            ->get()
            ->sortByDesc(function ($listing) {
                return $listing->trendingScore();
            });
    }
}
