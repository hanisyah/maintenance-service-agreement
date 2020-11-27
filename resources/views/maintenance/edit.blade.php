@extends('layouts.app')
@section('content')


<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data Maintenance </strong> </h3>
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
                        <form action="{{url('/maintenance/'.$maintenance->id_maintenance)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="{{$maintenance->id_maintenance}}" id="{{$maintenance->id_maintenance}}"> <br/>

                            <div class="form-group">
                                <label for="field-3" class="control-label">Maintenance Code</label>
                                <input type="text" class="form-control" id="codeMain" name="codeMain" value="{{ $maintenance->codeMain }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Maintenance Name</label>
                                <input type="text" class="form-control" id="nameMain" name="nameMain" value="{{ $maintenance->nameMain }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Maintenance Note</label>
                                <input type="text" class="form-control" id="noteMain" name="noteMain" value="{{ $maintenance->noteMain }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Period Day</label>
                                <input type="text" class="form-control" id="dayMain" name="dayMain" value="{{ $maintenance->dayMain }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Maintenance Priority</label>
                                <input type="text" class="form-control" id="prioMain" name="prioMain" value="{{ $maintenance->prioMain }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Maintenance Color</label>
                                <input type="text" class="form-control" id="colorMain" name="colorMain" value="{{ $maintenance->colorMain }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tasklist</label>
                                    <select class="chosen-select" multiple="multiple" id="idTask" name="idTask"  required>
                                            @foreach ($task as $ta)
                                            <option value="{{$ta->idTask}}"
                                                @if ($ta->idTask == $maintenance->task_id)
                                                    selected
                                                @endif
                                            >{{$ta->taskName}}</option>
                                            @endforeach
                                    </select>
                            </div> 
                            <div style="text-align:right;">                 
                                <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                                <a class="on-default edit-row btn btn-danger" href="{{url('/maintenance/')}}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection