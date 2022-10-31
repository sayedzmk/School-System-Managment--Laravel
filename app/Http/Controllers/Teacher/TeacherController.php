<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTacherRequest;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        //$Teachers = Teacher::all();
        return view('pages.Teachers.teacher',compact('Teachers'));
    }

    public function create()
    {
            $specializations = $this->Teacher->Getspecialization();
            $genders = $this->Teacher->GetGender();
            return view('pages.Teachers.create_teacher',compact('specializations','genders'));
    }


    public function store(CreateTacherRequest $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.edit_teacher',compact('Teachers','specializations','genders'));
    }


    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
