<!-- BEGIN SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          
          <!-- BEGIN SIDEBAR MENU -->
      
          <ul>
                <li>
                <a href="{{route('channels.index')}}"> <span class="title">live tv</span> </a>
                </li>
                <li>
                <a href="{{route('sliders.index')}}"> <span class="title">sliders</span> </a>
                </li>
                <li>
                <a href="{{ route('videos.index')}}"> <span class="title">Videos</span> </a>
                </li>
                <li>
                <a href="{{ route('posts.index')}}"> <span class="title">news</span> </a>
                </li>
                <li>
                    <a href="javascript:;"> <span class="title">category</span> <span class=" arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ URL::to('admin/postscategory') }}">Post Category</a></li> 
                        <li><a href="">Videos Category</a></li>  
                        <li><a href="{{ URL::to('admin/channelscategory') }}">Channels Category</a></li>
                    </ul>
                </li>
         
          </ul>
          

          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-right">
                
          </div>
      </div>
      <!-- END SIDEBAR -->

