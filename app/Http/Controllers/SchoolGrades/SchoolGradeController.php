<?php

namespace App\Http\Controllers\SchoolGrades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolGrade;
use App\Http\Requests\CreateSchoolGrade;

class SchoolGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $schoolgrade=SchoolGrade::all();
        return view('pages.schoolgrages.school_grade')->with('grade',$schoolgrade);
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
    public function store(CreateSchoolGrade $request)
    {
        try {
            $validated = $request->validated();
            $Grade = new SchoolGrade();
            /*
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */
            $Grade->name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->notes = $request->Notes;
            $Grade->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('school_garde.index');
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
    public function update(CreateSchoolGrade $request)
    {
        try {
            $validated = $request->validated();
            $Grade = SchoolGrade::findOrfail($request->id);

            $Grade->update([
                $Grade->name = ['en' => $request->Name_en, 'ar' => $request->Name],
                $Grade->notes = $request->Notes
            ]);
            toastr()->success(trans('message.Update'));
            return redirect()->route('school_garde.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Grade = SchoolGrade::findOrfail($request->id)->delete();
        toastr()->error(trans('message.Delete'));
        return redirect()->route('school_garde.index');
    }
}
