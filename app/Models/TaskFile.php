<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFile extends Model
{
    protected $fillable = ['tasks_id','file','upload_date'];
    use HasFactory;

    public function Task(){
        return $this->belongsTo(Task::class,'tasks_id');
    }
}
