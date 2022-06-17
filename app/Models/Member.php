<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'mentors_id', 'divisions_id', 'start', 'end', 'name',
        'nikp', 'univ', 'email', 'description', 'phone', 'cv', 'internship_letter', 'transcripts', 'submission_status', 'is_aktif', 'activate_number'
    ];
    protected $table = 'members';

    // public function getMember()
    // {
    //     return $this->hasMany(Member::class);
    // }

    public function getDivision()
    {
        return $this->belongsTo(Division::class, 'divisions_id');
    }

    public function getMentor()
    {
        return $this->belongsTo(Mentor::class, 'mentors_id');
    }

    public function getTask()
    {
        return $this->hasMany(Task::class,'members_id');
    }

    public function getPresensi()
    {
        return $this->hasMany(Presence::class, 'members_id');
    }

    public function formEvaluation(){
        return $this->hasOne(FormEvaluation::class,'member_id');
    }

    public function certificate(){
        return $this->hasOne(Certificate::class,'member_id');
    }
}
