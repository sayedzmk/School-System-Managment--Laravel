<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolGrade;
use App\Models\ClassRooms;
use App\Models\Section;
use App\Http\Requests\CreateSections;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = SchoolGrade::with(['Sections'])->get();

        $list_Grades = SchoolGrade::all();

        return view('pages.sections.section',compact('Grades','list_Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSections $request)
    {
        try {
            $validated = $request->validated();
            $section = new Section();

            $section->name_section = ['en' => $request->Name_Section_En, 'ar' => $request->Name_Section_Ar];
            $section->Status=1;
            $section->schoolgarde_id = $request->Grade_id;
            $section->class_id= $request->Class_id;
            $section->save();
            toastr()->success(trans('message.successs'));
            return redirect()->route('section.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getclasses($id)
    {
        $list_classes = ClassRooms::where("schoolgarde_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }
}
