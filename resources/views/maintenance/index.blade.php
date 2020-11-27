@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</a></li>
    <li class="breadcrumb-item"><strong>Maintenance</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Maintenance</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

          <hr width="97%">
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

          <div style="text-align:right; margin:50px 0px 10px 0px;">
              <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
                <i class="fa fa-refresh"></i>
                Refresh
              </button>
          </div>

        <div class="card">
          <div class="card-body">

                <div class="card-body">
                  <table id="datatable" class="table table-bordered table-striped projects">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Maintenance Code</th>
                        <th>Maintenance Name</th>
                        <th>Maintenance Note</th>
                        <th>Period day</th>
                        <th>Maintenance Priority</th>
                        <th>Maintenance Color</th>
                        <th>Tasklist</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($maintenance as $main)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{ $main->codeMain }}</td>
                          <td>{{ $main->nameMain}}</td>
                          <td>{{ $main->noteMain}}</td>
                          <td>{{ $main->dayMain}}</td>
                          <td>{{ $main->prioMain}}</td>
                          <td><i class="fa fa-circle" style="color:{{ $main->colorMain }}"></i>{{ $main->colorMain}}</td>
                          <td>{{ $main->task->taskName}}</td>
                          <td>
                            <a href="{{url('/maintenance/'.$main->id_maintenance.'/edit')}}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('/maintenance/'.$main->id_maintenance) }}" method="post" class="d-inline">
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Data Maintenance</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/maintenance')}}" method="post">
          @csrf
          <div class="form-group">
              <label for="field-3" class="control-label">Maintenance Code</label>
              <input type="text" class="form-control" id="codeMain" name="codeMain" placeholder="Maintenance Code..." required>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Maintenance Name</label>
              <input type="text" class="form-control" id="nameMain" name="nameMain" placeholder="Maintenance Name...">
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Maintenance Note</label>
              <input type="text" class="form-control" id="noteMain" name="noteMain" placeholder="Maintenance Note...">
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Period Day</label>
              <input type="number" class="form-control" id="dayMain" name="dayMain" style="text-align: right;" placeholder="Period day..." required>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Maintenance Priority</label>
              <input type="number" class="form-control" id="prioMain" name="prioMain" style="text-align: right;" placeholder="Maintenance Priority...">
          </div>
          <div class="form-group">
              <div class="colorpicker-inner ts-forms mg-b-23">
                  <div class="tsbox">
                      <label for="field-3"  class="label"><strong>Maintenance Color</strong></label>
                          <input type="text" class="color-group" id="hex" name="colorMain">
                  </div>
              </div>
          </div>
          <div class="form-group">
            <div class="chosen-select-single">
                <label  for="field-3" class="control-label"><strong>Tasklist</strong></label>
                <select class="chosen-select" multiple="multiple" id="idTask" name="idTask" data-placeholder="Select Task......................." required>
                      @foreach ($task as $ta)
                          <option  value="{{$ta->idTask}}" >{{$ta->taskName}}</option>
                      @endforeach
                </select>
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