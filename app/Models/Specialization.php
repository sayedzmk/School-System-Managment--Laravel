<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasTranslations;
    public $translatable = ['name'];


    protected $table = 'specializations';
    protected $fillable=['name'];
}
