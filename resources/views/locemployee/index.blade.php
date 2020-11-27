@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Location</a></li>
    <li class="breadcrumb-item"><strong>Employee</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Employee </strong> </h3>
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
        <a href="#" class="on-default edit-row btn btn-primary" data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
      </div>

      <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
        <div class="row">
          <div class="col-sm-6">
            <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
            <div class="form-group">
              <label class="col-sm-4 control-label" for="fplant2">Plant</label>
              <div class="col-sm-8">
                    
                <select class="form-control" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                    <option value selected="selected">-- Select Plant --</option>
                    @foreach ($plant as $pln)
                        <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                    @endforeach
                </select>

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label" for="fproject">Location</label>
              <div class="col-sm-8">
                
                <select class="form-control" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                    <option value selected="selected">-- Select Location --</option>
                    @foreach ($lokasi as $lok)
                        <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
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
                <div class="card-body">
                  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Responsible</th>
                        <th>Employee Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($locemployee as $locem)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{ $locem->employee->emID }}</td>
                          <td>{{ $locem->employee->emName }}</td>
                          <td>{{ $locem->responsible }}</td>
                          <td>{{ $locem->status }}</td>
                          <td>
                            <a href="{{ url('/locemployee/'.$locem->idLocemployee.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('/locemployee/'.$locem->idLocemployee) }}" method="post" class="d-inline">
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
              <h4 class="modal-title">Add Data Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form action="{{url('/locemployee')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Plant</label>
                    <input type="hidden" name="idLocemployee" id="idLocemployee">
                        <select class="chosen-select" id="id_plant" name="id_plant" data-dependent="idProject" data-placeholder="Select Plant" required>
                            <option value selected="selected">-- Select Plant --</option>
                            @foreach ($plant as $pln)
                                
                                <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                            
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Location</label>
                    <input type="hidden" name="idLocemployee" id="idLocemployee">
                        <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                            <option value selected="selected">-- Select Location --</option>
                            @foreach ($lokasi as $lok)
                                
                                <option value="{{$lok->id_lokasi}}"> {{$lok->nama_lokasi}}</option>
                            
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Employee</label>
                    <input type="hidden" name="idLocemployee" id="idLocemployee">
                        <select class="chosen-select" id="idEmployee" name="idEmployee" data-placeholder="Select Employee" required>
                            <option value selected="selected">-- Select Employee --</option>
                            @foreach ($employee as $em)
                                
                                <option value="{{$em->idEmployee}}">[{{$em->emID}}] {{$em->emName}}</option>
                            
                            @endforeach
                        </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="field-3" class="control-label">Responsible</label>
                        <select class="chosen-select" id="responsible"  name="responsible"  required>
                            <option value selected="selected">-- Select Responsible --</option>
                            <option value="Warehouse" >Warehouse</option>
                            <option value="Operator">Operator</option>
                            <option value="Technician">Technician</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="field-3" class="control-label">Employee Status</label>
                        <select class="chosen-select" id="status"  name="status"  required>
                            <option value selected="selected">-- Select Status --</option>
                            <option value="Active" >Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
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