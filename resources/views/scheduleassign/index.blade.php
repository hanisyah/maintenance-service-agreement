@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Transaction</li>
    <li class="breadcrumb-item"><strong>Schedule Assign</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Schedule Assign</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          
          <hr style="width:100%;">

          @if(session('success'))
                <!-- ketika tampilan alert sukses-->
                <div class="alert alert-success">{{session('success')}}</div>
            @endif

                <!--ketika tampilan alert error-->
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

          <div style="text-align:right;">
              <a href="#" class="on-default edit-row btn btn-primary" data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
          </div>

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
              </div>
              <div class="col-sm-6">
                <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
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
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fschedule_time">Schedule Time</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="" name="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fstatus">Schedule Status &amp; Progress</label>
                  <div class="col-sm-4">
                    <select id="type" class="chosen-select" required>
                        <option value selected="selected">-- Select Status --</option>
                        <option value="Created" name="type" class="pilCreated">Created</option>
                        <option value="Onprocess" name="type" class="pilOnprocess">On Process</option>
                        <option value="Done" name="type" class="pilDone">Done</option>
                      </select>
                  </div>
                  <div class="col-sm-4">
                      <select id="type" class="chosen-select" required>
                        <option value selected="selected">-- Select Progress --</option>
                        <option value="Normal" name="type" class="pilNormal">Normal</option>
                        <option value="Donothing" name="type" class="pilDonothing">Do Nothing</option>
                        <option value="Outstanding" name="type" class="pilOutstanding">Outstanding</option>
                      </select>
                  </div>
                </div>
                      
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fsort">Schedule Sorting</label>
                  <div class="col-sm-6">
                    <select id="type" class="chosen-select" required>
                      <option value selected="selected">-- Select Schedule Sorting --</option>
                      <option value="Created" name="type" class="pilCreated">Schedule Approx Start ASC</option>
                      <option value="Onprocess" name="type" class="pilOnprocess">Schedule Approx Start DESC</option>
                      <option value="Done" name="type" class="pilDone">Schedule Approx End ASC</option>
                      <option value="Done" name="type" class="pilDone">Schedule Approx End DESC</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fmaintenance">Maintenance</label>
                  <div class="col-sm-6">
                    
                    <select class="chosen-select" id="id_maintenance" name="id_maintenance" data-placeholder="Select Maintenance" required>
                        <option value selected="selected">-- Select Maintenance --</option>
                        @foreach ($maintenance as $main)
                            <option value="{{$main->id_maintenance}}">[{{$main->codeMain}}] {{$main->nameMain}}</option>
                        @endforeach
                    </select>

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
              </div>
            </div>
          </form>

        <div style="text-align:right; margin:10px;">
          <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
        <br>
        <div class="card">
          <div class="card-body">
            <table id="table" class="table table-bordered table-striped" data-toggle="table" data-pagination="true" data-search="false" >
              <thead class="table-dark">
                <tr>
                  <th>No</th>
                  <th>Project</th>
                  <th>Train Set</th>
                  <th>Maintenance</th>
                  <th>Approx Start</th>
                  <th>Approx End</th>
                  <th>Schedule Count</th>
                  <th>Status</th>
                </tr>
              </thead>
                @php $i = 1 @endphp
                  @foreach($scheduleassign as $sa)
                  <tr>
                      <td>{{$i++}}</td>
                      <td>[{{$sa->project->proCode}}] {{$sa->project->proNam}}</td>
                      <td>[{{$sa->trainset->setCode}}] {{$sa->project->setName}}</td>
                      <td>[{{$sa->maintenance->codeMain}}] {{$sa->project->nameMain}}</td>
                      <td>{{$sa->approxStart}}</td>
                      <td>{{$sa->approxEnd}}</td>
                      <td></td>
                      <td>
                        <a class="btn btn-warning" href=""><i class="fa fa-pencil"></i></a>
                        <form action="{{ url('/scheduleassign/'.$sa->idScheduleassign) }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" ><i class="fa fa-trash"></i></button>
                        </form>
                      </td>                                 
                  </tr>
                @endforeach
              </tbody>
                  
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- container -->
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Add Data Schedule Assign</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form action="{{url('/scheduleassign')}}" method="post">
              @csrf
                <div id="modnormal" style="display: block;">
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                              <div class="panel-title">Maintenance Location</div>
                      
                                  <div class="panel-options">
                                      <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                  </div>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Plant Location</label>
                                <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                  <option value selected="selected">-- Select Plant Location--</option>
                                  @foreach ($plant as $pln)
                                      <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Location</label>
                                <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                    <option value selected="selected">-- Select Location --</option>
                                    @foreach ($lokasi as $lok)
                                        <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Maintenance Detail</div>
                        
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                            <div class="panel-body">
                                <div class="form-group">
                                  <label class="control-label">Maintenance Type</label>
                                  <p>
                                    <input type="radio" name="tipe" value="Schedule" class="pilSchedule"> Schedule 
                                  </p>
                                  <p>
                                    <input type="radio" name="tipe" value="Unschedule" class="pilSchedule"> Unschedule 
                                  </p>
                                </div>
                                <div class="form-group"  id="form-maintenance">
                                    <label class="control-label">Maintenance</label>
                                    <select class="chosen-select" id="id_maintenance" name="id_maintenance" data-placeholder="Select Plant" required>
                                      <option value selected="selected">-- Select Maintenance--</option>
                                      @foreach ($maintenance as $main)
                                          <option value="{{$main->id_maintenance}}">[{{$main->codeMain}}] {{$main->nameMain}}</option>
                                      @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Approx Start</label>
                                      <input type="date" class="form-control" id="approxStart" name="approxStart">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Approx End</label>
                                      <input type="date" class="form-control" id="approxEnd" name="approxEnd">
                                </div>
                                
                            </div>
                        </div>
                      
                      </div>
                      <div class="col-sm-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                              <div class="panel-title">Project & Train</div>
                      
                                  <div class="panel-options">
                                      <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                  </div>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Plant Project</label>
                                <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                  <option value selected="selected">-- Select Plant Project--</option>
                                  @foreach ($plant as $pln)
                                      <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Project</label>
                                <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                                    <option value selected="selected">-- Select Project --</option>
                                    @foreach ($project as $pro)
                                        <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">PIC Project</label>
                                <!-- <select class="chosen-select" id="idEmployee" name="idEmployee" data-placeholder="Select PIC Project" required>
                                    <option value selected="selected">-- Select PIC Project --</option>
                                    @foreach ($pic as $p)
                                        <option value="{{$p->employee->idEmployee}}">[{{$p->employee->emID}}] {{$p->employee->emName}}</option>
                                    @endforeach
                                </select> -->
                                <select class="chosen-select" id="idPic" name="idPic" data-placeholder="Select PIC Project" required>
                                    <option value selected="selected">-- Select PIC Project --</option>
                                    @foreach ($pic as $p)
                                        <option value="{{$p->idPic}}">{{$p->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Train Set</label>
                                <select class="chosen-select" id="idTrainset" name="idTrainset" data-placeholder="Select Train Set" required>
                                    <option value selected="selected">-- Select Train Set --</option>
                                    @foreach ($trainset as $tra)
                                        <option value="{{$tra->idTrainset}}">[{{$tra->setCode}}] {{$tra->setName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Car</label>
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
                    </div>
                  </div>
                </div>
                <div class="model-footer" style="text-align:right;">
                 <button type="submit" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>

    
@endsection