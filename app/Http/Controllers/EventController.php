<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at','DESC')->get();
       return view('backend.pages.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['genres'] = Genre::all();
        $data['venues'] = Venue::all();
        $data['artists'] = Artist::all();
        return view('backend.pages.event.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'genre_id'=>['required'],
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount'=>['required'],
            'date'=>['required'],
            'short_description'=>['required'],
            'artist_id' => ['required'],
            'venue_id'=>['required'],
        ]);

        if($request->file('image'))
        {
            $thumbnail = $request->file('image');
            $imageName = time().'.'.$thumbnail->extension();
            $thumbnail->move(public_path('upload/events/'),$imageName);
        }
        Event::create([
            'title' => $request['title'],
            'genre_id' => $request['genre_id'],
            'artist_id' => $request['artist_id'],
            'image' => $imageName,
            'amount' => $request['amount'],
            'date' => $request['date'],
            'short_description' => $request['short_description'],
            'venue_id' => $request['venue_id'],
        ]);
        return redirect()->route('events.index')->with('success','Events Added');
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
        $event = Event::findOrfail($id);
        $data['genres'] = Genre::all();
        $data['venues'] = Venue::all();
        $data['artists'] = Artist::all();
        return view('backend.pages.event.edit',compact('event','data'));
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
        $event = Event::findOrfail($id);
        $this->validate($request,[
            'title'=>['required'],
            'genre_id'=>['required'],
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount'=>['required'],
            'date'=>['required'],
            'artist_id'=>['required'],
            'short_description'=>['required'],
            'venue_id'=>['required'],
        ]);

        if($request->file('image'))
        {
            $thumbnail = $request->file('image');
            $imageName = time().'.'.$thumbnail->extension();
            $thumbnail->move(public_path('upload/events/'),$imageName);
        }else{
            $imageName = $event->image;
        }
        
        $event->update([
            'title' => $request['title'],
            'genre_id' => $request['genre_id'],
            'image' => $imageName,
            'amount' => $request['amount'],
            'date' => $request['date'],
            'artist_id' => $request['artist_id'],
            'short_description' => $request['short_description'],
            'venue_id' => $request['venue_id'],
        ]);
        return redirect()->route('events.index')->with('success','Events Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrfail($id);
        $event->delete();
        return back()->with('success','Event Deleted!');
    }
}
