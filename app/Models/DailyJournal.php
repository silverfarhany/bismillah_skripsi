<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyJournal extends Model
{
    protected $fillable = ['member_id','date','description','minute','status','approval_at'];
    use HasFactory;

    public function getMember(){
        return $this->belongsTo(Member::class,'member_id');
    }
}
