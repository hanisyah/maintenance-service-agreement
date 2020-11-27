@extends('layouts.app')
@section('content')

<h3 class="m-0 text-dark" style="padding:10px;">Update Data Location</h3>

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
                
                    <form action="{{url('/locemployee/'.$locemployee->idLocemployee)}}" method="post">
                        
                        @csrf
                        @method('patch')
                        <input type="hidden" name="{{$locemployee->idLocemployee}}" id="{{$locemployee->idLocemployee}}"> <br/>

                        <div class="form-group">
                            <label class="control-label">Plant</label>
                            <input type="hidden" name="idLocemployee" id="idLocemployee">
                                <select class="form-control" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                    <option value selected="selected">-- Select Plant --</option>
                                    @foreach ($plant as $pln)
                                        <option value="{{$pln->id_plant}}"
                                            @if ($pln->id_plant == $locemployee->plant_id)
                                                selected
                                            @endif
                                        >[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Location</label>
                            <input type="hidden" name="idLocemployee" id="idLocemployee">
                                <select class="form-control" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                    <option value selected="selected">-- Select Location --</option>
                                    @foreach ($lokasi as $lok)
                                        <option value="{{$lok->id_lokasi}}"
                                            @if ($lok->id_lokasi == $locemployee->location_id)
                                                selected
                                            @endif
                                        >{{$lok->nama_lokasi}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Employee</label>
                            <input type="hidden" name="idLocemployee" id="idLocemployee">
                                <select class="form-control" id="idEmployee" name="idEmployee" data-placeholder="Select Employee" required>
                                    <option value selected="selected">-- Select Employee --</option>
                                    @foreach ($employee as $em)
                                        <option value="{{$em->idEmployee}}"
                                            @if ($em->idEmployee == $locemployee->employee_id)
                                                selected
                                            @endif
                                        >[{{$em->emID}}] {{$em->emName}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Responsible</label>
                                <select class="form-control" id="responsible"  name="responsible"  required>
                                    <option value selected="selected">-- Select Responsible --</option>
                                    <option value="Warehouse" {{ $locemployee->responsible == 'Warehouse' ? 'selected' : '' }}>Warehouse</option>
                                    <option value="Operator" {{ $locemployee->responsible == 'Operator' ? 'selected' : '' }}>Operator</option>
                                    <option value="Technician" {{ $locemployee->responsible == 'Technician' ? 'selected' : '' }}>Technician</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="field-3" class="control-label">Employee Status</label>
                                <select id="status" name="status"  class="form-control" required>
                                <option value selected="selected">-- Select Status --</option>
                                <option value="Active" {{ $locemployee->status == 'Active' ? 'selected' : '' }} >Active</option>
                                <option value="Inactive" {{ $locemployee->status == 'Inactive' ? 'selected' : '' }} >Inactive</option>
                                </select>
                        </div>
                        <div style="text-align:right;">
                            <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                            <a class="on-default edit-row btn btn-danger" href="{{url('/locemployee/')}}"> Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection