<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'divisions_id', 'name', 'email', 'phone','is_hr'];
    protected $table = 'mentors';
    /*
    public function getMember(){
        return $this->hasMany(Member::class);
    }

    public function getMentor(){
        return $this->hasOne(Division::class);
    }
    */

    public function getDivision()
    {
        return $this->belongsTo(Division::class, 'divisions_id');
    }
}
