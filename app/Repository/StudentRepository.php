<?php

namespace App\Repository;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolGrade;
use App\Models\TypeBlood;
use App\Models\Religion;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Gender;
use App\Models\Section;
use App\Models\ClassRooms;
class StudentRepository implements StudentRepositoryInterface
{

    public function create_student(){
        $data['school_grade']=SchoolGrade::all();
        $data['parents']=MyParent::all();
        $data['bloods']=TypeBlood::all();
        $data['religion']=Religion::all();
        $data['nationality']=Nationality::all();
        $data['gender']=Gender::all();
        return view('pages.Student.Add_Student',$data);
    }
    public function Get_classrooms($id){

        $list_classes = ClassRooms::where("schoolgarde_id", $id)->pluck("name_class", "id");
        return $list_classes;

    }

    //Get Sections
    public function Get_Sections($id){

        $list_sections = Section::where("class_id", $id)->pluck("name_section", "id");
        return $list_sections;
    }

    public function Store_Student($request){

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->schoolGardes_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success(trans('message.successs'));
            return redirect()->route('student.create');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
