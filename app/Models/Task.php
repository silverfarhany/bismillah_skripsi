<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','mentors_id','members_id','name','deadline','description','status'];
    protected $table = 'tasks';

    public function getMember(){
        return $this->hasOne(Member::class);
    }

    public function getMentor(){
        return $this->hasOne(Mentor::class);
    }

    public function getPoint(){
        return $this->belongsTo(Point::class);
    }
}
