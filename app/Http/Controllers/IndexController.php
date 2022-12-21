<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Venue;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['genres'] = Genre::all();
        $data['venues'] = Venue::all();
        $data['events'] = Event::orderBy('created_at')->paginate(20);
        $data['artists']= Artist::all();
       return view('frontend.welcome',compact('data'));
    }
    public function getEvent(Request $request)
    {
        $data['genres'] = Genre::all();
        $data['venues'] = Venue::all();
        $data['artists']= Artist::all();
       $events = Event::where('title', 'like', '%' . $request->title . '%')->paginate(20);
       return view('frontend.pages.events',compact('events','data'));
    }
    public function getAdvancedEvent(Request $request)
    {
        // dd($request->all());
        $data['genres'] = Genre::all();
        $data['venues'] = Venue::all();
        $data['artists']= Artist::all();
        $events = Event::where('artist_id', $request->artist_id)
        ->orWhere('genre_id', $request->genre_id)
        ->orWhere('venue_id', $request->venue_id)
        ->paginate(20);
        return view('frontend.pages.events',compact('events','data'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
