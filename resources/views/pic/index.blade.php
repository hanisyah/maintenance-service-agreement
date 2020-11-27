@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Project</a></li>
    <li class="breadcrumb-item"><strong>PIC Project</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  PIC Project</strong> </h3>
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
                      <span id="fproj_date"><b><big> - </big></b></span>
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
                  <table id="table" class="table table-bordered table-striped" data-toggle="table" data-pagination="true"  data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Plant</th>
                        <th>Project</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>PIC Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($pic as $p)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>[{{ $p->plant->kode }}] {{ $p->plant->nama_plant }}</td>
                          <td>[{{ $p->project->proCode }}] {{ $p->project->proName }}</td>
                          <td>{{ $p->employee->emID }}</td>
                          <td>{{ $p->employee->emName }}</td>
                          <td>{{ $p->status }}</td>
                          <td>
                            <a href="{{ url('/pic/'.$p->idPic.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('/pic/'.$p->idPic) }}" method="post" class="d-inline">
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
          <h4 class="modal-title">Add Data PIC Project</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/pic')}}" method="post">
          @csrf
            <div class="form-group">
                <label class="control-label">Plant</label>
                <input type="hidden" name="idPic" id="idPic">
                    <select class="chosen-select dynamic" id="id_plant" name="id_plant" data-dependent="idProject" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant --</option>
                        @foreach ($plant as $pln)
                            
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Project</label>
                <input type="hidden" name="idPic" id="idPic">
                    <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                        <option value selected="selected">-- Select Project --</option>
                        @foreach ($project as $pro)
                            
                            <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Employee</label>
                <input type="hidden" name="idPic" id="idPic">
                    <select class="chosen-select" id="idEmployee" name="idEmployee" data-placeholder="Select Employee" required>
                        <option value selected="selected">-- Select Employee --</option>
                        @foreach ($employee as $em)
                            <option value="{{$em->idEmployee}}">[{{$em->emID}}] {{$em->emName}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="field-3" class="control-label">PIC Status</label>
                    <select class="form-control" id="status"  name="status"  required>
                        <option value selected="selected">-- Select Status --</option>
                        <option value="Active" >Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
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