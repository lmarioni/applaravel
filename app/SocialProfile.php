<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    public $table = "social_profile";
    protected $guarden = [];
    protected $fillable = [
        'social_id','user_id'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
