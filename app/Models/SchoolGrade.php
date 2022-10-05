<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class SchoolGrade extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $table = 'school_gardes';
    protected $fillable=['name','notes'];


    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'schoolgarde_id');
    }
}
