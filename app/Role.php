<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    // public function user() {
    //     return $this->hasMany(User::class);
    // }
    public function user() {
        return $this->hasOne(User::class);
    }
 
}
