@extends('layouts.servant')


@section('content')

            <div style="background-color: rgba(27,30,36,0.8); ">
                    <div class="content" style="padding-top: 20px;padding-bottom: 20px;">
<div id="summary" class="row">
    <div class="col-lg-10 col-lg-offset-1">
    <div class="col-md-8">
        
        <span style="font-size: 30px;">The Wolf of Wall Street</span> <span>2013</span>
        
        <div class="row">
            <div class="col-md-4 col-sm-2 hidden-xs">
                <img class="img-responsive" alt="The Wolf of Wall Street" src="http://mirza-amazon.herokuapp.com/../../image/poster/MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_SX300.jpg" width="200">
            </div>
            <div class="col-md-8 col-sm-10 col-xs-12">

                <br><br>                
                <button id="watchTrailer" class="btn btn-danger btn-cons" style="width: 210px;">
                    <i class="glyphicon glyphicon-play-circle pull-left"></i>
                    <span style="text-align: center;">Watch Trailer</span>
                </button> 
                <br><br>
                
                <span class="text-sm">Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.</span>
                <br><br>
                
                <div class="text-sm text-lightgray">
                    <span>Starring: Leonardo DiCaprio, Jonah Hill, Margot Robbie, Matthew McConaughey</span><br>
                    <span>Runtime: 3 hours</span><br>
       
                </div>
            </div>
        </div>
        
        <div id="trailer">
            <div><button type="button" class="btn btn-link">×</button></div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"></iframe>
            </div>
        </div>
    </div>
    <div class="col-md-4 pull-right" style="max-width: 331px;">
        <div style="text-align: center;">
            <img alt="Prime Trial" src="{{ Request::root()}}/assets/img/coplay.png">
        </div>
        <br>


        <a role="button" class="btn btn-warning btn-block" style="color: black;" href="#">
            <span style="font-size: 18px;">Watch with CoPLAY</span>
            <br> with up to 4 friends
        </a>

        <br>
           
                    <p class="text-lightgray" style="text-align: center;">Prefer to rent or buy?</p>
                    <p class="text-sm">When renting, your window access period is 72 hours to finish once started.</p> 


                 @if(Auth::guest())

                            <button class="btn btn-danger btn-cons btn-block" onclick="window.location.replace('{{Request::route('/login')}}');">RENT MOVIE FOR $2.00</button>
                            <button class="btn btn-cons btn-success btn-block" onclick="window.location.replace('{{Request::route('/login')}}');">RENT COPLAY FOR $8.00</button>

                @else
                    <div class="button-set">
                                    <button class="btn btn-danger btn-cons btn-block" type="button" id="soloStripe" data-toggle="modal" data-target="#soloModal">RENT MOVIE FOR $2.00</button>
                                    <button class="btn btn-cons btn-success btn-block" data-toggle="modal" data-target="#coModal" type="button">RENT COPLAY FOR $8.00</button>
                    </div>
                 @endif     

        <button id="btnwatchlist" class="btn btn-default btn-block">Add to Watchlist</button>
    </div>
</div>
</div>
</div>   
</div>


<div class="">
        <div id="suggestion">
              
                <div style="padding-bottom: 15px;">
                    <span class="header-responsive">Customers Who Watched This Item Also Watched</span>
                </div>

                            <div id="navtopbox" class="util-carousel normal-imglist">
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/2.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/3.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/4.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/5.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/1.jpg" alt="" /></a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/2.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/3.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/4.jpg" alt="" /></a>
                                    </div>
                                     <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/1.jpg" alt="" /></a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/2.jpg" alt="" /> </a>
                                    </div>
                                    <div class="item">
                                        <a href="#"> <img src="{{ Request::root()}}/assets/img/3.jpg" alt="" /> </a>
                                    </div>
                                </div>
           
        </div>
</div>  



@endsection

@include('modals.solo')
@include('modals.coplay')

<script>
    $(function() {

               
        
        $('button#btnwatchlist').click(function() {
            if(true)
            {
                var btn = $(this);
                var method = btn.html() == 'Add to Watchlist' ? 'add' : 'remove';

                btn.html(method == 'remove' ? 'Removing...' : 'Adding...');  
                btn.attr('disabled','');

                $.ajax({
                    url: 'http://mirza-amazon.herokuapp.com/watch',
                    type: "POST",
                    data: {id: '71', method: method}
                }).done(function(response) {

                    if(response != "success")
                    {
                        alert(response);
                    }
                    btn.html(method == 'remove' ? 'Add to Watchlist' : 'Remove from Watchlist');
                    btn.removeAttr('disabled');
                });
            }
            else
            {
                window.location.replace('http://mirza-amazon.herokuapp.com/login');
            }
        });
    });
    
    function toggleTrailer()
    {
        var parentDiv = $('div#summary > div:first-child');
        var descDiv = $('button#watchTrailer').parent().parent();
        var trailer = $('div#trailer');

        if(trailer.is(':visible'))
        {
            flipTrailer(parentDiv, trailer, descDiv);
            $('div#trailer > div:last-child > iframe').removeAttr('src');
        }
        else
        {
            flipTrailer(parentDiv, descDiv, trailer);
            $('div#trailer > div:last-child > iframe').attr('src','http://www.youtube.com/embed/RgQH6snjLj4');
        }
    }
</script>

