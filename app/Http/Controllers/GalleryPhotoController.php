<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Gallery_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallery::all();

        return view('dashboard.gallery_photos.create', compact('galleries'));
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
            'image' => 'required|image',
            'gallery_id' => 'required|integer',

        ]);

        $newPhotoName = time() . '-'  . '.' . $request->image->extension();

        $request->image->move(public_path('galleries_photos'), $newPhotoName);

        Gallery_photo::create([
            
            'image' => $newPhotoName,
            'gallery_id' => $request->gallery_id,
        ]);

        return redirect()->back()->with('message', 'Add Image Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery_photos  $gallery_photos
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery_photo $gallery_photos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery_photos  $gallery_photos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery_photos  $gallery_photos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery_photo $gallery_photos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery_photos  $gallery_photos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery_photo $gallery_photo)
    {
        File::delete('article_photos/'.$gallery_photo->image);

        Gallery_photo::destroy($gallery_photo->id);

        return redirect()->back()->with('message', 'Photo Deleted successfully');
    }



}
