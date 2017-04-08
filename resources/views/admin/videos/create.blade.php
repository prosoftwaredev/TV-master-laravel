@extends('admin.king')

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link code'
    });

</script>

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="panel-heading">Create {{($data['segment'] == 'videos') ? 'Video' : 'Live'}}</h2>

                <div class="panel-body">

                         <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="channel_id" value=""/>
                                    <div class="form-group">
                                        <label class="form-label" name="title">Title</label>
                                        <div class="controls">
                                            <input type="text" name="title" id="title" class="form-control">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                         <label class="form-label" name="url">Url</label>
                                         <div class="controls">
                                             <input type="text" name="url" id="url" class="form-control">
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <label class="form-label" name="channel_id">Select Channel</label>
                                         <select class="full-width" name="channel_id" >
                                             @foreach ($data['channels'] as $channel)
                                                 <option value="{{$channel->id}}">{{$channel->title}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label class="form-label" name="video_length">Video Length</label>
                                         <div class="controls">
                                             <input type="number" name="video_length" id="video_length" class="form-control">
                                         </div>
                                     </div>

                                    <input type="hidden" name="type" value="{{($data['segment'] == 'videos') ? 'static' : 'live'}}"/>

                                     {{--<div class="form-group">--}}
                                         {{--<label class="form-label full-width" name="channel_id">Start Time</label>--}}
                                         {{--<div id="datetimepicker_start" class="input-append">--}}
                                             {{--<input data-format="hh:mm:ss" type="text" name="start_time" />--}}
                                             {{--<span class="add-on">--}}
                                              {{--<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>--}}
                                             {{--</span>--}}
                                         {{--</div>--}}
                                     {{--</div>--}}
                                     {{--<div class="form-group">--}}
                                         {{--<label class="form-label full-width" name="channel_id">End Time</label>--}}
                                         {{--<div id="datetimepicker_end" class="input-append">--}}
                                             {{--<input data-format="hh:mm:ss" type="text" name="end_time" />--}}
                                             {{--<span class="add-on">--}}
                                                 {{--<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>--}}
                                             {{--</span>--}}
                                         {{--</div>--}}
                                     {{--</div>--}}
                                    <!-- BEGIN HTML5 WYSIWG CONTROLS-->

                                    <div class="form-group">
                                        <div class="grid simple">
                                            <div class="grid-body no-border">
                                                <h4>Description</h4>
                                                <textarea id="description" name="description" placeholder="Enter text ..." class="form-control" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                <!-- END HTML5 WYSIWG CONTROLS-->
                                <div class="col-md-12 m-b-50">
                                    <button type="submit" class="btn btn-lg btn-primary"> ADD </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@stop
