@extends('layouts.queen')

@section('content')


                <div class="col-lg-10 col-lg-offset-1 m-t-50 m-b-100">
        <section class="section-content single">
    
            <div class="col-sm-9 with-sidebar">
                <article class="blog-item blog-single">

                    <!-- title -->
                    <h2 class="post-title">{{ $article->title }}</h2>

                    <!-- image -->
                    <div class="post first text-bigger hover-dark entry-media">
                        <div class="image">
                            <img src="{{ asset('assets/images/' . $article->image) }}" alt="img-responsive"/>

                        </div>
                    </div>



                    <!-- article starts -->

                    <div class="row">

                        <div class="col-md-2 entry-details">

                            <div class="entry-date"><span class="date">{{ date('F j, Y', strtotime( $article->created_at)) }}</span></div>

                            <div class="entry-views">5000 views</div>
                            <div class="entry-social">
                                <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:;"><i class="fa fa-youtube"></i></a>
                                <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                            </div>

                        </div>
                        <!-- end .entry-details -->

                        <div class="col-md-10 entry-content">

                            <p>{{ strip_tags($article->body) }}</p>

                        </div>
                        <!-- end .entry-details -->

                    </div>

                </article>


            </div>
            <!-- end .col-md-9 -->



            <div class="col-sm-3 sidebar mt2">
                <div class="widget">
                    <a href="entertainment.html">
                        <img src="{{ Request::root() }}/assets/images/pages/banner-v-en.jpg" alt="banner">
                    </a>
                </div>
                <!-- end .widget -->

            </div>
            <!-- end .sidebar -->

        </section>
        <!-- end .section-content -->

    </div>

    </div>
    </div>

@endsection