<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use URL;
use App\Videos;
use App\Channel;
use Illuminate\Support\Facades\Input;
use Vinelab\Youtube\Video;
use Mews\Purifier\Facades\Purifier;

class AdminVideosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vide = Videos::orderBy('created_at', 'DESC')->paginate(12); 
        return view('admin.videos.index', compact('vide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $prev_url = URL::previous();
        $channels = Channel::all();

        $data['channels'] = $channels;
        $data['prev_url'] = $prev_url;
        $expl = explode('/', $data['prev_url']);
        $data['segment'] = end($expl);
        return view('admin.videos.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'url' => 'required',
            'channel_id' => 'required',
            'type' => 'required'
        ));
        //store in database
        $video = new Videos;

        /* Getting Start and end times */
        $max_end_time = Videos::where(['channel_id' => $request->channel_id])
            ->max('end_time');

        $endTime = strtotime("+$request->video_length minutes", strtotime($max_end_time));
        $endTime = date('H:i:s', $endTime);
        $video->title  = $request->title;
        $video->description = Purifier::clean($request->description);
        $video->url = $request->url;
        $video->type = $request->type;
        $video->start_time = $max_end_time;
        $video->end_time = $endTime;

        $video->channel_id = $request->channel_id;
        if(strpos($request->url, 'watch?v=')){
            $expl = explode('watch?v=', $request->url);
        }else{
            $expl = explode('/', $request->url);
        }
        $video->video_id = end($expl);
        $video->save();

        Session::flash('success', 'The new video was successfully added!');

        //redirect
        return redirect()->route('videos.index');
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
        $video = Videos::find($id);
        return view('admin.videos.edit', compact('video'));
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
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'url' => 'required'
        ));

        //store in database
        $video = Videos::find($id);

        $video->title = $request->input('title');
        $video->description =Purifier::clean($request->input('description'));
        $video->url = $request->input('url');
        $video->start_time = $request->input('start_time');
        $video->end_time = $request->input('end_time');
        $video->save();

        Session::flash('success', 'Your change was successfully added!');

        //redirect

        return redirect()->route('videos.index', $video->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vide = Videos::find($id);
        $vide->delete();

        // redirect
        Session::flash('message', 'video Successfully deleted!');
        return redirect()->route('videos.index');
    }
}
