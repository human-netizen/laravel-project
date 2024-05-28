<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Battle;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'profile_image',
        'cover_photo',
        'hometown',
        'relationship_status',
        'followers_count',
        'following_count',
        'bio',
        'location',
        'job',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function listing()
    {
        return $this->hasMany(Listing::class, 'user_id');
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'to_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function isFollowing($user)
    {
        return $this->following()->where('user_id', $user->id)->exists();
    }
    public function battlesAsUser1()
    {
        return $this->hasMany(Battle::class, 'user1_id');
    }

    public function battlesAsUser2()
    {
        return $this->hasMany(Battle::class, 'user2_id');
    }
    public function likes()
    {
        return $this->belongsToMany(Listing::class, 'likes', 'user_id', 'listing_id')->withTimestamps();
    }

    public function hasLiked($listingId)
    {
        return $this->likes()->where('listing_id', $listingId)->exists();
    }
}
