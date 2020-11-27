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
                          @foreach($lokasi as $p)
                          <form action="{{url('/lokasi/update/'.$p->id_lokasi)}}" method="post">
                              
                              @csrf
                              <input type="hidden" name="id_lokasi" value="{{ $p->id_lokasi }}"> <br/>

                                  <div class="form-group">
                                  <label for="field-3" class="control-label">Plant</label>
                                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                                      id="id_plant" name="id_plant" require>
                                      <option value selected="selected">--Select Plant--</option>
                                      @foreach ($plant as $pln)
                                        <option value="{{$pln->id_plant}}"
                                          <?php if ($pln->id_plant === $p->plant_id): ?>
                                                selected
                                          <?php endif ?>
                                          >{{$pln->nama_plant}}
                                        </option>
                                      @endforeach
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="field-1" class="control-label">Location Name </label>
                                    <input type="text" class="form-control" required="required" name="nama_lokasi" value="{{ $p->nama_lokasi }}">
                                  </div>

                                  <div style="text-align:right;">
                                    <a class="on-default edit-row btn btn-danger" href="{{url('/lokasi/')}}">Back</a>
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