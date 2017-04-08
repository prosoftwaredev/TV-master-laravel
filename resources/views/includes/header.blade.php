 <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
              </a>
            </li>
          </ul>
          <!-- BEGIN LOGO -->
          <a href="index.html">
            <img src="{{ Request::root() }}/assets/img/logo.png" class="logo" alt="" data-src="{{ Request::root() }}/assets/img/logo.png" data-src-retina="{{ Request::root() }}/assets/img/logo2x.png" width="106" height="21" />
          </a>
          <!-- END LOGO -->
          <ul class="nav pull-right notifcation-center">
            <li class="dropdown hidden-xs hidden-sm">
              <a href="index.html" class="dropdown-toggle active" data-toggle="">
                <i class="material-icons">home</i>
              </a>
            </li>
           
            <li class="dropdown visible-xs visible-sm">
              <a href="#" data-webarch="toggle-right-side">
                <i class="material-icons">chat</i>
              </a>
            </li>
          </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <div class="header-quick-nav">
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="pull-left">
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="" id="layout-condensed-toggle">
                  <i class="material-icons">menu</i>
                </a>
              </li>
            </ul>
            <ul class="nav quick-section">
            
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="m-r-10 input-prepend inside search-form no-boarder">
                <span class="add-on"> <i class="material-icons">search</i></span>
                <input name="" type="text" class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
              </li>
            </ul>
          </div>

          <!-- END TOP NAVIGATION MENU -->
          
          
          
            <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login.custom') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
          
                        <!-- BEGIN CHAT TOGGLER -->
                        <div class="pull-right">
                            <div class="chat-toggler sm">
                            <div class="profile-pic">
                                <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="{{ Request::root() }}/assets/img/profiles/avatar_small.jpg" data-src-retina="{{ Request::root() }}/assets/img/profiles/avatar_small2x.jpg" width="35" height="35" />
                                <div class="availability-bubble online"></div>
                            </div>
                            </div>
                            <ul class="nav quick-section ">
                             <li class="quicklinks"> <span class="h-seperate"></span></li>
                             <li class="quicklinks">
                                    <a href="#" class="chat-menu-toggle" data-webarch="toggle-right-side"><i class="material-icons">chat</i><span class="badge badge-important hide">1</span>
                                    </a>
          
                            </li>
                            </ul>
                        </div>
                        <!-- END CHAT TOGGLER -->
          
          
                    @endif
                    </ul>         
          
        </div>
        <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->