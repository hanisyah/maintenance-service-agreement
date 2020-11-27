@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</a></li>
    <li class="breadcrumb-item"><strong>Measurement</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Measurement</strong> </h3>
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

        <div style="text-align:right; margin:20px 0px 10px 0px;">
          <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
        <br>

        <div class="card">
          <div class="card-body">
                <div class="card-body">
                  <table id="table" class="table table-striped table-hover" data-toggle="table"  data-search="true" >
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Measurement Commercial</th>
                            <th>Measurement Technical</th>
                            <th>Measurement Name 1</th>
                            <th>Measurement Name 2</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                            @foreach($measurement as $mea)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$mea->Measurement_Commercial}}</td>
                            <td>{{$mea->Measurement_Technical}}</td>
                            <td>{{$mea->Measurement_Name_1}}</td>
                            <td>{{$mea->Measurement_Name_2}}</td>
                            <td> 
                                <a href="{{url('/measurement/'.$mea->id_measurement.'/edit')}}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i> </a>
                                <form action="{{ url('/measurement/'.$mea->id_measurement) }}" method="post" class="d-inline">
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
                      <h4 class="modal-title">Add Data Measurement</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <form action="{{url('/measurement')}}" method="post">
                        @csrf
                          <div class="form-group">
                              <label for="field-3" class="control-label">Measurement Commercial</label>
                              <input type="text" class="form-control" id="Measurement_Commercial" name="Measurement_Commercial" required="required" placeholder="Measurement Commercial...">
                          </div>
                          <div class="form-group">
                              <label for="field-3" class="control-label">Measurement Technical</label>
                              <input type="text" class="form-control" id="Measurement_Technical" name="Measurement_Technical" required="required" placeholder="Measurement Technical...">
                          </div>
                          <div class="form-group">
                              <label for="field-3" class="control-label">Measurement Name 1</label>
                              <input type="text" class="form-control" id="Measurement_Name_1" name="Measurement_Name_1" required="required" placeholder="Measurement Name 1...">
                          </div>
                          <div class="form-group">
                              <label for="field-3" class="control-label">Measurement Name 2</label>
                              <input type="text" class="form-control" id="Measurement_Name_2" name="Measurement_Name_2" required="required" placeholder="Measurement Name 2...">
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