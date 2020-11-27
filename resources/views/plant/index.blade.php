@extends('layouts.app')
@section('content')


<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item"><strong>Plant</strong></li>
  </ol>
</div>

@if (session('success'))
      <!-- MAKA TAMPILKAN ALERT SUCCESS -->
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- KETIKA ADA SESSION ERROR  -->
    @if (session('error'))
      <!-- MAKA TAMPILKAN ALERT DANGER -->
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Plant</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="data-table-area mg-b-15">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">

                <hr width="100%">
                
                <div style="text-align:right; padding:10px;">
                  <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
                </div>

                <div style="text-align:right; padding:10px;">
                  <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
                  <i class="fa fa-refresh"></i>
                  Refresh
                  </button>
                </div>

                  <div class="sparkline13-list shadow-reset">
                     <div class="sparkline13-graph">
                          <div class="datatable-dashv1-list custom-datatable-overright" >
                              
                              <table id="table" data-toggle="table" data-pagination="true" data-search="true" >
                                
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Plant Code</th>
                                        <th>Plant Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($plant as $p)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>[{{$p->kode}}]</td>
                                        <td>{{$p->nama_plant}}</td>
                                        <td>
                                          <a class="btn btn-warning" href="{{url('/plant/edit/'.$p->id_plant)}}"><i class="fa fa-pencil"></i></a>
                                          <a class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"  href="{{url('/plant/hapus/'.$p->id_plant)}}"><i class="fa fa-trash"></i></a>
                                        </td>                                 
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


    <!-- container -->
        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add Data Plant</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                  <div class="modal-body">
                    <form action="{{url('/plant/store/')}}" method="post">
                      @csrf
                        <div class="form-group">
                          <label for="field-3" class="control-label">Plant Code</label>
                          <input type="text" class="form-control" id="kode" name="kode" required="required" placeholder="Plant Code...">
                        </div>
                        <div class="form-group">
                          <label for="field-3" class="control-label">Plant Name</label>
                          <input type="text" class="form-control" id="nama_plant" name="nama_plant" required="required" placeholder="Plant Name...">
                        </div>
                        <div class="model-footer" style="text-align:right;">
                         <button type="submit" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>

   
@endsection