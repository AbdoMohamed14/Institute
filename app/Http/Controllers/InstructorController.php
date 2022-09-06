<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();

        return view('dashboard.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.instructors.create');
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
            'name'         => 'required|string|min:5|max:50',
            'name_ar'      => 'required|string|min:5|max:50',
            'preif'        => 'required|string',
            'preif_ar'     => 'required|string',
            'desc'         => 'required|string',
            'desc_ar'      => 'required|string',
            'position'     => 'required|string',
            'position_ar'  => 'required|string',
            'image'        => 'required|image',

            
        ]);

        $newPhotoName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('instructor_photos'), $newPhotoName);

        Instructor::create([

            'name'         => $request->name,
            'name_ar'      => $request->name_ar,
            'preif'        => $request->preif,
            'preif_ar'     => $request->preif_ar,
            'desc'         => $request->desc,
            'desc_ar'      => $request->desc_ar,
            'position'     => $request->position,
            'position_ar'  => $request->position_ar,
            'image'        => $newPhotoName,
        ]);

        return redirect(route('dashboard.instructors.index'))->with('message', 'Instructor Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('dashboard.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|string|min:5|max:50',
            'name_ar'      => 'required|string|min:5|max:50',
            'preif'        => 'required|string',
            'preif_ar'     => 'required|string',
            'desc'         => 'required|string',
            'desc_ar'      => 'required|string',
            'position'     => 'required|string',
            'position_ar'  => 'required|string',
            'image'        => 'image',

            
        ]);

        if($request->image)
        {
            $instructor = Instructor::find($id);

            File::delete('instructor_photos/'.$instructor->image);

            $newPhotoName = time() . '-' . $request->name . '.' . $request->image->extension();

            $request->image->move(public_path('instructor_photos'), $newPhotoName);

            Instructor::where('id',$id)->update([

                'name'         => $request->name,
                'name_ar'      => $request->name_ar,
                'preif'        => $request->preif,
                'preif_ar'     => $request->preif_ar,
                'desc'         => $request->desc,
                'desc_ar'      => $request->desc_ar,
                'position'     =>  $request->position,
                'position_ar'  => $request->position_ar,
                'image'        => $newPhotoName,

            ]);
        }else
        {
            Instructor::where('id',$id)->update([

                'name'         => $request->name,
                'name_ar'      => $request->name_ar,
                'preif'        => $request->preif,
                'preif_ar'     => $request->preif_ar,
                'desc'         => $request->desc,
                'desc_ar'      => $request->desc_ar,
                'position'     => $request->position,
                'position_ar'  => $request->position_ar,

            ]);
        }

        return redirect(route('dashboard.instructors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        File::delete('instructor_photos/'.$instructor->image);

        Instructor::destroy($instructor->id);

        return redirect(route('dashboard.instructors.index'));
    }
}
