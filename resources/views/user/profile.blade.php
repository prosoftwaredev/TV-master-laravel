@extends('layouts.queen')

@section('content')


           <div class="col-xs-12 col-md-4 left-feild">
                <div class="be-user-block style-3">
						<div class="be-user-detail">
							<a class="be-ava-user style-2" href="page1.html">
								<img src="{{ Storage::url($user->avatar)}}" width="115px" height="115px" style="border-radius:50px" alt=""> 
							</a>
							<a class="be-ava-left btn btn-primary" href=""><i class="fa fa-pencil"></i>Edit</a>
							<div class="be-ava-right btn btn-success">
								<i class="fa fa-share-alt"></i>Follow
								
							</div>
							<p class="be-use-name">{{ Auth::user()->name }}</p>
							<div class="be-user-info">
								Barnsley, United Kingdom
							</div>
			
						</div>
						
					</div>
           </div>

           <div class="col-xs-12 col-md-8">

           </div>

@endsection

