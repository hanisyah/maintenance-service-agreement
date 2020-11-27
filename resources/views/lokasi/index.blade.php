@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</a></li>
    <li class="breadcrumb-item"><strong>Location</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Location</strong> </h3>
     </div>
</div>


<section class="content">  
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

          <hr width="100%">

          @if (session('success'))
            <!-- MAKA TAMPILKAN ALERT SUCCESS -->
              <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <!-- KETIKA ADA SESSION ERROR  -->
          @if (session('error'))
            <!-- MAKA TAMPILKAN ALERT DANGER -->
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <div style="text-align:right;">
            <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" for="fplant2">Plant</label>
              <div class="col-sm-8">
                <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                  id="id_plant" name="id_plant" required="required">
                  <option>-- Select Plant --</option>
                  @foreach ($plant as $pln)
                  <option value="{{$pln->id_plant}}">{{$pln->nama_plant}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div style="text-align:right; margin:20px 0px 10px 0px;">
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
                      <th>Plant</th>
                      <th>Location Name </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>      
                        @php $i = 1 @endphp
                        @foreach($lokasi as $p)
                    
                      <tr>
                        <td>{{$i++}}</td>
                        <td>[{{$p->plant->kode}}] {{$p->plant->nama_plant}}</td>
                        <td>
                          {{$p->nama_lokasi}}
                        </td>
                        <td>
                          <a class="on-default edit-row btn btn-warning" href="{{url('/lokasi/edit/'.$p->id_lokasi)}}"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-danger" onclick="setInput1('{{ $p->id_lokasi}}',
                                  '{{ $p->nama_lokasi }}')" href="#" data-toggle="modal"data-target="#delete-modal"><i class="fa fa-trash"></i></a>
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
</section>

    <!-- container -->
 <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
       <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data Location</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form action="{{url('/lokasi/store/')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="field-3" class="control-label">Plant</label>
                        <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                          id="id_plant" name="id_plant" required="required">
                          <option>-- Select Plant --</option>
                          @foreach ($plant as $pln)
                          <option value="{{$pln->id_plant}}">{{$pln->nama_plant}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="field-3" class="control-label">Location Name </label>
                          <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required="required" placeholder="Name Location...">
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

       
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
         <div class="modal-dialog" style="width:60%;">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="custom-width-modalLabel">Delete Data Location</h4>
                    <form action="{{url('/lokasi/hapus/')}}" method="post" class="form-horizontal" role="form">
                            @csrf
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                        <h4>Konfirmasi</h4>
                        <p>Apakah anda yakin ingin menghapus data ini ?</p>
                        <div class="form-group">
                            <input type="hidden" id="id_lokasi1" name="id_lokasi1">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
                      </div>
                    </form>
                </div>
            </div>
         </div>
       </div>      
        


 <script type="text/javascript">
                function SetInput(id_lokasi, nama_lokasi) {
                    document.getElementById('id_lokasi').value = id_lokasi;
                    document.getElementById('nama_lokasi').value = nama_lokasi;
                }
                function setInput1(id_lokasi, nama_lokasi) {
                    document.getElementById('id_lokasi1').value = id_lokasi;
                    document.getElementById('nama_lokasi1').value = nama_lokasi;
                }

               
</script>

    
@endsection