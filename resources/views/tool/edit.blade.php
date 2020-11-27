@extends('layouts.app')
@section('content')

<h3 style="padding:10px;">Update Data Tool</h3>


<section class="content">
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="content">
              <div class="dialog">
                <div class="card-body">
                   
                    <!-- container -->
                    <form action="{{url('/tool/'.$tool->id_tool)}}" method="post">
                        @csrf
                        @method('patch')
                            <input type="hidden" name="{{$tool->id_tool}}" id="{{$tool->id_tool}}"> <br/>

                        <div class="form-group">
                            <label for="field-3" class="control-label">Tool Code</label>
                            <input type="text" class="form-control" id="tool_code" name="tool_code" value="{{ $tool->tool_code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Tool Name</label>
                            <input type="text" class="form-control" id="tool_name" name="tool_name" value="{{ $tool->tool_name }}" required>
                        </div>
     
                        <div class="form-group">
                                  <label for="field-3" class="control-label">Measurement</label>
                                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                                    id="id_measurement" name="id_measurement"  require>
                                      <option value selected="selected">--Select Measurement--</option>
                                      @foreach ($measurement as $mea)
                                        <option value="{{$mea->id_measurement}}"
                                          <?php if ($mea->id_measurement == $tool->measurement_id): ?>
                                                selected
                                          <?php endif ?>
                                          >{{$mea->Measurement_Name_2}}
                                        </option>
                                      @endforeach
                                    </select>
                                  </div>
                       
                        <div class="form-group">
                            <label for="field-3" class="control-label">Duration</label>
                                <div class="input-group">
                                    <input type="number" style="text-align:right;" class="form-control" id="duration" name="duration" placeholder="Duration..." value="{{ $tool->duration }}">
                                    <span class="input-group-addon" style="background-color:#dddcdc;">Day</span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Tool specification</label>
                            <input type="text" class="form-control" id="tool_specification" name="tool_specification" placeholder="Tool Specification..." value="{{ $tool->tool_specification }}">
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Need Calibrate</label>
                                <select name="calibrate" id="calibrate" class="form-control" required="required" value="{{ $tool->calibrate }}">
                                    <option value selected="selected">-- Select Need Calibrate --</option>
                                    <option value="Yes"
                                        @if ($mea->id_measurement == $tool->measurement_id)
                                                    selected
                                        @endif>Yes</option>
                                    <option value="No"  
                                        @if ($mea->id_measurement == $tool->measurement_id)
                                                    selected
                                        @endif>No</option>
                                </select>
                        </div> 
                        <div class="form-group">
                            <label for="field-3" class="control-label">Reason to Change</label>
                            <input type="text" class="form-control" placeholder="Reason to Change..." >
                        </div>
                       
                        <div style="text-align:right;">
                            <a class="on-default edit-row btn btn-danger" href="{{url('/tool/')}}">Back</a>
                            <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                        </div>
                    </form>

                    </div>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection