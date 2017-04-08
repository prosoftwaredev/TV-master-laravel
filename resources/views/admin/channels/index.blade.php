@extends('admin.king')

@section('content')
    <div class="row">
        <div class="panel panel-default">

            <h2 class="panel-heading">All Channels</h2>
            <a href="{{ route('videos.create') }}" type="button" class="btn btn-primary">CREATE LIVE TV</a>
            <a href="{{ route('channels.create') }}" type="button" class="btn btn-primary">CREATE NEW CHANNEL</a>
            <a href="/admin/channels/channel_data" type="button" class="btn btn-primary">GET DATA FROM YOUTUBE</a>

            <div class="panel-body">

                <table class="table table-striped table-flip-scroll cf">
                    <thead class="table-header">
                        <th>#</th>
                        <th>Logo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Url</th>
                        <th>Created Date</th>
                    </thead>
                    <tbody>
                    @foreach ($channels as $channel)
                        <tr>
                            <td>
                                {{ $channel->id }}
                            </td>
                            <td>
                                @if (strpos($channel->logo, 'https') !== false)
                                    <img src="{{ $channel->logo}}" alt="" style="max-width: 50px">
                                @else
                                    <img src="{{ asset('assets/images/' . $channel->logo) }}" style="max-width: 60px"  class="img-responsive" alt=""/>
                                @endif
                            </td>
                            <td style="width:10%">
                                {{ $channel->title }}
                            </td>
                            <td valign="bottom">
                                <p>
                                    {{ substr(strip_tags($channel->description), 0, 50 ) }}{{ strlen(strip_tags($channel->description)) > 50 ? "..." : ""  }}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{ $channel->url }}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{ date('F j, Y', strtotime( $channel->created_at)) }}
                                </p>
                            </td>
                            <td>
                                <p>
                                    <a href="{{ route('channels.edit', $channel->id) }}" class="btn btn-xs btn-info"> Edit</a>
                                    <a href="{{ route('channels.show', $channel->id) }}" class="btn btn-xs btn-success delete"> View</a>

                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{csrf_field()}}
            </div>
        </div>
    </div>


@endsection
