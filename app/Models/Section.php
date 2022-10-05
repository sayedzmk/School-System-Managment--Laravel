<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['name_section'];


    protected $table = 'sections';
    public $timestamps = true;
    protected $fillable=['name_section','schoolgarde_id','class_id'];



    public function classes()
    {
        return $this->belongsTo('App\Models\ClassRooms', 'class_id');
    }
}
