@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</a></li>
    <li class="breadcrumb-item"><strong>Employee</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Employee</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      
                  <hr width="100%">

                  <!-- ketika tampilan alert sukses-->
                    @if(session('success'))
                      <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                  <!--ketika tampilan alert error-->
                    @if(session('error'))
                      <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                  <div style="text-align:right;">
                    <a href="#" class="on-default edit-row btn btn-primary" data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
                  </div>

                  <!-- FORM -->
                  <form style="margin-bottom:50px;">
                    <div class="form-group row" style="text-align:right;">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Company</label>
                      <div class="col-sm-4">
                          <select class="form-control" id="idCompany" name="idCompany" data-placeholder="Select Company" required>
                              <option value selected="selected">-- Select Company --</option>
                              @foreach ($company as $com)
                                  <option value="{{$com->idCompany}}">[{{$com->comShortname}}] {{$com->comName}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                  </form>

                  <div style="text-align:right; margin:50px 0px 10px 0px;">
                    <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
                  </div>

        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" >
              <thead class="table-dark">
                <tr>
                  <th>No</th>
                  <th>Employee Company</th>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Employee Position</th>
                  <th>Employee Phone</th>
                  <th>Employee Note</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1 @endphp
                @foreach($employee as $em)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $em->company->comShortname }}</td>
                    <td>{{$em->emID}}</td>
                    <td>{{$em->emName}}</td>
                    <td>{{$em->emPosition}}</td>
                    <td>{{$em->emPhone}}</td>
                    <td>{{$em->emNote}}</td>
                    <td>
                      <a href="{{ url('/employee/'.$em->idEmployee.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                      <form action="{{ url('/employee/'.$em->idEmployee) }}" method="post" class="d-inline">
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
</section>


    <!-- container -->
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Add Data Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
      <div class="modal-body">
        <form action="{{url('/employee')}}" method="post">
          @csrf
          
          <div class="form-group">
              <label for="field-3" class="control-label">Employee ID</label>
              <input type="text" class="form-control" id="emID" name="emID" placeholder="Employee ID..." required>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Employee Name</label>
              <input type="text" class="form-control" id="emName" placeholder="Employee Name..." name="emName" required>
          </div>
          <div class="form-group">
              <label class="control-label" for="pilih">Employee Company</label>
              <input type="hidden" name="idEmployee" id="idEmployee">
                  <select class="chosen-select" id="pilih" name="idCompany" data-placeholder="Select Employee Company" required>
                      <option value selected="selected">-- Select Employee Company --</option>
                      @foreach ($company as $com)
                          <option value="{{$com->idCompany}}">{{$com->comShortname}}</option>
                      @endforeach
                  </select>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Employee Position</label>
              <input type="text" class="form-control" id="emPosition" name="emPosition" placeholder="Employee Position...">
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Employee Phone</label>
              <input type="text" class="form-control" id="emPhone" name="emPhone" placeholder="Employee Phone...">
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Employee Note</label>
              <input type="text" class="form-control" id="emNote" name="emNote" placeholder="Employee Note...">
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