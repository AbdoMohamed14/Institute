<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider_photos = HomeSlider::all();

       return view('dashboard.settings.index', compact('slider_photos'));
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
    public function store(Request $request)
    {   
        $request->validate([
        'logo'      =>'required|image',
        ]);

        
            $img=$request->img;

            $logo=$request->logo;

            $settings=DB::table('settings')->where('id',1)->select($img)->first();

            if(File::exists(public_path('app/' .$settings->$img))){

            File::delete('app/'.$settings->$img);

            }
            
            $newPhotoName = time() . '-' . $logo->getClientOriginalName() ;
            
            $logo->move(public_path('app'), $newPhotoName);
            
            Setting::where('id', 1)->update([
                $img => $newPhotoName
                ]);
            
            return redirect()->back()->with('success', 'Settings updated successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'      =>'string',
            'name_ar'   =>'string',
            'disc'      =>'string',
            'disc_ar'   =>'string',
            'place'     =>'string',
            'place_ar'  =>'string',
            'num'       =>'string',
            'email'     =>'email',
            'facebook'  =>'string',
            'youtube'   =>'string',
            'home_video'=>'string',
            'twitter'   =>'string',
         ]);
         Setting::where('id', 1)->update([

            'name'       => $request->name,
            'name_ar'    => $request->name_ar,
            'disc'       => $request->disc,
            'disc_ar'    => $request->disc_ar,
            'place'      => $request->place,
            'place_ar'   => $request->place_ar,
            'num'        => $request->num,
            'email'      => $request->email,
            'facebook'   => $request->facebook,
            'youtube'    => $request->youtube,
            'home_video' => $request->home_video,
            'twitter'    => $request->twitter,
        ]);
        
        return redirect()->back()->with('message', 'Settings updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }


    public function addToSlider(Request $request)
    {

        $request->validate([
            'order' => 'required|integer',
            'img'  => 'required|image',
        ]);

        $newPhotoName = time() . '-' . $request->order . '.' . $request->img->extension();

        $request->img->move(public_path('slider_photos'), $newPhotoName);

        HomeSlider::create([
            'order' => $request->order,
            'image'   => $newPhotoName,
        ]);

        return redirect()->back()->with('message', 'Slider Photo Added Succsessfully');
    }


    public function update_slider(Request $request, $id)
    {
        $request->validate([
            'order' => 'required|integer',
        ]);

        HomeSlider::where('id', $id)->update([
            'order' => $request->order
        ]);

        return redirect()->back()->with('message', 'Slider Photo Order Updated Succsessfully');
    }


    public function remove_slider(HomeSlider $id)
    {

        File::delete('slider_photos/'.$id->image);

        HomeSlider::destroy($id->id);

        return redirect()->back()->with('message', 'Slider Photo Deleted Succsessfully');

    }

}
