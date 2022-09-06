<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        
        return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

       return view('dashboard.events.create', compact('categories'));
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
            'title'       => 'required|string|min:5|max:50',
            'title_ar'    => 'required|string|min:5|max:50',
            'content'     => 'required|string',
            'content_ar'  => 'required|string',
            'place'       => 'required|string',
            'place_ar'    => 'required|string',
            'category_id' => 'required|integer',
            'image'       => 'required|image',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date'
            
        ]);

        $newPhotoName = time() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('event_photos'), $newPhotoName);

        Event::create([

            'title'       => $request->title,
            'title_ar'    => $request->title_ar,
            'content'     => $request->content,
            'content_ar'  => $request->content_ar,
            'place'       => $request->place,
            'place_ar'    => $request->place_ar,
            'category_id' => $request->category_id,
            'image'       => $newPhotoName,
            'auther_id'   => Auth::user()->id,  
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,

        ]);

        return redirect(route('dashboard.events.index'))->with('message', 'Event Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $events=Event::find($event)->first();
        return view('dashboard.events.show',compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('dashboard.events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|min:5|max:50',
            'title_ar'    => 'required|string|min:5|max:50',
            'content'     => 'required|string',
            'content_ar'  => 'required|string',
            'place'       => 'required|string',
            'place_ar'    => 'required|string',
            'category_id' => 'required|integer',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date', 
            'image'       => 'nullable|image',
            
        ]);

        if($request->image)
        {
            $article = Event::find($id);

            File::delete('event_photos/'.$article->image);

            $newPhotoName = time() . '-' . $request->title . '.' . $request->image->extension();

            $request->image->move(public_path('event_photos'), $newPhotoName);

            Event::where('id',$id)->update([

                'title'       => $request->title,
                'title_ar'    => $request->title_ar,
                'content'     => $request->content,
                'content_ar'  => $request->content_ar,
                'category_id' => $request->category_id,
                'start_date'  => $request->start_date,
                'end_date'    => $request->end_date,
                'image'       => $newPhotoName,
                'auther_id'   => Auth::user()->id,

            ]);
        }else
        {
            Event::where('id',$id)->update([

                'title'       => $request->title,
                'title_ar'    => $request->title_ar,
                'content'     => $request->content,
                'content_ar'  => $request->content_ar,
                'category_id' => $request->category_id,
                'auther_id'   => Auth::user()->id,

            ]);
        }

        return redirect(route('dashboard.events.index'))->with('message', 'Event Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        File::delete('event_photos/'.$event->image);

        Event::destroy($event->id);

        return redirect()->back()->with('message', 'Event Deleted Successfully');
    }
}
