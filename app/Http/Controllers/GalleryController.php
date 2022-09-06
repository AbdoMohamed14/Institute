<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Gallery_photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('dashboard.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.create');
        
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
            'name'      => 'required|string',
            'name_ar'   => 'required|string',
            'desc'      => 'required|string',
            'desc_ar'   => 'required|string',
        ]);

        Gallery::create([

            'name' => $request->name,
            'name_ar'  => $request->name_ar,
            'desc'   => $request->desc,
            'desc_ar'   => $request->desc_ar,
        ]);

        return redirect(route('dashboard.galleries.index'))->with('message', 'Gallery Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('dashboard.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {

        return view('dashboard.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name'      => 'required|string',
            'name_ar'   => 'required|string',
            'desc'      => 'required|string',
            'desc_ar'   => 'required|string',
        ]);

        Gallery::where('id', $gallery->id)->update([
            'name'    => $request->name,
            'name_ar' => $request->name_ar, 
            'desc'    => $request->desc,
            'desc_ar' => $request->desc_ar,
        ]);

        return redirect()->back()->with('message', 'Gallery Upadeted Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Gallery::destroy($gallery->id);

        return redirect(route('dashboard.galleries.index'))->with('message', 'Gallery Deleted Successfully');
    }


    public function add_photo(Request $request)
    {

        dd($request);
    }





}
