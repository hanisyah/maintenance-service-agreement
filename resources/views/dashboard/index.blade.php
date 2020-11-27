@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
      <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
      <li class="breadcrumb-item"><strong>Dashboard</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong><i class="fa fa-dashboard">  Dashboard </i></strong> </h3>
     </div>
</div>
<br>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12"> 

      <hr style="width:100%;">
        <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="fplant1">Plant</label>
                <div class="col-sm-8">
                  <select class="form-control" id="id_dashboard" name="id_dashboard" data-placeholder="[ All Plant ]" required>
                      <option value selected="selected"> --Select Plant--</option>
                      @foreach ($plant as $pln)
                          <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                      @endforeach
                  </select>

                </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 control-label" for="flocation">Project</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="id_dashboard" name="id_dashboard" data-placeholder="[ All Project ]" required>
                        <option value selected="selected"> --Select Project--</option>
                        @foreach ($project as $pro)
                            <strong><option value="{{$pro->proCode}}">{{$pro->proName}}</option></strong>
                        @endforeach
                    </select>

                  </div>
              </div>
            </div>
        <div class="form-group" >
              <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                <label class="col-sm-4 control-label" for="fstatus"><strong>Date range</strong></label>
                  <div class="input-daterange " id="datepicker">       
                      <div class="col-sm-4">
                            <input type="text" class="form-control" id="startDate" name="startDate" value="05/14/2020" > 
                      </div>
                      <div class="col-sm-4">
                            <input type="text" class="form-control" id="endDate" name="endDate" value="05/22/2020">
                      </div>
                    </div>
              </div>
            </div>  
          </div>
          <hr>
        </form>


        <div style="text-align:right; margin:10px;">
            <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
              <i class="fa fa-refresh"></i>
              Refresh
            </button>
        </div>

            <div class="row">
                    <div class="col-lg-12">
                        <div class="project-details-tab">
                            <ul class="nav nav-tabs res-pd-less-sm">
                                <li class="active" ><a data-toggle="tab" href="#home">Train availability</a>
                                </li>
                                <li><a data-toggle="tab" href="#menu1">Train Reliability</a>
                                </li>
                                <li><a data-toggle="tab" href="#menu1">Schedule Maintenance</a>
                                </li>
                                <li><a data-toggle="tab" href="#menu1">Unschedule Maintenance</a>
                                </li>
                            </ul>
                            <div class="tab-content res-tab-content-project">
                                <div id="home" class="tab-pane fade in active animated zoomInLeft">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="charts-single-pro shadow-reset">
                                            <div class="alert-title">
                                             </div>
                                            <div id="bar5-chart">
                                                <canvas id="barchart5"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div id="menu1" class="tab-pane fade animated bounceInUp">
                                    <div class="project-details-completeness">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                
      
            </div>
         
         </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

    
@endsection