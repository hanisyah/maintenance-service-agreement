@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data Employee </strong> </h3>
     </div>
</div>
<br><br>
<hr width="97%">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                   
                    <!-- container -->
                        <form action="{{url('/employee/'.$employee->idEmployee)}}" method="post">
                            
                            @csrf
                            @method('patch')
                            <input type="hidden" name="{{$employee->idEmployee}}" id="{{$employee->idEmployee}}"> <br/>

                            <div class="form-group">
                                <label for="field-3" class="control-label">Employee ID</label>
                                <input type="text" class="form-control" id="emID" name="emID" value="{{ $employee->emID }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Employee Name</label>
                                <input type="text" class="form-control" id="emName" name="emName" value="{{ $employee->emName }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Employee Company</label>
                                    <select class="chosen-select" id="idCompany" name="idCompany"  required>
                                        <option value selected="selected">-- Select Employee Company --</option>
                                        @foreach ($company as $com)
                                            
                                            <option value="{{$com->idCompany}}"
                                            @if ($com->idCompany == $employee->company_id)
                                                selected
                                            @endif
                                            >{{$com->comShortname}}</option>
                                        
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Employee Position</label>
                                <input type="text" class="form-control" id="emPosition" name="emPosition" placeholder="Employee Position..." value="{{ $employee->emPosition }}">
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Employee Phone</label>
                                <input type="text" class="form-control" id="emPhone" name="emPhone" placeholder="Employee Phone..." value="{{ $employee->emPhone }}">
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Employee Note</label>
                                <input type="text" class="form-control" id="emNote" name="emNote" placeholder="Employee Note..." value="{{ $employee->emNote }}">
                            </div>
                            <div style="text-align:right;">
                               <a class="on-default edit-row btn btn-danger" href="{{url('/employee/')}}"> Back</a>
                               <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                             </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection