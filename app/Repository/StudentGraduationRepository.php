<?php

namespace App\Repository;

use App\Models\promotion;
use App\Models\SchoolGrade;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Eloquent\Model;
class StudentGraduationRepository implements StudentGraduationRepositoryInterface
{
    public function index(){
        $students = Student::onlyTrashed()->get();
        return view('pages.Student.Graduation.index',compact('students'));
    }
    public function create(){
        $Grades = SchoolGrade::all();
        return view('pages.Student.Graduation.create',compact('Grades'));

    }

    public function SoftDelete($request)
    {
        $students = student::where('schoolGardes_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', trans('students_trans.There is no data in the students table'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('message.successs'));
        return redirect()->route('Graduated.index');
    }
    public function ReturnData($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('message.successs'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('message.Delete'));
        return redirect()->back();
    }

};

