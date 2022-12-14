<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Teacher extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];

    protected $guarded=[];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'specialization_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

        // علاقة بين الاقسام  لجلب  الاقسام التي يشغلها المعلم
    public function sections()
    {

            return $this->belongsToMany('App\Models\Section','teacher_section');

    }

}
