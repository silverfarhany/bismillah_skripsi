<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id','average','predicate','evaluator','date'
    ];

    public function member(){
        return $this->belongsTo(Member::class,'member_id');
    }

    public function mentor(){
        return $this->belongsTo(Mentor::class,'mentor_id');
    }

    public function evaluasi(){
        return $this->hasMany(MemberEvaluation::class,'form_id');
    }
}
