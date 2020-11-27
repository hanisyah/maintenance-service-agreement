@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data Problem Class </strong> </h3>
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
                
                    <form action="{{url('/problem_class/'.$problem_class->id_problem_class)}}" method="post">
                        
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id_problem_class" id="id_problem_class"> <br/>

                        <div class="form-group">
                            <label for="field-3" class="control-label">Problem Class Name</label>
                            <input type="text" class="form-control" id="Problem_Class_Name" name="Problem_Class_Name" value="{{ $problem_class->Problem_Class_Name }}" required>
                        </div>
                        <div style="text-align:right;">
                            <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                            <a class="on-default edit-row btn btn-danger" href="{{url('/problem_class/')}}"> Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
 </div>
</section>

@endsection
