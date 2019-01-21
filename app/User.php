<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
        'screen_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lends()
    {
        return $this->hasMany('App\Tsuke', 'tsukee_id', 'id');
    }

    public function debts()
    {
        return $this->hasMany('App\Tsuke', 'tsuker_id', 'id');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid', 'bidder_id', 'id');
    }

    public function holdEvents()
    {
        return $this->hasMany('App\Event', 'eventer_id', 'id');
    }

    public function joinEvents()
    {
        return $this->hasManyThrough('App\Event', 'App\Join', 'joiner_id', 'id', 'id', 'event_id');
    }
}
