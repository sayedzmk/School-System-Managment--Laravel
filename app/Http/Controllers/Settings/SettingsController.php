<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
class SettingsController extends Controller
{

    public function index()
    {

        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        // return  $setting;
        return view('pages.settings.index', $setting);
    }


    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        try{
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }


            if($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($request,'logo','logo');
            }

            toastr()->success(trans('message.Update'));
            return back();
        }
        catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }
}
