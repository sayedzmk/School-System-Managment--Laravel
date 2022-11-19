<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded=[];


    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // علاقة بين ادارة الترقيات  والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات
    public function f_SchoolGrade()
    {
        return $this->belongsTo('App\Models\SchoolGrade', 'from_shchoolgrade');
    }

    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function f_classroom()
    {
        return $this->belongsTo('App\Models\ClassRooms', 'from_Classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }

    public function to_SchoolGrade()
    {
        return $this->belongsTo('App\Models\SchoolGrade', 'to_shchoolgrade');
    }
    public function to_classroom()
    {
        return $this->belongsTo('App\Models\ClassRooms', 'to_Classroom');
    }

    public function to_Section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }
}
