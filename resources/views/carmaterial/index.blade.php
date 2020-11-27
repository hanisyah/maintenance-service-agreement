@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Transaction</a></li>
    <li class="breadcrumb-item"><strong>Car Material</strong></li>
  </ol>
</div>


<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Car Material</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        
          <hr width="100%">

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
              <div class="col-sm-6">
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
          

        <div class="card">
          <div class="card-body">
                
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"  data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead class="table-dark">
                <tr>
                  <th>Level</th>
                  <th>Material Code</th>
                  <th>Material Name</th>
                  <th>Material Measurement</th>
                  <th>Unique Number</th>
                  <th>Qty/Stock</th>
                  <th>Installation Date</th>
                  <th>Maximum Used Until</th>
                  <th>Material Source</th>
                  <th>Delete</th>
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

    <!-- container -->
  <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
     <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Data Car Material</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/train-set')}}" method="post">
          @csrf
          
            <div class="form-group">
                <label class="control-label">Plant</label>
                <input type="hidden" name="idTrainset" id="idTrainset">
                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_plant" name="id_plant" data-dependent="idProject" >
                        <option value selected="selected">-- Select Plant --</option>
                        @foreach ($plant as $pln)
                            
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Project</label>
                <input type="hidden" name="idTrainset" id="idTrainset">
                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="idProject" name="idProject" >
                        <option value selected="selected">-- Select Project --</option>
                        @foreach ($project as $pro)
                            
                            <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Train Set</label>
                <input type="hidden" name="idTrainset" id="idTrainset">
                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_plant" name="id_plant" data-dependent="idProject" >
                        <option value selected="selected">-- Select Train Set --</option>
                        @foreach ($trainset as $tra)
                            <option value="{{$tra->idTrainset}}">[{{$tra->setCode}}] {{$tra->setName}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Car</label>
                <input type="hidden" name="idTrainset" id="idTrainset">
                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="idProject" name="idProject" >
                        <option value selected="selected">-- Select Car --</option>
                        @foreach ($trainset as $tra)
                            <option value="{{$tra->idTrainset}}">[{{$tra->carNumber}}] {{$tra->carName}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
              <table  class="table table-striped">
                <thead class="table-dark">
                  <tr><th colspan="6"><center>New Material</center><th></tr>
                  <tr>
                    <th>-</th>
                    <th>Material Location</th>
                    <th>Material Name</th>
                    <th>Material Measurement</th>
                    <th>Material Stock</th>
                    <th>Maximum Used Until</th>
                    <th>(Datetime Now + Life Time)</th>
                  </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp
                
                  <!-- <tr>
                    <td>{{$i++}}</td>
                    <td><input type="text" class="form-control" id="carNumber" name="carNumber" placeholder="Car Number..."></td>
                    <td><input type="text" class="form-control" id="carName" name="carName" placeholder="Car Name..."></td> 
                    <td><a href="#" class="addcarmaterial btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle"></i> </a></td>
                  </tr>-->
              
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="#" class="addcarmaterial btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle"></i> </a></td>
                      </tr>
                  </tfoot>
              </table>
            </div>

            <div class="carmaterial"></div>
                
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