@extends('layouts.app')
@section('content')


<h3 class="m-0 text-dark" style="padding:20px;">Update Data Measurement</h3>

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
                            <form action="{{url('/measurement/'.$measurement->id_measurement)}}" method="post">
                                
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id_measurement" id="id_measurement"> <br/>
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Measurement Commercial</label>
                                    <input type="text" class="form-control" id="Measurement_Commercial" name="Measurement_Commercial" value="{{ $measurement->Measurement_Commercial }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Measurement_Technical</label>
                                    <input type="text" class="form-control" id="Measurement_Technical" name="Measurement_Technical" value="{{ $measurement->Measurement_Technical }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Measurement Name 1</label>
                                    <input type="text" class="form-control" id="Measurement_Name_1" name="Measurement_Name_1" value="{{ $measurement->Measurement_Name_1}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Measurement Name 2</label>
                                    <input type="text" class="form-control" id="Measurement_Name_2" name="Measurement_Name_2" value="{{ $measurement->Measurement_Name_2 }}" required>
                                </div>

                                <div style="text-align:right;">
                                  <a class="on-default edit-row btn btn-danger" href="{{url('/measurement/')}}">Back</a>
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
