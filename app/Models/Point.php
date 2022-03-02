<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','mentors_id','members_id','tasks_id','point'];
    protected $table = 'points';

    public function getMember(){
        return $this->hasOne(Member::class);
    }

    public function getMentor(){
        return $this->hasOne(Mentor::class);
    }

    public function getTask(){
        return $this->hasOne(Task::class);
    }
}
