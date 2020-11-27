@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Project</a></li>
    <li class="breadcrumb-item"><strong>Train Set</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Train Set</strong> </h3>
     </div>
</div>
<br>



<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

       <hr style="width:100%;">
                
                <!-- ketika tampilan alert sukses-->
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <!--ketika tampilan alert error-->
                @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif

                

       <div style="text-align:right;">
          <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
        </div>
       
        <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
          <div class="row">
            <div class="col-sm-6">
              <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="fplant2">Plant</label>
                <div class="col-sm-8"> 
                  <select id="id_plant" name="id_plant" 
                  data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">>
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
                  <select id="idProject" name="idProject" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
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
        </form>

        <div style="text-align:right; margin:10px;">
          <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
        <br>
        <div class="card">
          <div class="card-body">

                <div class="card-body">
                  <table id="datatable" class="table table-bordered table-striped projects">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Train Set Code / Car Number</th>
                        <th>Train Set / Car Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      @php $i = 1 @endphp
                      @foreach($trainset as $ts)
                      <tr>
                        <td colspan="4"><strong>Plant: </strong>[{{$ts->plant->kode}}] {{$ts->plant->nama_plant}}</td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Project: </strong>[{{$ts->project->proCode}}] {{$ts->project->proName}}</td>
                      </tr>

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$ts->setCode}}</td>
                        <td>{{$ts->setName}}</td>
                        <td>
                          <a href="{{ url('/train-set/'.$ts->idTrainset.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                          <form action="{{ url('/train-set/'.$ts->idTrainset) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" ><i class="fa fa-trash"></i></button>
                          </form>
                        </td>                                  
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
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
          <h4 class="modal-title">Add Data Train Set</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/train-set')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-6">
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
                      <label for="field-3" class="control-label">Train Set Code</label>
                      <input type="text" class="form-control" id="setCode" name="setCode" placeholder="Train Set Code...">
              </div>
              <div class="form-group">
                      <label for="field-3" class="control-label">Train Set Name</label>
                      <input type="text" class="form-control" id="setName" name="setName" placeholder="Train Set Name...">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <table  class="table table-striped projects">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Car Number</th>
                      <th>Car Name</th>
                      <th>-</th>
                    </tr>
                  </thead>
                  <tbody class="trainset">
                    
                    
                      <!--<tr>
                        <td>{{$i++}}</td>
                        <td><input type="text" class="form-control" id="carNumber" name="carNumber" placeholder="Car Number..."></td>
                        <td><input type="text" class="form-control" id="carName" name="carName" placeholder="Car Name..."></td>
                        <td><a href="#" class="addtrainset btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle"></i> </a></td>
                      </tr>-->
                  </tbody>
                  <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#" class="addtrainset btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle"></i> </a></th>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

            <!-- <div class="trainset"></div> -->
                
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