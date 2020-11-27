@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Master data</a></li>
    <li class="breadcrumb-item"><strong>Company</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Company</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
                
                <hr width="100%">

                @if(session('success'))
                    <!-- ketika tampilan alert sukses-->
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <!--ketika tampilan alert error-->
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                <div style="text-align:right;">
                  <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
                </div>

                <div style="text-align:right; margin:50px 0px 10px 0px;">
                  <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
                </div>

        <div class="card">
          <div class="card-body">
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" >
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Company Shortname</th>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>Company Phone</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                          @php $i = 1 @endphp
                          @foreach($company as $com)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$com->comShortname}}</td>
                          <td>{{$com->comName}}</td>
                          <td>{{$com->comAddress}}</td>
                          <td>{{$com->comPhone}}</td>
                          <td>
                            <a href="{{ url('/company/'.$com->idCompany.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <form action="{{ url('/company/'.$com->idCompany) }}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" ><i class="fa fa-trash"></i></button>
                            </form>
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
</section>


    <!-- container -->
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add data Company</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/company')}}" method="post">
          @csrf
          <div class="form-group">
                <label for="field-3" class="control-label">Company Shortname</label>
              <input type="text" class="form-control" id="comShortname" name="comShortname" required="required" placeholder="Company Shortname...">
          </div>
          <div class="form-group">
                <label for="field-3" class="control-label">Company Name</label>
              <input type="text" class="form-control" id="comName" name="comName" required="required" placeholder="Company Name...">
          </div>
          <div class="form-group">
                <label for="field-3" class="control-label">Company Address</label>
              <input type="text" class="form-control" id="comAddress" name="comAddress" required="required" placeholder="Company Address...">
          </div>
          <div class="form-group">
                <label for="field-3" class="control-label">Company Phone</label>
              <input type="text" class="form-control" id="comPhone" name="comPhone" required="required" placeholder="Company Phone...">
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

     

 <script type="text/javascript">
    function SetInput(idCompany, comShortname, comName, comAddress, comPhone) {
        document.getElementById('idCompany').value = idCompany;
        document.getElementById('comShortname').value = comShortname;
        document.getElementById('comName').value = comName;
        document.getElementById('comAddress').value = comAddress;
        document.getElementById('comPhone').value = comPhone;
    }
</script>

    
@endsection