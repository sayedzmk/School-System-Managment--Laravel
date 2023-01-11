<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class subject extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name','grade_id','classroom_id','teacher_id'];


    public function grade()
    {
        return $this->belongsTo('App\Models\SchoolGrade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\ClassRooms', 'Classroom_id');
    }

    // جلب اسم المعلم
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
}
