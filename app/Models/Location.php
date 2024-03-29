<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function job () {
        return $this->hasMany(Job::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }
}
