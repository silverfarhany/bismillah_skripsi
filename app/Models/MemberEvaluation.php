<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEvaluation extends Model
{
    protected $fillable = ['parameter_id','form_id','point'];
    use HasFactory;

    public function parameter(){
        return $this->belongsTo(EvaluationParameter::class,'parameter_id');
    }
}
