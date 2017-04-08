@extends('admin.king')

@section('content')

        <div class="col-md-8 col-md-offset-2 m-t-50">
                <div class="col-md-9 entry-content">

                    <h1>{{ $channel->title }}</h1>
                    <h4>Created At:</h4>
                    <span class="bold">{{ date('F j, Y', strtotime($channel->created_at)) }}</span>
                    <p class="m-t-20"> {!! $channel->description !!} </p>

                    <div>
                        @if (strpos($channel->logo, 'https') !== false)
                            <img src="{{ $channel->logo}}" alt="" style="max-width: 50px">
                        @else
                            <img src="{{ asset('assets/images/' . $channel->logo) }}" style="max-width: 200px"  class="img-responsive" alt=""/>
                        @endif
                    </div>
                </div>


                <div class="col-md-3 m-t-40">
                    <p>
                        <a href="{{ route('channels.edit', array($channel->id)) }}" class="btn btn-xs btn-info btn-block"> EDIT</a>

                        {!! Form::open(array('route' => array('channels.destroy', $channel->id), 'method' => 'DELETE')) !!}
                        {!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}

                    </p>
                </div>

        </div>

@endsection