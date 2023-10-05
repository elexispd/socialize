<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Friendships;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password',
        'username',
        'firstname',
        'lastname',
        'consent',
        'email',
        'about',
        'education',
        'workplace',
        'location',
        'relationship',
        'phone_number',
        'birthday',

    ];

    public function getAuthIdentifierName()
    {
        return 'username'; // Set the column name for the username
    }

    public function getRouteKeyName() {
        return 'username';
    }



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

    /** helper function down here */
    public function getFullname() {
        return $this->firstname . " ". $this->lastname;
    }



    public function avatar()
    {
        return $this->hasOne(UserAvatar::class, 'id', 'user_id');
    }

    public function getAvatar()
    {
        if ($this->avatar) {
            $avatar = $this->avatar;
            $avatarPath = $avatar->profile_photo_path . '/' . $avatar->profile_photo_name;
            return asset($avatarPath);
        } else {
            return asset('useravatar/default.jpg');
        }
    }
    // ...

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
        ->wherePivot('status', 1);
    }


    public function friendsWith()
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
        ->wherePivot('status', 1);
    }

    public function allFriends()
    {
        $this->load('friends', 'friendsWith');

        return $this->friends->merge($this->friendsWith);
    }






    public function allFriendsWithCount()
    {
        $friends = $this->friends->merge($this->friendsWith);

        return $friends->map(function ($friend) {
            $friend->friendCount = $friend->allFriends()->count();
            return $friend;
        });
    }

    public function isFriendWith($friend)
    {
        $allFriends = $this->allFriends()->pluck('id')->toArray();

        $result = in_array($friend->id, $allFriends, true);

        return ($result);
    }



    public function receivedFriendRequest()  {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
               ->wherePivot("status", 0);
    }








}
