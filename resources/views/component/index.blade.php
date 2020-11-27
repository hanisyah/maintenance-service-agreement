@extends('layouts.app')
@section('content')


<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</li>
    <li class="breadcrumb-item"></a>Material</li>
    <li class="breadcrumb-item"><strong>Component & Consumable</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Component & Consumable </strong> </h3>
     </div>
</div>
<br>

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

          <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
          <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="fplant1" class="col-sm-4 control-label">Type</label>
                <div class="col-sm-8">
                  <select name="type" id="type" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
                      <option value="show-all"  selected="false"> [All Type] </option>
                      <option value="component">Component</option>
                      <option value="consumable">Consumable</option>
                  </select>           
                </div>
            </div>
          </div>
          </div>
          </form>
          
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
                        <th>Type</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Measurement</th>
                        <th>Minimum Stock</th>
                        <th>Normal Duration Use (Day)</th>
                        <th>Lead Time (Day)</th>
                        <th>Component & Consumable Specification</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                            @foreach($component as $cm)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$cm->type}}</td>
                          <td>{{$cm->code}}</td>
                          <td>{{$cm->name}}</td>
                          <td>{{$cm->measurement->Measurement_Name_2}}</td>
                          <td>{{$cm->minStock}}</td>
                          <td>{{$cm->normalDuration}}</td>
                          <td>{{$cm->leadTime}}</td>
                          <td>{{$cm->specification}}</td>
                          <td>
                            <a href="{{ url('/component-consumable/'.$cm->idComponent.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('/component-consumable/'.$cm->idComponent) }}" method="post" class="d-inline">
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
          <h4 class="modal-title">Add Data Component & Consumable</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/component-consumable')}}" method="post">
          @csrf
          <div class="form-group">
              <label for="field-3" class="control-label">Type</label>
              <p>
                <input type="radio" name="type" value="component" class="pilComponent"> Component 
                <input type="radio" name="type" value="consumable" class="pilComponent"> Consumable 
              </p>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Component & Consumable Code</label>
              <input type="text" class="form-control" id="code" name="code" placeholder="Component & Consumable Code..." required>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Component & Consumable Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Component & Consumable Name..." required>
          </div>
          <div class="form-group">
              <label  for="field-3" class="control-label">Measurement</label>
              <input type="hidden" name="idComponent" id="idComponent">
                  <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_measurement" name="id_measurement" required>
                      <option value selected="selected">-- Select Measurement --</option>
                      @foreach ($measurement as $mea)
                      <option value="{{$mea->id_measurement}}">{{$mea->Measurement_Name_2}}</option>
                      @endforeach
                  </select>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Minimum Stock Margin</label>
              <input type="number" class="form-control" id="minStock" name="minStock" style="text-align: right;" placeholder="Minimum Stock Margin..." required>
          </div>
          <div class="form-group" id="form-with">
              <label for="field-3" class="control-label">With Normal Duration</label>
              <p><input type="radio" name="with" value="yes" class="pilihan"> Yes
              <input type="radio" name="with" value="no" class="pilihan"> No </p>
          </div>
          <div class="form-group" id="form-normal">
              <label for="field-3" class="control-label">Normal Duration Use</label>
              <div class="input-group">
              <input type="number"  style="text-align:right;" class="form-control" id="normalDuration" name="normalDuration" placeholder="Normal Duration Use..." required>
                <span class="input-group-addon" style="background-color:#dddcdc;">Day</span>
              </div>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Lead Time</label>
              <div class="input-group">
                <input type="number" class="form-control" id="leadTime" name="leadTime" style="text-align: right;" placeholder="Lead Time..." required>
                <span class="input-group-addon" style="background-color:#dddcdc;">Day</span>
              </div>
          </div>
          <div class="form-group">
              <label for="field-3" class="control-label">Specification</label>
              <input type="text" class="form-control" id="specification" name="specification" placeholder="Specification..." required>
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
