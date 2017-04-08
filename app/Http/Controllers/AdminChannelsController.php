<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Videos;
use Session;
use Image;
use Storage;
use Mews\Purifier\Facades\Purifier;
use App\Http\Requests;
use Youtube;
use App\ChannelCategory;

class AdminChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$live = Youtube::video(['https://www.youtube.com/watch?v=pCZeVTMEsik']);
        $channels = Channel::orderBy('id', 'desc')->paginate(8);
        return view('admin.channels.index', compact('channels') );
    }

    public function channelData()
    {
        return view('admin.channels.get_data');
    }

    public function getChannels(Request $request)
    {
        if($request->all()){
            $req = $request->all();
            $channelCategories = ChannelCategory::all();
            $channel_url = $req['url'];
            $channel_info = Youtube::channel($channel_url);
            if(!empty((array)$channel_info)){
                $channel_id = $channel_info->__get('id');
                $channel_title = $channel_info->__get('title');
                $channel_description = $channel_info->__get('description');
                $channel_thumb = $channel_info->__get('default_thumb');
                $channel_url = 'https://www.youtube.com/channel/'.$channel_id;
                $channel_data = $channel_info->__get('videos');
                $playlist_id = $channel_info->__get('playlist_uploads');
                $channel_videos = $channel_data->get_videos();
                $playlist = Youtube::playlist('https://www.youtube.com/playlist?list='.$playlist_id)->__get('videos');
                $playlist_videos =$playlist->get_videos();

                foreach ($channel_videos as $key => $video){
                    $publishedAt = $video->snippet['publishedAt'];
                    $publishedAt = date('Y-m-d',strtotime($publishedAt));
                    $month_ago = date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
                    $number_days = (strtotime($publishedAt) - strtotime($month_ago))  / (60 * 60 * 24);
                    if($number_days > 30){
                        unset($channel_videos[$key]);
                    }
                }
               $data = array(
                  'channel_id' =>   $channel_id,
                  'channel_title' =>   $channel_title,
                  'channel_description' =>   $channel_description,
                  'channel_thumb' =>   $channel_thumb,
                  'channel_url' =>   $channel_url,
                  'playlist_id' =>   $playlist_id,
                  'channel_videos' =>   $channel_videos,
                  'playlist_videos' =>   $playlist_videos,
                  'channelCategories' =>   $channelCategories
                );
                $html = view('admin.channels.channel_data', compact('data'));
                echo $html;die;
            }

        }
    }

    /*
     * Create video from admin
     * */
    public function createVideo(Request $request)
    {
        if($request->all()){
            $id = trim($request->id);
            $title = trim($request->title);
            $description = trim($request->description);
            $url = trim($request->url);
            $channel_id = trim($request->channel_id);
            $ch_id = Channel::where('ch_id', '=', $channel_id)->get()->toArray();
            $ch_id = $ch_id[0]['id'];
            $channel_title = trim($request->channel_title);
            $insert_data = array(
              'video_id' => $id,
              'title' => $title,
              'description' => $description,
              'url' => $url,
              'channel_id' => $ch_id,
              'channel_title' => $channel_title
            );
            $insert = Videos::create($insert_data);
            if(!empty($insert)){
                echo 1;die;
            }
//            $title = stripslashes();
        }
    }
    /*
   * Create channwl from admin
   * */
    public function createChannel(Request $request)
    {
        if($request->all()){
            $id = trim($request->id);
            $title = trim($request->channel_title);
            $description = trim($request->channel_description);
            $url = trim($request->channel_url);
            $channel_thumb = trim($request->channel_thumb);
            $channel_category = trim($request->channel_category);
            $insert_data = array(
                'ch_id' => $id,
                'title' => $title,
                'description' => $description,
                'url' => $url,
                'logo' => $channel_thumb,
                'category_id' => $channel_category
            );
            $insert = Channel::create($insert_data);
            if(!empty($insert)){
                echo 1;die;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $channelCategories = ChannelCategory::all();
        return view('admin.channels.create', compact('channelCategories'));
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
            'title'             => 'required|max:255',
            'description'              => 'required',
            'category_id'       => 'required|integer',
            'logo'        => 'sometimes|image'
        ));

        //store in database
        $channel = new Channel;

        $channel->title              = $request->title;
        $channel->description        = Purifier::clean($request->description);
        $channel->category_id        = $request->category_id;

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('assets/images/' . $filename);
            Image::make($image)->resize(800, 500)->save($location);

            $channel->logo = $filename;
        };

        $channel->save();

        Session::flash('success', 'The new channel was successfully added!');

        //redirect
        return redirect()->route('channels.show', $channel->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel = Channel::find($id);
        return view('admin.channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::find($id);
        return view('admin.channels.edit', compact('channel'));
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
            'logo' => 'sometimes|image'

        ));

        //store in database

        $channel = Channel::find($id);

        $channel->title = $request->input('title');
        $channel->description = Purifier::clean($request->input('description'));

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('assets/images/' . $filename);
            Image::make($image)->resize(800, 500)->save($location);

            $channel->logo = $filename;
        };

        $channel->save();

        Session::flash('success', 'Your change was successfully added!');

        //redirect

        return redirect()->route('channels.show', $channel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = Channel::find($id);
        $channel->delete();

        // redirect
        Session::flash('message', 'Channel Successfully deleted!');
        return redirect()->route('channels.index');
    }
}
