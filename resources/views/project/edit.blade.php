@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data Project </strong> </h3>
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

                        <form action="{{url('/project/'.$project->idProject)}}" method="post">
                            
                            @csrf
                            @method('patch')
                            <input type="hidden" name="{{$project->idProject}}" id="{{$project->idProject}}"> <br/>

                            <div class="form-group">
                                <label class="control-label" for="pilih">Plant</label>
                                <input type="hidden" name="idProject" id="idProject">
                                <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                    <option value selected="selected">-- Select Plant --</option>
                                    @foreach ($plant as $pln)
                                        
                                        <option value="{{$pln->id_plant}}"
                                        @if ($pln->id_plant == $project->plant_id)
                                                selected
                                            @endif
                                        >[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="field-3" class="control-label">Project Code</label>
                                <input type="text" class="form-control" id="proCode" placeholder="Project Code..." name="proCode" value="{{ $project->proCode }}" required>
                            </div>
                            <div class="form-group">
                                    <label for="field-3" class="control-label">Project Name</label>
                                <input type="text" class="form-control" id="proName" name="proName" placeholder="Project Name..." value="{{ $project->proName }}" required>
                            </div>
                            <div class="form-group">
                                    <label for="field-3" class="control-label">Project Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" value="{{ $project->startDate }}" required>
                            </div>
                            <div class="form-group">
                                    <label for="field-3" class="control-label">Project End Date</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" value="{{ $project->endDate }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Status</label>
                                <p><input type="radio" name="status" id="status" value="Open" {{$project->status == 'Open'? 'checked' : ''}}> Open </p>
                                <p><input type="radio" name="status" id="status" value="Close" {{$project->status == 'Close'? 'checked' : ''}}> Close </p>
                            </div>

                            <div style="text-align:right;">
                                <a class="on-default edit-row btn btn-danger" href="{{url('/project/')}}"> Back</a>
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