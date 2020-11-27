@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Project</a></li>
    <li class="breadcrumb-item"><strong>Material Project Structure</strong></li>
  </ol>
</div>
<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Material Project Structure</strong> </h3>
     </div>
</div>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      <hr style="width:98%;">
        
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
              <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="fplant2">Plant</label>
                <div class="col-sm-8">
                      
                  <select class="chosen-select" id="plant" name="plant" data-placeholder="Select Plant" required>
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
                  
                  <select class="chosen-select" id="Project" name="Project" data-placeholder="Select Project" required>
                      <option value selected="selected">-- Select Project --</option>
                      <!-- @foreach ($project as $pro)
                          <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                      @endforeach -->
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
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Level</th>
                        <th>Material Code</th>
                        <th>Material Name</th>
                        <th>Material Measurement</th>
                        <th>Minimum Material Stock</th>
                        <th>Normal Duration Use</th>
                        <th>Lead Time</th>
                        <th>Material Specification</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($materialproject as $mat)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{ $mat->level }}</td>
                          <td>{{ $mat->component->code }}</td>
                          <td>{{ $mat->component->name }}</td>
                          <td>{{ $mat->measurement->Measurement_Name_2 }}</td>
                          <td>{{ $mat->component->minStock }}</td>
                          <td>{{ $mat->component->normalDuration }}</td>
                          <td>{{ $mat->component->leadTime }}</td>
                          <td>{{ $mat->component->specification }}</td>
                          <td>
                            <a href="{{ url('/materialproject/'.$mat->idMaterialProject.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ url('/materialproject/'.$mat->idMaterialProject) }}" method="post" class="d-inline">
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
          <h4 class="modal-title">Add Data Material Project Structure</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/materialproject')}}" method="post">
          @csrf
            <div class="form-group">
                <label class="control-label">Plant</label>
                <input type="hidden" name="idMaterialProject" id="idMaterialProject">
                    <select class="form-control dynamic" id="id_plant" name="id_plant" data-dependent="idProject" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant --</option>
                        @foreach ($plant as $pln)
                            
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Project</label>
                <input type="hidden" name="idMaterialProject" id="idMaterialProject">
                    <select class="form-control" id="idProject" name="idProject" data-placeholder="Select Project" required>
                        <option value selected="selected">-- Select Project --</option>
                        @foreach ($project as $pro)
                            
                            <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Parent</label>
                <input type="hidden" name="idMaterialProject" id="idMaterialProject">
                    <select class="form-control" id="" name="" data-placeholder="Select Parent" required>
                        
                    </select>
            </div>
            <div class="form-group">
            <label class="control-label">Child</label>
                <input type="hidden" name="idMaterialProject" id="idMaterialProject">
                    <select class="form-control" id="idComponent" name="idComponent" data-placeholder="Select Material" required>
                        <option value selected="selected">-- Select Material --</option>
                        @foreach ($component as $com)
                            
                            <option value="{{$com->idComponent}}">[{{$com->code}}] {{$pro->name}}</option>
                        
                        @endforeach
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

@push('scripts')
<script>
$(function () {
    $('#plant').on('change', function () {
        axios.post('{{ route('Materialproject.store') }}', {id: $(this).val()})
            .then(function (response) {
                $('#Project').empty();

                $.each(response.data, function (idProject, proName) {
                    $('#Project').append(new Option(proName, idProject))
                })
            });
    });
});
</script>
@endpush