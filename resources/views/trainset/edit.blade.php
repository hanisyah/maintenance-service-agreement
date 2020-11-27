@extends('layouts.app')
@section('content')

 <h3 class="m-0 text-dark" style="padding:20px;">Update Data Train Set</h3>
                   
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
                    <form action="{{url('/train-set/'.$trainset->idTrainset)}}" method="post">
                        
                        @csrf
                        @method('patch')
                        <input type="hidden" name="{{$trainset->idTrainset}}" id="{{$trainset->idTrainset}}"> <br/>

                        <div class="form-group">
                            <label class="control-label">Plant</label>
                            <input type="hidden" name="idTrainset" id="idTrainset">
                                <select  id="id_plant" name="id_plant" data-dependent="idProject" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
                                    <option value selected="selected">-- Select Plant --</option>
                                    @foreach ($plant as $pln)
                                        
                                        <option value="{{$pln->id_plant}}"
                                        @if ($pln->id_plant == $trainset->plant_id)
                                            selected
                                        @endif
                                        >[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                    
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Project</label>
                            <input type="hidden" name="idTrainset" id="idTrainset">
                                <select id="idProject" name="idProject" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
                                    <option value selected="selected">-- Select Project --</option>
                                    @foreach ($project as $pro)
                                        <option value="{{$pro->idProject}}"
                                        @if ($pro->idProject == $trainset->project_id)
                                            selected
                                        @endif
                                        >[{{$pro->proCode}}] {{$pro->proName}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="field-3" class="control-label">Train Set Code</label>
                                <input type="text" class="form-control" id="setCode" name="setCode" placeholder="Train Set Code..." value="{{ $trainset->setCode }}" required>
                        </div>
                        <div class="form-group">
                                <label for="field-3" class="control-label">Train Set Name</label>
                                <input type="text" class="form-control" id="setName" name="setName" placeholder="Train Set Name..." value="{{ $trainset->setName }}" required>
                        </div>
                        <div class="form-group">
                        <table  id=”tabelku” class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Car Number</th>
                                <th>Car Name</th>
                                <th>-</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td><input type="text" class="form-control" id="carNumber" name="carNumber" placeholder="Car Number..." value="{{ $trainset->carNumber }}" required></td>
                                <td><input type="text" class="form-control" id="carName" name="carName" placeholder="Car Name..." value="{{ $trainset->carName }}" required></td>
                                <td><a href="#" class="addtrainset btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle"></i> </a></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        
                        <div class="trainset"></div>

                        <div style="text-align:right;">
                           <a class="on-default edit-row btn btn-danger" href="{{url('/train-set/')}}"> Back</a>
                           <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection