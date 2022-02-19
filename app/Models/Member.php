<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','mentors_id','divisions_id','start','end','name',
    'nikp','univ','email','description','phone','cv','internship_letter'];
    protected $table = 'members';

    public function getMember(){
        return $this->hasMany(Member::class);
    }

    public function getMentor(){
        return $this->hasOne(Division::class);
    }
}
