<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testmonials = Testimonial::all();

        return view('dashboard.testmonials.index', compact('testmonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testmonials.create');
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
            'auther'       => 'required|string|min:5|max:50',
            'auther_ar'    => 'required|string|min:5|max:50',
            'content'      => 'required|string',
            'content_ar'   => 'required|string',
            'image'        => 'required|image',
            
        ]);

        $newPhotoName = time() . '-' . $request->auther . '.' . $request->image->extension();

        $request->image->move(public_path('testmonials_photos'), $newPhotoName);

        Testimonial::create([

            'auther'       => $request->auther,
            'auther_ar'    => $request->auther_ar,
            'content'     => $request->content,
            'content_ar'  => $request->content_ar,
            'image'       => $newPhotoName,

        ]);

        return redirect(route('dashboard.testmonials.index'))->with('message', 'Testmonial Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testmonial)
    {
        return view('dashboard.testmonials.edit', compact('testmonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'auther'       => 'required|string|min:5|max:50',
            'auther_ar'    => 'required|string|min:5|max:50',
            'content'     => 'required|string',
            'content_ar'  => 'required|string',
            'image'       => 'nullable|image',
            
        ]);

        if($request->image)
        {
            $testmonial = Testimonial::find($id);

            File::delete('testmonials_photos/'.$testmonial->image);

            $newPhotoName = time() . '-' . $request->auther . '.' . $request->image->extension();

            $request->image->move(public_path('testmonials_photos'), $newPhotoName);

            Testimonial::where('id',$id)->update([

                'auther'       => $request->auther,
                'auther_ar'    => $request->auther_ar,
                'content'     => $request->content,
                'content_ar'  => $request->content_ar,
                'image'       => $newPhotoName,

            ]);
        }else
        {
            Testimonial::where('id',$id)->update([

                'auther'       => $request->auther,
                'auther_ar'    => $request->auther_ar,
                'content'     => $request->content,
                'content_ar'  => $request->content_ar,

            ]);
        }

        return redirect(route('dashboard.testmonials.index'))->with('message', 'Testmonial Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testmonial)
    {
        File::delete('testmonials_photos/'.$testmonial->image);

        Testimonial::destroy($testmonial->id);

        return redirect()->back()->with('message', 'Testimonial Deleted successfully');
    }
}
