<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','divisions_id','name','email','phone'];
    protected $table = 'mentors';

    public function getMember(){
        return $this->hasMany(Member::class);
    }

    public function getMentor(){
        return $this->hasOne(Division::class);
    }
}
