@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data PIC Project </strong> </h3>
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
                
                        <form action="{{url('/pic/'.$pic->idPic)}}" method="post">
                            
                            @csrf
                            @method('patch')
                            <input type="hidden" name="{{$pic->idPic}}" id="{{$pic->idPic}}"> <br/>

                            <div class="form-group">
                                <label class="control-label">Plant</label>
                                <input type="hidden" name="idPic" id="idPic">
                                    <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                        <option value selected="selected">-- Select Plant --</option>
                                        @foreach ($plant as $pln)
                                            <option value="{{$pln->id_plant}}"
                                                @if ($pln->id_plant == $pic->plant_id)
                                                    selected
                                                @endif
                                            >[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Project</label>
                                <input type="hidden" name="idPic" id="idPic">
                                    <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                                        <option value selected="selected">-- Select Project --</option>
                                        @foreach ($project as $pro)
                                            <option value="{{$pro->idProject}}"
                                                @if ($pro->idProject == $pic->project_id)
                                                    selected
                                                @endif
                                            >[{{$pro->proCode}}] {{$pro->proName}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Employee</label>
                                <input type="hidden" name="idPic" id="idPic">
                                    <select class="chosen-select" id="idEmployee" name="idEmployee" data-placeholder="Select Employee" required>
                                        <option value selected="selected">-- Select Employee --</option>
                                        @foreach ($employee as $em)
                                            <option value="{{$em->idEmployee}}"
                                                @if ($em->idEmployee == $pic->employee_id)
                                                    selected
                                                @endif
                                            >[{{$em->emID}}] {{$em->emName}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">PIC Status</label>
                                    <select id="status" name="status"  class="form-control" required>
                                    <option value selected="selected">-- Select Status --</option>
                                    <option value="Active" {{ $pic->status == 'Active' ? 'selected' : '' }} >Active</option>
                                    <option value="Inactive" {{ $pic->status == 'Inactive' ? 'selected' : '' }} >Inactive</option>
                                    </select>
                            </div>

                            <div style="text-align:right;">
                                <a class="on-default edit-row btn btn-danger" href="{{url('/pic/')}}"> Back</a>
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