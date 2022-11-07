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
    public function Get_student()
    {
        $students=Student::all();
        return view('pages.Student.index_student',compact('students'));
    }



    public function create_student(){
        $data['school_grade']=SchoolGrade::all();
        $data['parents']=MyParent::all();
        $data['bloods']=TypeBlood::all();
        $data['religion']=Religion::all();
        $data['nationality']=Nationality::all();
        $data['gender']=Gender::all();
        return view('pages.Student.Add_Student',$data);
    }
    public function Edit_student($id)
    {
        $data['school_grade']=SchoolGrade::all();
        $data['parents']=MyParent::all();
        $data['bloods']=TypeBlood::all();
        $data['religion']=Religion::all();
        $data['nationality']=Nationality::all();
        $data['gender']=Gender::all();
        $Students =  Student::findOrFail($id);
        return view('pages.Student.edit_student',$data,compact('Students'));
    }

    public function update_student($request)
    {
        try {
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->schoolGardes_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
            return redirect()->route('student.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Delete_Student($request)
    {

        Student::destroy($request->id);
        toastr()->error(trans('message.Delete'));
        return redirect()->route('student.index');
    }
}
