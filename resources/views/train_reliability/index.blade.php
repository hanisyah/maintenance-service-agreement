@extends('layouts.app')
@section('content')


<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Report</a></li>
    <li class="breadcrumb-item"><strong>Train Reliability</strong></li>
  </ol>
</div>


<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Train Reliability </strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

          <hr style="width:100%;">

          <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
          <div class="row">
            <div class="col-sm-6">
              <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="fplant2">Plant</label>
                <div class="col-sm-8">
                      
                  <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                      <option value selected="selected">-- Select Plant --</option>
                      @foreach ($plant as $pln)
                          <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                      @endforeach
                  </select>

                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label" for="fproject">Project</label>
                <div class="col-sm-8">
                  
                  <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                      <option value selected="selected">-- Select Project --</option>
                      @foreach ($project as $pro)
                          <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                      @endforeach
                  </select>

                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label">Project Date</label>
                <div class="col-sm-8" style="padding-top: 5px;">
                  <span id="fproj_date"><b> - </b></span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label">PIC Project</label>
                <div class="col-sm-8" style="padding-top: 5px;">
                  <span id="fproj_pic">-</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="fplant2">Trainset</label>
                <div class="col-sm-8">
                      
                  <select class="chosen-select" id="idTrainset" name="idTrainset" data-placeholder="Select Train Set" required>
                      <option value selected="selected">-- Select Train Set --</option>
                      @foreach ($trainset as $tra)
                          <option value="{{$tra->idTrainset}}">[{{$tra->carNumber}}] {{$tra->carName}}</option>
                      @endforeach
                  </select>

                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label" for="fproject">Daterange</label>
                <div class="col-sm-8">
                  

                </div>
              </div>
            </div>
          </div>
        </form>

        
        <div style="text-align:right; margin:10px;">
          <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
        
    
        <div class="card">
          <div class="card-body">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead class="table-dark" style="text-align:center;">
                <tr>
                  <th colspan="4"><center>per Train Set</center></th>
                </tr>
                <tr>
                  <th>No</th>
                  <th>Project</th>
                  <th>Train Set</th>
                  <th>Number of Events</th>
                </tr>
              </thead>
              <tbody>      
                     
              </tbody>
            </table>
          </div>
          <div class="card-body">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead class="table-dark" style="text-align:center;">
                <tr>
                  <th colspan="6"><center>per Car</center></th>
                </tr>
                <tr>
                  <th>No</th>
                  <th>Project</th>
                  <th>Train Set</th>
                  <th>Car</th>
                  <th>Days</th>
                  <th>Number of Events</th>
                </tr>
              </thead>
              <tbody>      
                     
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection