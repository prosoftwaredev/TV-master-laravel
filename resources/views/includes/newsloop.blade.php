
 <div class="col-lg-10 col-lg-offset-1 m-t-50">

    <h2 class="block-title mv5" data-title="news"></h2> 
        <!-- masterslider -->
        <div class="news-slider news-block mv5 mvt0">
            <div class="master-slider ms-skin-default" id="masterslider1">
                    @foreach($features as $featurepost)
                                <div class="ms-slide">
                                            <img src="{{ Request::root() }}/vendors/masterslider/style/blank.gif" data-src="{{ asset('assets/images/' . $featurepost->image) }}" alt="{{ $featurepost->title }}"/>

                                            <div class="ms-thumb post hover-zoom">
                                                <div class="image" data-src="{{ asset('assets/images/' . $featurepost->image) }}"></div>
                                                <div class="thumb-meta">
                                                    <div class="meta">
                                                        <span class="date">{{ date('F j, Y', strtotime( $featurepost->created_at)) }}</span>
                                                    </div>
                                                    <h4>{{ $featurepost->title }}</h4>
                                                </div>
                                            </div>

                                            <div class="ms-layer box" style="padding:20px;">
                                                <div class="meta">
                                                    <span class="date">{{ date('F j, Y', strtotime( $featurepost->created_at)) }}</span>
                                                </div>
                                                <h4><a href="{{ url('news/' . $featurepost->slug) }}">{{ $featurepost->title }}</a></h4>
                                                <p>{{ substr(strip_tags($featurepost->body), 0, 150 ) }}{{ strlen(strip_tags($featurepost->body)) > 150 ? "..." : ""  }}</p>
                                            </div>
                                </div>
                    @endforeach
            </div>
        </div>
    <!-- end of masterslider -->



<br/><br/><br/>




		

	<div class="section-full pvb0">
		<div class="row sticky-parent fs-with-sidebar">
			<h2 class="block-title mv5" data-title="pictures"></h2>
				<div class="col-md-9 sticky-column fs-content">

            @foreach(array_chunk($lits->all(), 4) as $row)
                    <div class="row">

                        @foreach($row as $lit)
                            <div class="col-md-6 masonry-item vogue">
                                    <div class="theiaStickySidebar">
                                                <div class="masonry-layout row" data-col-width=".col-sm-6">
                                                        <div class="fs-grid-posts">							
                                                                <div class="fs-grid-viewport" style="position:relative;">
                                                    
                                                                    <div class="fs-grid-item">
                                                                            <a href="{{ url('news/' . $lit->slug) }}" class="fs-entry-image">
                                                                                <img src="{{ asset('assets/images/' . $lit->image) }}"  alt="{{ $lit->title }}">
                                                                            </a>
                                                                            <div class="fs-entry-meta">												
                                                                                <span class="date">{{ date('F j, Y', strtotime( $lit->created_at)) }}</span>
                                                                            </div>
                                                                                <h3><a href="{{ url('news/' . $lit->slug) }}">{{ $lit->title }}</a></h3>
                                                                                <p class="read-more"><a href="{{ url('news/' . $lit->slug) }}">read the article</a></p>
                                                                    </div>
                                                                </div>
                                                        </div>
                                            </div>
                                    </div>
                            </div>

                    @endforeach
                    </div>
            @endforeach

                </div>


                <div class="col-md-3 sticky-column fs-content">

                    <div class="theiaStickySidebar">	
						<div class="widget">
							<a href="entertainment.html">
								<img src="assets/images/pages/banner-v-news.jpg" alt="banner" class="full-size">
							</a>
						</div>
					</div>

                </div>


            </div>
    </div>



<br/><br/><br/>



<div class="section-full pv9">	
		<div class="row">
		
			<h2 class="block-title mv5" data-title="more lit"></h2>
                @foreach($pictures as $picture)        
					<div class="fs-post-table">						
						<div class="fs-table-item">


							<div class="row">
								<div class="col-sm-6 fs-table-bg" data-bg-image="{{ asset('assets/images/' . $picture->image) }}">
									<img src="{{ asset('assets/images/' . $picture->image) }}"  alt="{{ $picture->title }}">
								</div>
								<div class="col-sm-6">
									<div class="fs-table-content">
										<h4><a href="{{ url('news/' . $picture->slug) }}">{{ $picture->title }}</a></h4>
										<p class="read-more">
											<a href="{{ url('news/' . $picture->slug) }}">read the article</a>
										</p>
									</div>
									<div class="fs-table-meta">
										<span class="pull-right"><a href="{{ url('news/' . $picture->slug) }}"><span class="date">{{ date('F j, Y', strtotime( $picture->created_at)) }}</span></a></span>
										<div class="clearfix"></div>
									</div>
								</div>


							</div><!---row-->


						</div>
					</div>
                @endforeach
	</div>
</div>










</div>
