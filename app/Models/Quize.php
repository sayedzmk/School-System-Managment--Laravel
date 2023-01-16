<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quize extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }



    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }


    public function grade()
    {
        return $this->belongsTo('App\Models\SchoolGrade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\ClassRooms', 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
