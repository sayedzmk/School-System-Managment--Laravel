<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $table = 'attendances';
    protected $fillable = [
        'student_id',
        'grade_id',
        'Classroom_id',
        'section_id',
        'teacher_id',
        'attendence_date',
        'attendence_status',
    ];
}
