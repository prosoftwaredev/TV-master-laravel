
@extends('layouts.queen')

@section('content')

<!---live tv starts here-->
{{csrf_field()}}
            <div class="video-main">
                <div class="video-player">
                    <span>
                        <iframe id="video_iframe" frameborder="0" allowfullscreen title="YouTube video player" width="640" height="360"  showinfo=0
                                src="">
                        </iframe>
                    </span>
                </div>
            </div>
            {{--<div class="jw_container">--}}
                {{--<div id="myElement">Loading the player ...</div>--}}
            {{--</div>--}}

<!---Live tv controls starts here-->

            <div class="mars-guide">
                <div class="guide-pane">
                    <div class="guide-header">
                        <div class="timeline">
                            <div class="left">
                                <span class="range current_time_num"></span>
                            </div>
                            <div class="right">

                                    <input type="hidden" class="custom_timer" value="1" />
                                    <ul class="hours" >
                                        <div class="current-time"></div>
                                        <li class="hour hour_1 active" ><time datetime="7"></time><span></span></li>
                                        <li class="hour hour_2 "><time datetime="8"></time><span></span></li>
                                        <li class="hour hour_3 "><time datetime="9"></time><span></span></li>
                                        <li class="hour hour_4 "><time datetime="10"></time><span></span></li>
                                        <li class="hour hour_5 "><time datetime="11"></time><span></span></li>
                                    </ul>
                                    <span class="to_now"> Now </span>
                            </div>
                        </div>
                    </div>

                    <div class="guide-scroller">
                        <div class="guide-viewport">
                            <div class="lefto">
                                @foreach ($data['categories'] as $category)
                                    @if(!empty($category['channels']))
                                    <div>
                                        <div class="category">{{$category['name']}}</div>
                                        <ul class="listing">
                                            @foreach ($category['channels'] as $channel)
                                                @if(!empty($channel['videos']))
                                                <li class="innactive rowo channel ">
                                                    <div class="channel-info list_channels pull-left">
                                                        <span class="number">{{$channel['id']}}</span>
                                                        <p class="channel-name">
                                                            @if (strpos($channel['logo'], 'https') !== false)
                                                                <img class="channel_logo" src="{{ $channel['logo']}}" alt="" style="max-width: 50px">
                                                            @else
                                                                <img class="channel_logo" src="{{ asset('assets/images/' . $channel['logo']) }}" style="max-width: 60px"  alt=""/>
                                                            @endif
                                                            {{$channel['title']}}</p>
                                                    </div>
                                                    <ul class="queue drag-slider">
                                                        @foreach ($channel['videos'] as $video)
                                                        <li class="innactive episodeo videos_li" data-toggle="" data-placement="bottom" data-content="Inactive Video">
                                                            <span class="inner-timeline video_item">{{$video['title']}}</span>
                                                            <div class="video_info">
                                                                <input type="hidden" class="info_video_id" value="{{$video['video_id']}}">
                                                                <input type="hidden" class="info_video_title" value="{{$video['title']}}">
                                                                <input type="hidden" class="info_video_description" value="{{$video['description']}}">
                                                                <input type="hidden" class="info_video_url" value="{{$video['url']}}">
                                                                <input type="hidden" class="info_video_now" value="{{date('h:i:s')}}">
                                                                <input type="hidden" class="info_video_tstart" value="{{$video['start_time']}}">
                                                                <input type="hidden" class="key_compare" value="{{($data['curr_time'] > $video['start_time'] && $data['curr_time'] < $video['end_time']) ? 'active' : 'chactive' }}" />
                                                                <input type="hidden" class="info_video_tend" value="{{$video['end_time']}}">
                                                                <input type="hidden" class="info_video_time_different" value="{{date('H:i:s',strtotime($video['end_time']) - strtotime($video['start_time'])) }}">
                                                                <input type="hidden" class="info_video_curr_time" value="{{$data['curr_time']}}">
                                                                <input type="hidden" class="active_video_length" value="{{date('H:i:s',strtotime($data['curr_time']) - strtotime($video['start_time'])) }}">
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="video-sidebar hidden-sm hidden-xs">
                <div class="card">
                    <div class="surface">
                        <div class="headerinfo">
                            <div class="channel-name"></div>
                        </div>
                        <div class="contento">
                            <h5 class="episode-title"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!---LIVE TV CONTROLS ENDS HERE-->
@endsection
