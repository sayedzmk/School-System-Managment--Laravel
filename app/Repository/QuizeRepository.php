<?php

namespace App\Repository;

use App\Models\SchoolGrade;
use App\Models\Quize;
use App\Models\Subject;
use App\Models\Teacher;

class QuizeRepository implements QuizeRepositoryInterface
{

    public function index()
    {
        $quizzes = Quize::get();
        return view('pages.Quize.index', compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = SchoolGrade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quize.create', $data);
    }

    public function store($request)
    {
        try {

            $quizzes = new Quize();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();
            toastr()->success(trans('message.successs'));
            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = Quize::findorFail($id);
        $data['grades'] = SchoolGrade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quize.edit', $data, compact('quizz'));
    }

    public function update($request)
    {
        try {
            $quizz = Quize::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = $request->teacher_id;
            $quizz->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('Quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Quize::destroy($request->id);
            toastr()->error(trans('message.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
