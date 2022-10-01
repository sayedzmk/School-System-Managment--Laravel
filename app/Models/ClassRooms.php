<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\SchoolGrade;
class ClassRooms extends Model
{

    use HasTranslations;
    public $translatable = ['name_class'];


    protected $table = 'class_rooms';
    public $timestamps = true;
    protected $fillable=['name_class','schoolgarde_id'];



    public function Grades()
    {
        return $this->belongsTo('App\Models\SchoolGrade', 'schoolgarde_id');
    }

}
