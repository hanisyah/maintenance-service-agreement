    <!-- Left navbar links -->

    <ul class="navbar-nav " >
      <div style="padding:10px;">
        <li class="nav-item d-none d-sm-inline-block ">
            <img src="/inka.png" alt="inka.png" style="margin" width="100px" margin-top="10px"></img>
        </li>
        </div>
        <li class="nav-item d-none d-sm-inline-block ">
        <a href="{{url('/dashboard/')}}" class="nav-link"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="fa fa-th-large"></i> Master data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/plant/')}}" class="dropdown-item">Plant</a></li>
              <li><a href="{{url('/lokasi/')}}" class="dropdown-item">Locations</a></li>
              <li><a href="{{url('/measurement/')}}" class="dropdown-item">Measurement</a></li>
              <!-- Default dropright button -->
              <li class="dropright">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle" >Material</a>
                <ul class="dropdown-menu border-0 shadow">
                  <!-- Dropdown menu links -->
                  <a href="{{url('/tool/')}}" class="dropdown-item" >Tool</a>
                  <a href="{{url('/component-consumable/')}}" class="dropdown-item" >Component & Consumable</a>
                </ul>
              </li>
              <li><a href="{{url('/company/')}}" class="dropdown-item">Company</a></li>
              <li><a href="{{url('/employee/')}}" class="dropdown-item" >Employee</a></li>
              <li><a href="{{url('/task/')}}" class="dropdown-item" >Task</a></li>
              <li><a href="{{url('/maintenance/')}}" class="dropdown-item" >Maintenance</a></li>
              <li><a href="{{url('/problem_class/')}}" class="dropdown-item" >Class Problem</a></li>
              <li><a href="{{url('/cause_class/')}}" class="dropdown-item" >Class Cause</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="fa fa-book"></i> Project </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/project/')}}" class="dropdown-item" >Project</a></li>
              <li><a href="{{url('/pic/')}}" class="dropdown-item" >PIC Project</a></li>
              <li><a href="{{url('/train-set/')}}" class="dropdown-item" >Train Set</a></li>
              <li><a href="{{url('/materialproject/')}}" class="dropdown-item" >Material Project Structure</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="fa fa-home"></i> Location </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/locemployee/')}}" class="dropdown-item" >Employee</a></li> 
              <!-- Default dropright button -->
              <li class="dropright">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle" >Stock</a>
                <ul class="dropdown-menu border-0 shadow">
                  <!-- Dropdown menu links -->
                  <a href="{{url('/stocktool/')}}" class="dropdown-item" >Tool</a>
                  <a href="{{url('/stockmaterial/')}}" class="dropdown-item" >Material</a>
                </ul>
              </li>
              <li><a href="{{url('/calibration/')}}" class="dropdown-item" >Calibration Tool</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
        <a href="#" id="dropdownSubMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
        <i class="fa fa-shopping-cart"></i> Transaction </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li class="dropright">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                class="dropdown-item dropdown-toggle" >Stock Catalog</a>
                <ul class="dropdown-menu border-0 shadow">
                  <!-- Dropdown menu links -->
                  <a href="{{url('/catalogtool/')}}" class="dropdown-item" >Tool</a>
                  <a href="{{url('/catalogmaterial/')}}" class="dropdown-item" >Material</a>
                </ul>
              </li>
              <li><a href="{{url('/carmaterial')}}" class="dropdown-item" >Car Material</a></li>
              <li class="dropright">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                class="dropdown-item dropdown-toggle" >Transfer</a>
                <ul class="dropdown-menu border-0 shadow">
                  <!-- Dropdown menu links -->
                  <a href="{{url('/transfertool/')}}" class="dropdown-item" >Tool</a>
                  <a href="{{url('/transfermaterial/')}}" class="dropdown-item" >Material</a>
                </ul>
              </li>
              <li class="dropright">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                class="dropdown-item dropdown-toggle" >Monitoring</a>
                <ul class="dropdown-menu border-0 shadow">
                  <!-- Dropdown menu links -->
                  <a href="{{url('/schedule_plan/')}}" class="dropdown-item" >Schedule Plan</a>
                  <a href="{{url('/schedule_realization/')}}" class="dropdown-item" >Schedule Realization</a>
                </ul>
              </li>
              <li><a href="{{url('/scheduleassign/')}}" class="dropdown-item" >Schedule Assign</a></li>
              <li><a href="{{url('/bad/')}}" class="dropdown-item" >Bad Actor</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
        <i class="fa fa-print"></i> Report </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/train_availability/')}}"class="dropdown-item" >Train Availablity</a></li>
              <li><a href="{{url('/train_reliability/')}}" class="dropdown-item" >Train Reliability</a></li>
              <li><a href="{{url('/ovrb/')}}" class="dropdown-item" >OVRB</a></li>
              <li><a href="{{url('/materiallog/')}}" class="dropdown-item" >Material Log</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
        <i class="fa fa-cog"></i> Configuration</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/user/')}}" class="dropdown-item" >User Login</a></li>
              <li><a href="{{url('/setting/')}}" class="dropdown-item" >Settings</a></li>
            </ul>
        </li>
      </ul>


