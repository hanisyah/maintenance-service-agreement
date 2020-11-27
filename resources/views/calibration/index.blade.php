@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Location</a></li>
    <li class="breadcrumb-item"><strong>Calibration Tool</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Calibration Tool</strong> </h3>
     </div>
</div>
<br>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
             <hr style="width:97%;"> 
             
             <div style="text-align:right;">
                  <a href="#" class="on-default edit-row btn btn-primary" data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
              </div>

              <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-6">
                    <input type="hidden" name="var_in2" value="|f_a2|f_c|f_h">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="fplant2">Plant</label>
                      <div class="col-sm-8">
                            
                        <select class="form-control" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                            <option value selected="selected">-- Select Plant --</option>
                            @foreach ($plant as $pln)
                                <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                            @endforeach
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="fproject">Location</label>
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
                        <span id="fproj_date"><b><big> - </big></b></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Report Status</label>
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
            <br>
            <div class="card">
              <div class="card-body">

                @if(session('success'))
                    <!-- ketika tampilan alert sukses-->
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <!--ketika tampilan alert error-->
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
               
                <div class="card-body">
                  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Material Code</th>
                        <th>Material Name</th>
                        <th>Serial Number</th>
                        <th>UoM</th>
                        <th>Specification</th>
                        <th>Calibrate Date</th>
                        <th>SJN No</th>
                        <th>SJN Date</th>
                        <th>Certificate Date</th>
                        <th>Handover Date</th>
                        <th>Status</th>
                        <th>Action</th>
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
  </div>
</section>

    <!-- container -->
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Data Calibration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/train-set')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                  <label class="control-label">Plant</label>
                  <input type="hidden" name="idTrainset" id="idTrainset">
                      <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_plant" name="id_plant" data-dependent="idProject" >
                          <option value selected="selected">-- Select Plant --</option>
                          @foreach ($plant as $pln)
                              
                              <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                          
                          @endforeach
                      </select>
              </div>
              <div class="form-group">
                  <label class="control-label">Location</label>
                  <input type="hidden" name="idTrainset" id="idTrainset">
                      <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" id="id_plant" name="id_plant" data-dependent="idProject" >
                          <option value selected="selected">-- Select Location--</option>
                          @foreach ($plant as $pln)
                              
                              <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                          
                          @endforeach
                      </select>
              </div>
              <div class="form-group">
                      <label for="field-3" class="control-label">Memo / SJN No</label>
                      <input type="text" class="form-control" id="setCode" name="setCode" placeholder="Memo / SJN No...">
              </div>
              <div class="form-group">
                      <label for="field-3" class="control-label">Memo / SJN Date</label>
                      <input type="date" class="form-control" id="setName" name="setName" placeholder="Memo / SJN Date...">
              </div>
              <div class="form-group">
                <b>Attachment</b>
                <p>(Max. @File Upload Size 5 MB - File allowed : jpg, jpeg, pjpeg, png, bmp, gif, zip, pdf, doc, docx, xls, xlsx, ppt, pptx)</p>
                <input type="file" name="file">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <table  class="table table-striped projects">
                  <thead class="table-dark">
                    <tr>
                      <th>No</th>
                      <th>Tool Name</th>
                      <th>Unique Number</th>
                      <th>-</th>
                    </tr>
                  </thead>
                  <tbody class="trainset">
                   </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#" class="addtrainset btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle"></i> </a></th>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
      
          </div>
            <!-- <div class="trainset"></div> -->
                            
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