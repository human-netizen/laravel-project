<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['is_read' , 'to_id' , 'from_id' , 'battle_id' , 'contest_id' , 'index' , 'problem_name'];
}
