<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id','mentors_id','members_id','name','deadline','description','status','revision_note'];
    protected $table = 'tasks';

    public function getMember(){
        return $this->belongsTo(Member::class,'members_id');
    }

    public function getMentor(){
        return $this->belongsTo(Mentor::class,'mentors_id');
    }

    public function getPoint(){
        return $this->belongsTo(Point::class);
    }    

    public function getFile(){
        return $this->hasMany(TaskFile::class,'tasks_id');
    }


}
