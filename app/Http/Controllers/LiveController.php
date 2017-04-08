<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Videos;
use Session;
use Image;
use Storage;
use App\Http\Requests;
use App\ChannelCategory;
use Carbon\Carbon;
use Faker\Provider\cs_CZ\DateTime;

class LiveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        if($ipaddress == '127.0.0.1'){
            $ipaddress = '73.32.107.88';

        }
        $my_ip = file_get_contents('http://ip-api.com/json/' . $ipaddress);
        $timezone = json_decode($my_ip,true)['timezone'];
        $dt = Carbon::now($timezone);
        $curr_time = $dt->toTimeString();
        $curr_time_decimal = $dt->format('H:00:00');
        $endTime = strtotime("+240 minutes", strtotime($curr_time));
        $endTime = date('H:i:s', $endTime);
        $categories = ChannelCategory::with(['channels'])->get()->toArray();
        foreach ($categories as &$category) {
            foreach ($category['channels'] as &$channel) {
                $channel_id = $channel['id'];
                $videos = Videos::where('channel_id', $channel_id)->orderBy('start_time')->get()->toArray();
                $live_video = Videos::where(['type' => 'live', 'channel_id' => $channel_id])->get()->toArray();
                $start_video = Videos::where(['channel_id' => $channel_id])
                    ->where('end_time', '>=', $curr_time_decimal)
                    ->where('start_time', '<=', $endTime)
                    ->where('created_at', '>=', Carbon::today()->toDateString())
                    ->orderBy('start_time','ASC')
                    ->get()->toArray();
                $channel['videos'] = $start_video;
                $channel['live_video'] = $live_video;
            }
        }
        $data = array(
            'categories' => $categories,
            'curr_time' => $curr_time
        );
        return view('includes/live', compact('data'));


    }
}
