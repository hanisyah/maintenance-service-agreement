@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:8px; width:100%; font-size:13px; float:right; ">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Transaction</li>
    <li class="breadcrumb-item">Stock Catalog</li>
    <li class="breadcrumb-item"><strong>Material</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px; margin-bottom:10px; ">
     <div style="color: #4a4c59;">
        <h3><strong>  Material Stock Catalog</strong> </h3>
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

          <form action="" method="post" class="form-horizontal" role="form" style="padding:20px;">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fplant1">Plant Location</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant Location--</option>
                        @foreach ($plant as $pln)
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="flocation">Location</label>
                    <div class="col-sm-8">
                      
                      <select class="form-control" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                          <option value selected="selected">-- Select Location --</option>
                          @foreach ($lokasi as $lok)
                              <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                          @endforeach
                      </select>

                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">PIC Warehouse</label>
                  <div class="col-sm-8" style="padding-top: 5px;">
                    <span id="fpic_location">-</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fplant2">Plant Project</label>
                  <div class="col-sm-8">
                        
                    <select class="form-control" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant Project --</option>
                        @foreach ($plant as $pln)
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fproject">Project</label>
                  <div class="col-sm-8">
                    
                    <select class="form-control" id="idProject" name="idProject" data-placeholder="Select Project" required>
                        <option value selected="selected">-- Select Project --</option>
                        @foreach ($project as $pro)
                            <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                        @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Project Date</label>
                  <div class="col-sm-8" style="padding-top: 5px;">
                    <span id="fproj_date"><b><big> - </big></b></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">PIC Project</label>
                  <div class="col-sm-8" style="padding-top: 5px;">
                    <span id="fproj_pic">-</span>
                  </div>
                </div>
              </div>
            </div>
          </form> 

          <div style="text-align:right; margin:10px;">
            <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
          </div>


        <div class="card">
          <div class="card-body">
              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead class="table-dark">
                  <tr>
                    <th>No</th>
                    <th>Material Code</th>
                    <th>Material Name</th>
                    <th>Available Stock</th>
                    <th>Material Measurement</th>
                    <th>Location Coverage</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
                
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    
@endsection