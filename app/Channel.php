<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{

    protected $fillable = [
        'ch_id', 'title', 'description', 'url', 'logo', 'category_id', 'image'
    ];

    protected $table = 'channels';

    public function videos(){
        return $this->hasMany('App\Videos','channel_id','ch_id');
    }

    public function channelCategory(){

        return $this->belongTo('App\ChannelCategory');
    }

}
