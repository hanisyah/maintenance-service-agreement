@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master Data</a></li>
    <li class="breadcrumb-item"><strong>Class Cause</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Cause  Class</strong> </h3>
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
                <div style="text-align:right; margin:50px 0px 10px 0px;">
                  <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
                </div>

        <div class="card">
          <div class="card-body">
          
                  <div class="card-body">
                    <table class="table table-bordered table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" >
                      <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Cause Class Name</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                            @php $i = 1 @endphp
                            @foreach($cause_class as $pro)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$pro->Cause_Class_Name}}</td>
                            <td> 
                              <a href="{{url('/cause_class/'.$pro->id_cause_class.'/edit')}}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i> </a>
                              <form action="{{ url('/cause_class/'.$pro->id_cause_class) }}" method="post" class="d-inline">
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
                       <h4 class="modal-title">Data Cause Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                    <form action="{{url('/cause_class')}}" method="post">
                      @csrf
                            <div class="form-group">
                                 <label for="field-3" class="control-label">Cause Class Name</label>
                                <input type="text" class="form-control" id="Cause_Class_Name" name="Cause_Class_Name" required>
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