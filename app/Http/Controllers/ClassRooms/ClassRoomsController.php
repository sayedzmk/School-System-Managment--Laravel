<?php

namespace App\Http\Controllers\ClassRooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolGrade;
use App\Models\ClassRooms;
use App\Http\Requests\CreateClassesRooms;

class ClassRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $My_Classes = ClassRooms::all();
        $Grades = SchoolGrade::all();
        return view('pages.ClassRooms.classrooms',compact('My_Classes', 'Grades'));
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
    public function store(CreateClassesRooms $request)
    {

        $List_Classes = $request->List_Classes;

        try {
            $validated = $request->validated();

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new ClassRooms();

                $My_Classes->name_class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name_ar']];

                $My_Classes->schoolgarde_id = $List_Class['Grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('message.successs'));
            return redirect()->route('class_rooms.index');
        } catch (\Exception $e) {
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
        try {

            $Classrooms = ClassRooms::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->name_class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Classrooms->schoolgarde_id = $request->Grade_id,
            ]);
            toastr()->success(trans('message.Update'));
            return redirect()->route('class_rooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Classrooms = ClassRooms::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('class_rooms.index');
    }
}
