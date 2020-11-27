@extends('layouts.app')
@section('content')


<h3 style="padding:10px;">Update Data Plant</h3>


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
                      @foreach($plant as $p)
                        <form action="{{url('/plant/update/'.$p->id_plant)}}" method="post">
                            
                            @csrf
                            <input type="hidden" name="id_plant" value="{{ $p->id_plant }}"> <br/>

                            <div class="form-group">
                              <label for="field-1" class="control-label">Plant Code</label>
                              <input type="text" class="form-control" required="required" name="kode" value="{{ $p->kode }}">
                            </div>
                            <div class="form-group">
                              <label for="field-1" class="control-label">Plant Name</label>
                              <input type="text" class="form-control" required="required" name="nama_plant" value="{{ $p->nama_plant }}">
                            </div>
                            <div style="text-align:right;">
                              <a class="on-default edit-row btn btn-danger" href="{{url('/plant/')}}"> Back</a>
                              <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                        @endforeach
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