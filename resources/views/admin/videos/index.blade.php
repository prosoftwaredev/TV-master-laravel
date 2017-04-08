@extends('admin.king')



@section('content')


	<div class="admin-section-title">
		<div class="row">
			<div class="col-md-8">
				<h3><i class="entypo-video"></i> Videos</h3><a href="{{ URL::to('admin/videos/create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
			</div>
			<div class="col-md-4">
				<form method="get" role="form" class="search-form-full"> <div class="form-group"> <input type="text" class="form-control" value="<?= Input::get('s'); ?>" name="s" id="search-input" placeholder="Search..."> <i class="entypo-search"></i> </div> </form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="panel-body">

		<table class="table table-striped table-flip-scroll cf">
			<thead class="table-header">
			<th>#</th>
			<th>Title</th>
			<th>Url</th>
			<th>Created Date</th>
			</thead>
			<tbody>
			@foreach ($vide as $video)
				<tr>
					<td>
						{{ $video->id }}
					</td>
					<td style="width:10%">
						{{ $video->title }}
					</td>
					<td>
						<p>
							{{ $video->url }}
						</p>
					</td>
					<td>
						<p>
							{{ date('F j, Y', strtotime( $video->created_at)) }}
						</p>
					</td>
					<td>
						<p>
							<a href="{{ route('videos.edit', $video->id) }}" class="btn btn-xs btn-info"> Edit</a>
						</p>
						<div class="album-options">
							{!! Form::open(array('route' => array('videos.destroy', $video->id), 'method' => 'DELETE')) !!}
							{!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-block']) !!}
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{csrf_field()}}
	</div>
@stop

@section('javascript')
	<script>

        $(document).ready(function(){
            var delete_link = '';

            $('.delete').click(function(e){
                e.preventDefault();
                delete_link = $(this).attr('href');
                swal({   title: "Are you sure?",   text: "Do you want to permanantly delete this video?",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){    window.location = delete_link });
                return false;
            });
        });

	</script>

@stop
