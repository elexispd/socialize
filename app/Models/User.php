<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'username'
    ];

    public function getAuthIdentifierName()
    {
        return 'username'; // Set the column name for the username
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
        return $this->hasOne(UserAvatar::class, 'username', 'username');
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


}
