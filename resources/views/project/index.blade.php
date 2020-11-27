@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
  <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Project</a></li>
    <li class="breadcrumb-item"><strong>Project</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Project</strong> </h3>
     </div>
</div>
<br>
<br>
<hr style="width:97%;">


<section class="content">
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          <!-- ALERT-->
          @if(session('success'))
              <!-- ketika tampilan alert sukses-->
              <div class="alert alert-success">{{session('success')}}</div>
              @endif

              <!--ketika tampilan alert error-->
          @if(session('error'))
              <div class="alert alert-danger">{{session('error')}}</div>
              @endif
         
          <div style="text-align:right; padding:10px;">
            <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
          </div>

          <!-- FORM -->
          <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fplant1">Plant</label>
                  <div class="col-sm-8">
                    <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant--</option>
                        @foreach ($plant as $pln)
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        @endforeach
                    </select>

                  </div>
                </div>
              </div>
            </div>
          </form>

          <div style="text-align:right; padding:10px;">
            <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
            <i class="fa fa-refresh"></i>
            Refresh
            </button>
          </div>

        <div class="card">
          <div class="card-body">
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="table" data-toggle="table" data-pagination="true" data-search="false">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Plant</th>
                        <th>Project Code</th>
                        <th>Project Name</th>
                        <th>Project Start Date</th>
                        <th>Project End Date</th>
                        <th>Project Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($project as $pro)
                      @php $i = 1 @endphp
                        <tr>
                          <td>{{$i++}}</td>
                          <td>[{{ $pro->plant->kode }}] {{ $pro->plant->nama_plant }}</td>
                          <td>{{ $pro->proCode }}</td>
                          <td>{{ $pro->proName }}</td>
                          <td>{{ Carbon\Carbon::parse($pro->startDate)->translatedFormat('l, d F Y') }}</td>
                          <td>{{ Carbon\Carbon::parse($pro->endDate)->translatedFormat('l, d F Y') }}</td>
                          <td>{{ $pro->status }}</td>
                          <td>
                            <a href="{{ url('/project/'.$pro->idProject.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('/project/'.$pro->idProject) }}" method="post" class="d-inline">
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
 </div>
</section>


    <!-- container -->
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Data Project</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/project')}}" method="post">
          @csrf
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="field-3" class="control-label">Plant</label>
                    <select class="chosen-select" id="id_plant" name="id_plant" required="required">
                      <option>-- Select Plant --</option>
                      @foreach ($plant as $pln)
                      <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="field-3" class="control-label">Project Code</label>
                    <input type="text" class="form-control" id="proCode" placeholder="Project Code..." name="proCode" required>
                </div>
                <div class="form-group">
                        <label for="field-3" class="control-label">Project Name</label>
                    <input type="text" class="form-control" id="proName" name="proName" placeholder="Project Name..." required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                        <label for="field-3" class="control-label">Project Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                </div>
                <div class="form-group">
                        <label for="field-3" class="control-label">Project End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" value="">
                </div>
                <div class="form-group">
                    <label for="field-3" class="control-label">Status</label>
                    <p><input type="radio" name="status" id="status" value="Open"> Open </p>
                    <p><input type="radio" name="status" id="status" value="Close"> Close </p>
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


