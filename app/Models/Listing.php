<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'company' , 'location' , 'website' , 'email' , 'description' , 'tags' , 'logo' , 'user_id'];
    
    public function scopeFilter($query ,array $filters){
        if($filters['tags'] ?? false)
        $query->where('tags' , 'like' , '%' . $filters['tags'] . '%');
        if($filters['search'] ?? false)
        $query->where('title' , 'like' , '%' . $filters['search'] . '%')
            ->orWhere('tags' , 'like' , '%' . $filters['search'] . '%')
            ->orWhere('company' , 'like' , '%' . $filters['search'] . '%');            

    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');  // Only retrieves top-level comments
    }
    
    
}
