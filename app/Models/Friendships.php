<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friendships extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function pendingRequests($user_id)
    {
        return $this->where('user_id', $user_id);
    }







}
