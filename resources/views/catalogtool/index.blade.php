@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:8px; width:100%; font-size:13px; float:right; ">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Transaction</li>
    <li class="breadcrumb-item">Stock Catalog</li>
    <li class="breadcrumb-item"><strong>Tool</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong> Tool Stock Catalog </strong></h3>
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

          <form style="margin-bottom:50px;">
              <div class="form-group row" style="text-align:right;">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Plant</label>
                <div class="col-sm-4">
                  <input type="hidden" name="idCatalogmaterial" id="idCatalogmaterial">
                    <select class="form-control" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant --</option>
                        @foreach ($plant as $pln)
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row" style="text-align:right;">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-4">
                  <input type="hidden" name="idCatalogmaterial" id="idCatalogmaterial">
                    <select class="form-control" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                        <option value selected="selected">-- Select Location --</option>
                        @foreach ($lokasi as $lok)
                            <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row" style="text-align:right;">
                <label for="inputEmail3" class="col-sm-2 col-form-label">PIC Warehouse</label>
                <div class="col-sm-4">
                  
                    
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
                        <th>Tool Code</th>
                        <th>Tool Name</th>
                        <th>Available Stock</th>
                        <th>Tool Measurement</th>
                        <th>Location Coverage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($catalogtool as $cat)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $cat->tool->tool_code }}</td>
                          <td>{{ $cat->tool->tool_name }}</td>
                          <td></td>
                          <td>{{ $cat->measurement->Measurement_Name_2 }}</td>
                          <td>{{ $cat->plant->nama_plant }}</td>                                
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


    
@endsection