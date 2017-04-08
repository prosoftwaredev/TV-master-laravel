@extends('admin.king')

@section('content')

    <div class="row">
            <div class="panel panel-default">
                <h2 class="panel-heading">All Posts</h2>
                <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary">CREATE NEW POST</a>

                <div class="panel-body">
                    
                         <table class="table table-striped table-flip-scroll cf">
                            <thead class="table-header">
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created Date</th>
                                <th>image</th>
                                <th>Actions</th>

                            </thead>
                                    <tbody>
                                       @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    {{ $post->id }}
                                                </td>
                                                <td style="width:20%">
                                                    {{ $post->title }}
                                                </td>
                                                <td valign="bottom">
                                                    <p>
                                                        {{ substr(strip_tags($post->body), 0, 50 ) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : ""  }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ date('F j, Y', strtotime( $post->created_at)) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <img src="{{ asset('assets/images/' . $post->image) }}" width="100px" hieght="100px" class="img-responsive" alt=""/>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-info"> Edit</a>
                                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-xs btn-success delete"> View</a>

                                                    </p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        
                                   </tbody>
                            </table>

                                    <div class="text-center">
                                        {!! $posts->links() !!}
                                     </div>
                </div>
            </div>
        </div>


@endsection
