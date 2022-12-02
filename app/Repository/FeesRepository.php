<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\SchoolGrade;

class FeesRepository implements FeesRepositoryInterface
{
    public function index(){
        $fees = Fee::all();
        $Grades = SchoolGrade::all();
        return view('pages.Accounts.index',compact('fees','Grades'));

    }

    public function create(){
        $Grades = SchoolGrade::all();
        return view('pages.Accounts.add',compact('Grades'));

    }

    public function edit($id){

        $fee = Fee::findorfail($id);
        $Grades = SchoolGrade::all();
        return view('pages.Accounts.edit',compact('fee','Grades'));

    }

    public function store($request){
        try {

            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->shchoolgrade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->save();
            toastr()->success(trans('message.successs'));
            return redirect()->route('fees.index');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->shchoolgrade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function destroy($request)
        {
            try {
                Fee::destroy($request->id);
                toastr()->error(trans('message.Delete'));
                return redirect()->back();
            }

            catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }

}
