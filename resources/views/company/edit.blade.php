@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data Company </strong> </h3>
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
                
                        <form action="{{url('/company/'.$company->idCompany)}}" method="post">
                            
                            @csrf
                            @method('patch')
                            <input type="hidden" name="idCompany" id="idCompany"> <br/>

                            <div class="form-group">
                                <label for="field-3" class="control-label">Company Shortname</label>
                                <input type="text" class="form-control" id="comShortname" name="comShortname" value="{{ $company->comShortname }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Company Name</label>
                                <input type="text" class="form-control" id="comName" name="comName" value="{{ $company->comName }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Company Address</label>
                                <input type="text" class="form-control" id="comAddress" name="comAddress" value="{{ $company->comAddress }}" required>
                            </div>
                            <div class="form-group">
                                <label for="field-3" class="control-label">Company Phone</label>
                                <input type="text" class="form-control" id="comPhone" name="comPhone" value="{{ $company->comPhone }}" required>
                            </div>
                            <div style="text-align:right;">
                               <a class="on-default edit-row btn btn-danger" href="{{url('/company/')}}"> Back</a>
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