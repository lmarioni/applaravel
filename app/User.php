<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages(){
      return $this->hasMany(Message::class)->orderBy('created_at','desc');
    }

    public function follows(){
      //parametros: clase, foreignkey,relatedid
      // le digo los otros usuarios donde yo soy userid y followed los otros
      //pregunto a quienes sigo
      return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    public function followers(){
      //me devuelve quienes me siguien
      return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }

    public function isFollowing($user){
      return $this->follows->contains($user);
    }

    public function socialProfile(){
      return $this->hasMany(SocialProfile::class);
    }
}
