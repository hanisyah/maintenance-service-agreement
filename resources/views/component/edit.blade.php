@extends('layouts.app')
@section('content')


<h3 class="m-0 text-dark" style="padding:20px;">Update Data Component & Consumable</h3>

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
                
                    <form action="{{url('/component-consumable/'.$component_consumable->idComponent)}}" method="post">
                        
                        @csrf
                        @method('patch')
                        <input type="hidden" name="idComponent" id="idComponent"> <br/>

                        <div class="form-group">
                            <label for="field-3" class="control-label">Type</label>
                            <p><input type="radio" name="type" value="component" class="pilComponent" {{$component_consumable->type == 'component'? 'checked' : ''}}> Component </p>
                            <p><input type="radio" name="type" value="consumable" class="pilComponent" {{$component_consumable->type == 'consumable'? 'checked' : ''}}> Consumable </p>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Component & Consumable Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $component_consumable->code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Component & Consumable Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $component_consumable->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Measurement</label>
                            <input type="hidden" name="idComponent" id="idComponent">
                                <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_measurement" name="id_measurement" required>
                                    <option value selected="selected">-- Select Measurement --</option>
                                    @foreach ($measurement as $mea)
                                        
                                        <option value="{{$mea->id_measurement}}"
                                        @if ($mea->id_measurement == $component_consumable->measurement_id)
                                            selected
                                        @endif
                                        >{{$mea->Measurement_Name_2}}</option>
                                    
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group" >
                            <label for="field-3" class="control-label">Minimum Stock Margin</label>
                            <input type="number" style="text-align:right;" class="form-control" id="minStock" name="minStock" value="{{ $component_consumable->minStock }}" required>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">With Normal Duration</label>
                            <p><input type="radio" name="with" value="yes" class="pilihan" {{$component_consumable->type == 'yes'? 'checked' : ''}}> Yes </p>
                            <p><input type="radio" name="with" value="no" class="pilihan" {{$component_consumable->type == 'no'? 'checked' : ''}}> No </p>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Normal Duration Use</label>
                          <div class="input-group">
                            <input type="number" style="text-align:right;" class="form-control" id="normalDuration" name="normalDuration" value="{{ $component_consumable->normalDuration }}" required>
                            <span class="input-group-addon" style="background-color:#dddcdc;">Day</span>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Lead Time</label>
                          <div class="input-group">
                            <input type="number" style="text-align:right;" class="form-control" id="leadTime" name="leadTime"  value="{{ $component_consumable->leadTime }}" required>
                            <span class="input-group-addon" style="background-color:#dddcdc;">Day</span>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Specification</label>
                            <input type="text" class="form-control" id="specification" name="specification" value="{{ $component_consumable->specification }}" required>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Reason to Change</label>
                            <input type="text" class="form-control" id="" name="" placeholder="Reason to Change...">
                        </div>

                        <div style="text-align:right;">
                        <a class="on-default edit-row btn btn-danger" href="{{url('/component-consumable/')}}"> Back</a>
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