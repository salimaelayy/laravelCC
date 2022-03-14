<?php

namespace App\Models;


use App\Models\Like;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'body',
    ];
    
    public function LikedBy(User $user)
    {
        return $this->Likes->contains('user_id',$user->id);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
        
    }
    public function Likes()
    {
        return $this->hasMany(Like::class);
    }
   
   
}
