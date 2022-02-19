<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','name'];
    protected $table = 'divisions';

    public function getMember(){
        return $this->belongsTo(Member::class);
    }

    public function getMentor(){
        return $this->belongsTo(Mentor::class);
    }
}
