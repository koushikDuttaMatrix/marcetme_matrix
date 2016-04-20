<header class="main-header">
        <!-- Logo -->
        <a href="{{url('admin/home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><IMG SRC="{{url('admin/images/small.png')}}" WIDTH="" HEIGHT="" BORDER="0" ALT=""></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><IMG SRC="{{url('admin/images/small.png')}}" WIDTH="150" HEIGHT="47" BORDER="0" ALT=""></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                    <p>
                       Login as  {{Auth::user()->name}}
                     <!-- <small>Member since </small>-->
                    </p>
                  </li>
                  <!-- Menu Body -->
                 <!-- <li class="user-body">
					<H4>Last Login Details</H4>
					<div style="margin: 0 auto; width: 65%;">
						<div>
						  <label>IP Address :</label> 
						</div> 
						<div>
						  <label>Date :</label> 
						</div>  
					</div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('admin/auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      