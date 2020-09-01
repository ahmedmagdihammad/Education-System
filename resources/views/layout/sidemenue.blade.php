  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li>
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li @if(Route::is('locations') || Route::is('tracks') || Route::is('times') || Route::is('levels') || Route::is('batches') || Route::is('groups')) class="treeview active" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Adminstration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('locations')) class="active" @endif><a href="{{route('locations')}}"><i class="fa fa-map-marker"></i> Branches</a></li>
            <li @if(Route::is('tracks')) class="active" @endif><a href="{{route('tracks')}}"><i class="fa fa-university"></i> Tracks</a></li>
            <li @if(Route::is('times')) class="active" @endif><a href="{{route('times')}}"><i class="fa fa-clock-o"></i> Time Slots</a></li>
            <li @if(Route::is('levels')) class="active" @endif><a href="{{route('levels')}}"><i class="fa fa-signal"></i> Levels</a></li>
            <li @if(Route::is('batches')) class="active" @endif><a href="{{route('batches')}}"><i class="fa fa-users"></i> Batches</a></li>
            <li @if(Route::is('groups')) class="active" @endif><a href="{{route('groups')}}"><i class="fa fa-graduation-cap"></i> Groups</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>Management Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-users"></i> Students Way</a></li>
            <li><a href="#"><i class="fa fa-question-circle-o"></i> Absence Reasons</a></li>
            <li><a href="#"><i class="fa fa-qrcode"></i> Absence Number</a></li>
            <li><a href="#"><i class="fa fa-bar-chart"></i> Absence / Session</a></li>
            <li><a href="#"><i class="fa fa-briefcase"></i> Absence / Teacher</a></li>
            <li><a href="#"><i class="fa fa-retweet"></i> Potential Retention</a></li>
            <li><a href="#"><i class="fa fa-user-plus"></i> Retention / Teacher</a></li>
            <li><a href="#"><i class="fa fa-frown-o"></i> No Retention Reasons</a></li>
            <li><a href="#"><i class="fa fa-money"></i> Refounds Reasons</a></li>
            <li><a href="#"><i class="fa fa-user-times"></i> Visitor Reasonse</a></li>
            <li><a href="#"><i class="fa fa-question-circle"></i> Placement Results</a></li>
            <li><a href="#"><i class="fa fa-feed"></i> Sourcees Report</a></li>
            <li><a href="#"><i class="fa fa-bullseye"></i> Targets Report</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-area-chart"></i> <span>Technical Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-diamond"></i> All Report</a></li>
            <li><a href="#"><i class="fa fa-gift"></i> Feedback Report</a></li>
            <li><a href="#"><i class="fa fa-area-chart"></i> Supervision Report</a></li>
            <li><a href="#"><i class="fa fa-signal"></i> Supervision / Teacher</a></li>
            <li><a href="#"><i class="fa fa-thumbs-down"></i> Misplaced Report</a></li>
            <li><a href="#"><i class="fa fa-frown-o"></i> Complains Report</a></li>
          </ul>
        </li>
        <li @if(Route::is('exam') || Route::is('question')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-hourglass-half"></i> <span>Exams Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('exam')) class="active" @endif><a href="{{route('exam')}}"><i class="fa fa-edit"></i> Exams</a></li>
            <li @if(Route::is('question')) class="active" @endif><a href="{{route('question')}}"><i class="fa fa-question-circle-o"></i> Questions</a></li>
            <li><a href="#"><i class="fa fa-warning"></i> Instructions</a></li>
          </ul>
        </li>
        <li @if(Route::is('lead')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-phone"></i> <span>Call Center</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('lead')) class="active" @endif ><a href="{{route('lead')}}"><i class="fa fa-user-plus"></i> Leads</a></li>
            <li><a href="#"><i class="fa fa-user-secret"></i> Retention List</a></li>
            <li><a href="#"><i class="fa fa-money"></i> Refunds List</a></li>
            <li><a href="#"><i class="fa fa-user-times"></i> Visitors List</a></li>
            <li><a href="#"><i class="fa fa-phone"></i> Reports</a></li>
            <li><a href="#"><i class="fa fa-list-ul"></i> Daily Calls</a></li>
            <li><a href="#"><i class="fa fa-sitemap"></i> Branch Calls</a></li>
            <li><a href="#"><i class="fa fa-phone-square"></i> Follow Up Calls</a></li>
            <li><a href="#"><i class="fa fa-phone-square"></i> Telemarketing</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-phone-square"></i> Wrap Up Calls<span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-plus-square"></i> Set Calls</a></li>
            <li><a href="#"><i class="fa fa-table"></i> Show Calls</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-desktop"></i> <span> Front Desk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-edit"></i> Placement</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>FeedBacks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-building"></i> Branches Feedback</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Branch Operations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-reorder"></i> Manager Check List</a></li>
            <li><a href="#"><i class="fa fa-list"></i> Admin Check List</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Show Check List</a></li>
            <li><a href="#"><i class="fa fa-line-chart"></i> Customer Service</a></li>
          </ul>
        </li>
        <li @if (Route::is('absent.index') || Route::is('recommends.index')) class="active treeview" @else class="treeview" @endif >
          <a href="#">
            <i class="fa fa-binoculars"></i> <span>Supervision Dept.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-id-card"></i> Card System</a></li>
            <li><a href="#"><i class="fa fa-bar-chart"></i> Rating Teachers</a></li>
            <li @if(Route::is('absent.index')) class="active" @endif><a href="{{route('absent.index')}}"><i class="fa fa-user-times"></i> Absent Teacher</a></li>
            <li @if (Route::is('recommends.index')) class="active" @endif ><a href="{{route('recommends.index')}}"><i class="fa fa-thumbs-up"></i> Recommendations</a></li>
          </ul>
        </li>
        <li @if(Route::is('profiles') || Route::is('students') || Route::is('paystud')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-group"></i> <span>Students Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('profiles')) class="active" @endif><a href="{{route('profiles')}}"><i class="fa fa-car"></i> Profile</a></li>
            <li @if(Route::is('students') || Route::is('paystud')) class="active" @endif><a href="{{route('students')}}"><i class="fa fa-user"></i> Students</a></li>
            <li><a href="#"><i class="fa fa-check-square"></i> Student Attendance</a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> Absence Report</a></li>
            <li><a href="#"><i class="fa fa-signal"></i> Remaining Levels</a></li>
            <li><a href="#"><i class="fa fa-user"></i> Admin & BM Evaluation</a></li>
            <li><a href="#"><i class="fa fa-graduation-cap"></i> Placement</a></li>
            <li><a href="#"><i class="fa fa-frown-o"></i> Complains & Exceptions</a></li>
            <li><a href="#"><i class="fa fa-life-ring"></i> Customer Care list</a></li>
            <li><a href="#"><i class="fa fa-thumbs-down"></i> Students Complains</a></li>
            <li><a href="#"><i class="fa fa-bar-chart"></i> Student Survey</a></li>
            <li><a href="#"><i class="fa fa-user"></i> NotReg & Visitor Report </a></li>
            <li><a href="#"><i class="fa fa-server"></i> Waiting List </a></li>
          </ul>
        </li>
        <li  @if(Route::is('payroll.index') || Route::is('departments') || Route::is('jobs') || Route::is('employees') || Route::is('vacations') || Route::is('survey')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>HR Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-plus-square"></i> Applicants</a></li> -->
            <li @if(Route::is('departments')) class="active" @endif><a href="{{route('departments')}}"><i class="fa fa-sitemap"></i> Departments</a></li>
            <li @if(Route::is('jobs')) class="active" @endif><a href="{{route('jobs')}}"><i class="fa fa-wrench"></i> Jobs</a></li>
            <li @if(Route::is('employees')) class="active" @endif><a href="{{route('employees')}}"><i class="fa fa-male"></i> Employees</a></li>
            <li><a href="#"><i class="fa fa-battery-3"></i> Credit</a></li>
            <li @if(Route::is('vacations')) class="active" @endif><a href="{{route('vacations')}}"><i class="fa fa-plane"></i> Vacations</a></li>
            <li @if(Route::is('payroll.index')) class="active" @endif ><a href="{{route('payroll.index')}}"><i class="fa fa-money"></i> Payroll</a></li>
            <li @if(Route::is('survey')) class="active" @endif><a href="{{route('survey')}}"><i class="fa fa-pie-chart"></i> Survey</a></li>
          </ul>
        </li>
        <li @if(Route::is('payment') || Route::is('paytypes') || Route::is('expense') || Route::is('exptype')) class="treeview active" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-calculator"></i> <span>Accounting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-shopping-cart"></i> Debtors</a></li>
            <li @if(Route::is('payment')) class="active" @endif ><a href="{{route('payment')}}"><i class="fa fa-credit-card"></i> Payments</a></li>
            <li><a href="#"><i class="fa fa-credit-card"></i> Refunds </a></li>
            <li @if(Route::is('paytypes')) class="active" @endif><a href="{{route('paytypes')}}"><i class="fa fa-dollar"></i> Pay Types</a></li>
            {{-- <li @if(Route::is('exptype')) class="active" @endif><a href="{{route('exptype')}}"><i class="fa fa-shopping-basket"></i> Expenses Type</a></li> --}}
            <li @if(Route::is('expense')) class="active" @endif><a href="{{route('expense')}}"><i class="fa fa-shopping-basket"></i> Expenses</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>