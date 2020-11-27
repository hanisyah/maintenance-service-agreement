@extends('layouts.app')
@section('content')


<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data Task </strong> </h3>
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
                        <form action="{{url('/task/'.$task->idTask)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="{{$task->idTask}}" id="{{$task->idTask}}"> <br/>

                            <div class="form-group">
                                <label for="field-3" class="control-label">Task Name</label>
                                <input type="text" class="form-control" id="taskName" name="taskName" placeholder="Task Name..." value="{{ $task->taskName }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Task Note</label>
                                <input type="text" class="form-control" id="taskNote" name="taskNote" placeholder="Task Note..." value="{{ $task->taskNote }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tool Group</label>
                                <input type="hidden" name="idTask" id="idTask">
                                    <select class="chosen-select" id="id_tool" name="id_tool" data-placeholder="Select Tool Group" required>
                                        <option value selected="selected">-- Select Tool Group --</option>
                                        @foreach ($tool as $to)
                                            <option value="{{$to->id_tool}}"
                                            @if ($to->id_tool == $task->tool_id)
                                                selected
                                            @endif    
                                            >{{$to->tool_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div style="text-align:right;">
                                <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                                <a class="on-default edit-row btn btn-danger" href="{{url('/employee/')}}"> Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection