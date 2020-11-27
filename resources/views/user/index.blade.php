@extends('layouts.app')
@section('content')


<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Configuration</li>
    <li class="breadcrumb-item"><strong>User Login</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  User</strong> </h3>
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

            <div style="text-align:right; padding:10px;">
                <a href="#" class="on-default btn btn-primary"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
            </div>

            <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" >Level</label>
                    <div class="col-sm-8">
                          
                      <select class="chosen-select" id="level"  name="level"  required>
                          <option value selected="selected">-- Select Level --</option>
                          <option value="Administrator" >Administrator</option>
                          <option value="AdminPlant">Admin Plant</option>
                          <option value="WarehouseLocation">Warehouse Location</option>
                          <option value="OperatorLocation">Operator Location</option>
                          <option value="PICProject">PIC Project</option>
                      </select>

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Block User Only</label>
                    <div class="col-sm-8" style="padding-top: 5px;">
                      <select class="chosen-select" id="block"  name="block"  required>
                          <option value selected="selected">-- Select Block User Only --</option>
                          <option value="Ya" >Ya</option>
                          <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <div style="text-align:right; padding:10px;">
              <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
              <i class="fa fa-refresh"></i>
              Refresh
              </button>
            </div>

        <div class="card">
          <div class="card-body">
              <table id="table" data-toggle="table" data-pagination="true" data-search="true">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Keterangan</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Online</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach($user as $us)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$us->username}}</td>
                        <td>{{$us->password}}</td>
                        <td>{{$us->keterangan}}</td>
                        <td>{{$us->name}}</td>
                        <td>{{$us->status}}</td>
                        <div style="font-color:red;">
                            <td>{{$us->online}}</td>
                        </div>
                        <td>
                          <a class="on-default edit-row btn btn-primary" href="{{ url('/user/'.$us->id) }}"><i class="fa fa-info"></i></a>
                          <a class="btn btn-warning" href="{{ url('/user/'.$us->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                          <form action="{{ url('/user/'.$us->id) }}" method="post" class="d-inline">
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

<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Data User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
          <div class="modal-body">
            <form action="" method="post">
              @csrf
                <div class="form-group">
                  <label class="control-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" required="required" placeholder="Username...">
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password...">
                </div>
                <div class="form-group">
                  <label class="control-label">Ulangi Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required="required" placeholder="Ulangi Password...">
                </div>
                <div class="form-group">
                  <label class="control-label" >Level</label>
                        
                    <select class="chosen-select" id="level"  name="level"  required>
                        <option value selected="selected">-- Select Level --</option>
                        <option value="Administrator" >Administrator</option>
                        <option value="AdminPlant">Admin Plant</option>
                        <option value="WarehouseLocation">Warehouse Location</option>
                        <option value="OperatorLocation">Operator Location</option>
                        <option value="PICProject">PIC Project</option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" >Keterangan</label>
                    <select class="chosen-select" id="keterangan"  name="keterangan"  required>
                      <option value selected="selected">-- Select Keterangan --</option>
                      <option value="-" >-</option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" required="required" placeholder="Nama...">
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" required="required" placeholder="Email...">
                </div>
                <div class="form-group">
                  <label class="control-label" >Status</label>
                    <select class="chosen-select" id="status"  name="status"  required>
                        <option value selected="selected">-- Select Status --</option>
                        <option value="Aktif" >Aktif</option>
                        <option value="Tidak">Tidak</option>
                    </select>
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
        
<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-xl" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-info"></i> Detail Data User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            
          </div>
        </div>
    </div>
</div>

@endsection