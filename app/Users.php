<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = ['name', 'username', 'password', 'email', 'phone'];

    public function BUildingOwners(){
        return $this->hasMany('App\RoomOwners','owner_id');
    }

    public function BookingsCust(){
        return $this->hasMany('App\Bookings', 'customer_id');
    }

    public function BookingsOwn(){
        return $this->hasMany('App\Bookings', 'owner_id');
    }
}
