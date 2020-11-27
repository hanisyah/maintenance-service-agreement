@extends('layouts.app')
@section('content')


<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</a></li>
    <li class="breadcrumb-item">Material</a></li>
    <li class="breadcrumb-item"><strong>Tool</strong></li>
  </ol>
</div>


<div class="col-lg-12" style="margin-left:10px;">
  <div style="color: #4a4c59;">
    <h3><strong> Tool</strong> </h3>
  </div>
</div>

<section class="content">  
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
              
        <hr width="100%">

          @if (session('success'))
              <!-- MAKA TAMPILKAN ALERT SUCCESS -->
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- KETIKA ADA SESSION ERROR  -->
            @if (session('error'))
              <!-- MAKA TAMPILKAN ALERT DANGER -->
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif


          <div style="text-align:right;">
            <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
          </div>

          <div style="text-align:right; margin:20px 0px 10px 0px;">
            <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
            <i class="fa fa-refresh"></i>
            Refresh
            </button>
          </div>

          <div class="sparkline13-list shadow-reset">
            <div class="sparkline13-graph">
              <div class="datatable-dashv1-list custom-datatable-overright" >
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" >
                  <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Tool Code</th>
                        <th>Tool Name</th>
                        <th>Measurement</th>
                        <th>Normal Duration Used (Day)</th>
                        <th>Tool Specification</th>
                        <th>Need Calibrate</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                            @foreach($tool as $to)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$to->tool_code}}</td>
                          <td>{{$to->tool_name}}</td>
                          <td>{{$to->measurement->Measurement_Name_2}}</td>
                          <td>{{$to->duration}}</td>
                          <td>{{$to->tool_specification}}</td>
                          <td>{{$to->calibrate}}</td>
                          <td>
                              <a href=" {{url('/tool/'.$to->id_tool.'/edit')}}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                              <form action="{{ url('/tool/'.$to->id_tool) }}" method="post" class="d-inline">
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
          <h4 class="modal-title">Add Data Tool</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/tool')}}" method="post">
          @csrf
          
          <div class="form-group">
            <label for="field-3" class="control-label">Tool Code</label>
            <input type="text" class="form-control" id="tool_code" name="tool_code" placeholder="Tool Code...." required>
          </div>
          <div class="form-group">
            <label for="field-3" class="control-label">Tool Name</label>
            <input type="text" class="form-control" id="tool_name" placeholder="Tool Name..." name="tool_name" required>
          </div>
          <div class="form-group">
            <label class="control-label">Measurement</label>
            <input type="hidden" name="id_measurement" id="id_measurement">
                <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_measurement" name="id_measurement" data-placeholder="Select Measurement" required>
                    <option value selected="selected">-- Select Measurement --</option>
                    @foreach ($measurement as $mea)
                        
                        <option value="{{$mea->id_measurement}}">{{$mea->Measurement_Name_2}}</option>
                    
                    @endforeach
                </select>
          </div>
          <div class="form-group">
            <label for="field-3" class="control-label">Duration</label>
            <div class="input-group">
              <input type="number" style="text-align:right;" class="form-control" id="duration" name="duration" placeholder="Duration...">
              <span class="input-group-addon" style="background-color:#dddcdc;">Day</span>
            </div>
          </div>
          <div class="form-group">
                <label for="field-3" class="control-label">Tool Specification</label>
                <input type="text" class="form-control" id="tool_specification" name="tool_specification" placeholder="Tool Specification...">
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Need Calibrate</label>
              <p>
                <input type="radio" name="calibrate" id="calibrate" class="pilComponent" value="yes"> Yes
                <input type="radio" name="calibrate" id="calibrate" class="pilComponent" value="No"> No
              </p>
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