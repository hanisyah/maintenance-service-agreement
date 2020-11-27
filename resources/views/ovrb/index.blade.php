@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Report</li>
    <li class="breadcrumb-item"><strong>OVRB</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  OVRB Report</strong> </h3>
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
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fplant1">Plant Location</label>
                  <div class="col-sm-8">
                    <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant Location--</option>
                        @foreach ($plant as $pln)
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label" for="flocation">Location</label>
                  <div class="col-sm-8">
                    
                    <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                        <option value selected="selected">-- Select Location --</option>
                        @foreach ($lokasi as $lok)
                            <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                        @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">PIC Warehouse</label>
                  <div class="col-sm-8" style="padding-top: 5px;">
                    <span id="fpic_location">-</span>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fsort">Schedule Type</label>
                  <div class="col-sm-8">
                    <select id="type" class="chosen-select" required>
                      <option value selected="selected">-- Select Schedule Type --</option>
                      <option value="Schedule" name="type" class="pilSchedule">Schedule</option>
                      <option value="Unschedule" name="type" class="pilUnschedule">Unschedule</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fschedule_time">Schedule Time</label>
                  <div class="col-sm-8">
                    <input type="" class="" id="" name="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fstatus">Schedule Status &amp; Progress</label>
                  <div class="col-sm-4">
                    <select id="type" class="form-control" required>
                        <option value selected="selected">-- Select Status --</option>
                        <option value="Created" name="type" class="pilCreated">Created</option>
                        <option value="Onprocess" name="type" class="pilOnprocess">On Process</option>
                        <option value="Done" name="type" class="pilDone">Done</option>
                      </select>
                  </div>
                  <div class="col-sm-4">
                      <select id="type" class="form-control" required>
                        <option value selected="selected">-- Select Progress --</option>
                        <option value="Normal" name="type" class="pilNormal">Normal</option>
                        <option value="Donothing" name="type" class="pilDonothing">Do Nothing</option>
                        <option value="Outstanding" name="type" class="pilOutstanding">Outstanding</option>
                      </select>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fplant2">Plant Project</label>
                  <div class="col-sm-8">
                        
                    <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant Project --</option>
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
                    <span id="fproj_date"><b><big> - </big></b></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">PIC Project</label>
                  <div class="col-sm-8" style="padding-top: 5px;">
                    <span id="fproj_pic">-</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label" for="ftrain_set">Train Set</label>
                    <div class="col-sm-8">
                      
                    <select class="chosen-select" id="idTrainset" name="idTrainset" data-placeholder="Select Train Set" required>
                          <option value selected="selected">-- Select Train Set --</option>
                          @foreach ($trainset as $tra)
                              <option value="{{$tra->idTrainset}}">[{{$tra->setCode}}] {{$tra->setName}}</option>
                          @endforeach
                      </select>

                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fmaintenance">Car</label>
                    <div class="col-sm-8">
                      
                      <select class="chosen-select" id="idTrainset" name="idTrainset" data-placeholder="Select Maintenance" required>
                          <option value selected="selected">-- Select Car --</option>
                          @foreach ($trainset as $tra)
                              <option value="{{$tra->idTrainset}}">[{{$tra->carNumber}}] {{$tra->carName}}</option>
                          @endforeach
                      </select>

                    </div>
                </div>
              </div>
            </div>
            
          </form>

      
          <div style="text-align:right; margin:10px;">
            <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
          </div>
          <br>
        <div class="card">
          <div class="card-body">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead class="table-dark">
                <tr>
                  <th>Project</th>
                  <th>Train Set</th>
                  <th>Maintenance</th>
                  <th>Approx Start</th>
                  <th>Approx End</th>
                  <th>Schedule Count</th>
                  <th>Status</th>
                </tr>
              </thead>
              </tbody>
                  
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    
@endsection