<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee_invoice extends Model
{
    // protected $fillable=['invoice_date','shchoolgrade_id','Classroom_id','fee_id','amount','description'];
    public $table = 'fee_invoice';

    public function grade()
    {
        return $this->belongsTo('App\Models\SchoolGrade', 'shchoolgrade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\ClassRooms', 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function fees()
    {
        return $this->belongsTo('App\Models\Fee', 'fee_id');
    }
}
