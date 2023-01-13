<?php


namespace App\Repository;


use App\Models\subject;
use App\Models\SchoolGrade;
use App\Models\Teacher;
class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = subject::get();
        return view('pages.Subject.index',compact('subjects'));
    }

    public function create()
    {
        $grades = SchoolGrade::get();
        $teachers = Teacher::get();
        return view('pages.Subject.create',compact('grades','teachers'));
    }


    public function store($request)
    {
        try {
            $subjects = new subject();
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('message.successs'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){

        $subject =subject::findorfail($id);
        $grades = SchoolGrade::get();
        $teachers = Teacher::get();
        return view('pages.Subject.edit',compact('subject','grades','teachers'));

    }

    public function update($request)
    {
        try {
            $subjects =  Subject::findorfail($request->id);
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->error(trans('message.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
