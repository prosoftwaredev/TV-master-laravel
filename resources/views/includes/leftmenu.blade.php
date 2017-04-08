<!-- BEGIN SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <img src="{{ Request::root() }}/assets/img/profiles/avatar.jpg" alt="" data-src="{{ Request::root() }}/assets/img/profiles/avatar.jpg" data-src-retina="{{ Request::root() }}/assets/img/profiles/avatar2x.jpg" width="69" height="69" />
            
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username">{{ Auth::user()->name }}</div>
              <div class="status">Life goes on...</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          
          
          
          
          
          
          <!-- BEGIN SIDEBAR MENU -->
      
          <ul>
          <li>
              <a href="{{ route('home') }}"> <span class="title">live tv</span> </a>
            </li>
            <li>
              <a href="{{ route('movies') }}"> <span class="title">movies</span> </a>
            </li>
            <li>
              <a href="">  <span class="title">tv shows</span> </a>
            </li>
            <li>
              <a href="{{ route('news') }}"> <span class="title">news</span> </a>
            </li>
            <li>  
              <a href="{{ route('settings') }}"> <span class="title">settings</span> </a>
        
            </li>


        
            <li class="hidden-lg hidden-md hidden-xs" id="more-widgets">
              <a href="javascript:;"> <i class="material-icons"></i></a>
              <ul class="sub-menu">
                <li class="side-bar-widgets">
                  <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                  
                  <p class="menu-title">news feed </p>
                  <div class="status-widget">
                    <div class="status-widget-wrapper">
                      <div class="title">Anne Hathaway as Selina Kyle<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                      <p>Redesign home page</p>
                    </div>
                  </div>
                  <div class="status-widget">
                    <div class="status-widget-wrapper">
                      <div class="title">The Walking Dead Season 7 Premiere Title Released<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                      <p>Statistical report</p>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
          
          
          
          <div class="side-bar-widgets">
            <p class="menu-title">news feed </p>
            <div class="status-widget">
              <div class="status-widget-wrapper">
                <div class="title">Anne Hathaway as Selina Kyle</div>
                <p>Redesign home page</p>
              </div>
            </div>
            <div class="status-widget">
              <div class="status-widget-wrapper">
                <div class="title">The Walking Dead Season 7 Premiere Title Released</div>
                <p>Statistical report</p>
              </div>
            </div>
            
          </div>
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-right">
                <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                        </form>
          </div>
      </div>
      <!-- END SIDEBAR -->

