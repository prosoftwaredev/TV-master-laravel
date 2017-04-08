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
                <h2 class="panel-heading">Create Channels</h2>

                <div class="panel-body">

                    <form action="{{ route('channels.store') }}" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="grid simple">
                                <div class="grid-title no-border">
                                    <h4>Channel <span class="semi-bold">Logo</span></h4>
                                </div>
                                <div class="grid-body no-border">
                                    <div class="row-fluid">
                                        <div class="fallback">
                                            <input name="logo" type="file"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" name="category_id">Select Category</label>
                            <select class="full-width" name="category_id" >
                                @foreach ($channelCategories as $channelCategory)
                                    <option value="{{$channelCategory->id}}">{{$channelCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" name="title">Title</label>
                            <div class="controls">
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>

                        <br/>
                        <!-- BEGIN HTML5 WYSIWG CONTROLS-->

                        <div class="form-group">
                            <div class="grid simple">

                                <div class="grid-body no-border">
                                    <h3>Channels <span class="semi-bold">Description</span></h3>
                                    <textarea id="description" name="description" placeholder="Enter text ..." class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- END HTML5 WYSIWG CONTROLS-->
                        <div class="col-md-12 m-b-50">
                            <button type ="submit" class="btn btn-lg btn-primary"> ADD NEW CHANNEL </button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}" />
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
