@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Transaction</li>
    <li class="breadcrumb-item">Transfer</li>
    <li class="breadcrumb-item"><strong>Tool</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Tool Transfer</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      
        <hr style="width:100%;">

        @if(session('success'))
            <!-- ketika tampilan alert sukses-->
            <div class="alert alert-success">{{session('success')}}</div>
        @endif

            <!--ketika tampilan alert error-->
        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        <div style="text-align:right;">
            <a href="#" class="on-default edit-row btn btn-primary" data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus-circle"> Add Data</i> </a>
        </div>

        <div class="project-details-tab">
          <ul class="nav nav-tabs res-pd-less-sm">
              <li class="active" ><a data-toggle="tab" href="#requested"><i class="fa fa-mail-forward"></i> Requested</a>
              </li>
              <li><a data-toggle="tab" href="#giver"><i class="fa fa-mail-reply"></i> Giver</a>
              </li>
          </ul>
          <div class="tab-content res-tab-content-project">
            <div id="requested" class="tab-pane fade in active ">
              <div class="row">
                <div class="col-lg-12">
                  <div class="charts-single-pro shadow-reset">
                    <div class="alert-title">
                      <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
                        <div class="row">
                          <div class="col-sm-6">
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="fplant1">Plant Request</label>
                                <div class="col-sm-8">
                                  <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                      <option value selected="selected">-- Select Plant Request--</option>
                                      @foreach ($plant as $pln)
                                      <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="flocation">Location Request</label>
                                <div class="col-sm-8">
                                  <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                      <option value selected="selected">-- Select Location Request --</option>
                                      @foreach ($lokasi as $lok)
                                          <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Report Status</label>
                              <div class="col-sm-8" style="padding-top: 5px;">
                                <span id="fpic_location">-</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="fplant1">Plant Giver</label>
                              <div class="col-sm-8">
                                <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                    <option value selected="selected">-- Select Plant Giver--</option>
                                    @foreach ($plant as $pln)
                                        <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="flocation">Location Giver</label>
                              <div class="col-sm-8">
                                <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                    <option value selected="selected">-- Select Location Giver --</option>
                                    @foreach ($lokasi as $lok)
                                        <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                    @endforeach
                                </select>

                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <div style="text-align:right; margin:0px 0px 10px 0px;">
                        <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
                          <i class="fa fa-refresh"></i>
                          Refresh
                        </button>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead class="table-dark">
                              <tr>
                                <th>No</th>
                                <th>No BPM</th>
                                <th>No Surat Jalan</th>
                                <th>Location Request</th>
                                <th>Location Giver</th>
                                <th>Date</th>
                                <th>Qty Item</th>
                                <th>Status</th>
                                <th>Process</th>
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
            </div>
            <div id="giver" class="tab-pane fade ">
              <div class="row">
                <div class="col-lg-12">
                  <div class="charts-single-pro shadow-reset">
                    <div class="alert-title">

                      <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
                        <div class="row">
                          <div class="col-sm-6">

                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="fplant1">Plant Giver</label>
                              <div class="col-sm-8">
                                <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                    <option value selected="selected">-- Select Plant Giver--</option>
                                    @foreach ($plant as $pln)
                                        <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="flocation">Location Giver</label>
                                <div class="col-sm-8">
                                  <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                      <option value selected="selected">-- Select Location Giver --</option>
                                      @foreach ($lokasi as $lok)
                                          <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Report Status</label>
                              <div class="col-sm-8" style="padding-top: 5px;">
                                <span id="fpic_location">-</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="col-sm-4 control-label" for="fplant1">Plant Request</label>
                              <div class="col-sm-8">
                                <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                    <option value selected="selected">-- Select Plant Request--</option>
                                    @foreach ($plant as $pln)
                                    <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="flocation">Location Request</label>
                              <div class="col-sm-8">
                                  <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                      <option value selected="selected">-- Select Location Request --</option>
                                      @foreach ($lokasi as $lok)
                                          <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>

                      <div style="text-align:right; margin:10px;">
                        <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
                          <i class="fa fa-refresh"></i>
                          Refresh
                        </button>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead class="table-dark">
                              <tr>
                                <th>No</th>
                                <th>No BPM</th>
                                <th>No Surat Jalan</th>
                                <th>Location Giver</th>
                                <th>Location Request</th>
                                <th>Date</th>
                                <th>Qty Item</th>
                                <th>Status</th>
                                <th>Process</th>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Add Data Tool Transfer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form action="{{url('/scheduleassign')}}" method="post">
              @csrf
                <div id="modnormal" style="display: block;">
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                              <div class="panel-title">Request and Giver</div>
                                  <div class="panel-options">
                                      <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                  </div>
                              </div>
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-sm-6">                                  
                                      <div class="form-group">
                                          <label class="control-label">Plant Request</label>
                                          <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                            <option value selected="selected">-- Select Plant request--</option>
                                            @foreach ($plant as $pln)
                                                <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label">Location Request</label>
                                          <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                              <option value selected="selected">-- Select Location Request --</option>
                                              @foreach ($lokasi as $lok)
                                                  <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label">PIC Warehouse</label>
                                          <select class="chosen-select" id="idPic" name="idPic" data-placeholder="Select Location" required>
                                              <option value selected="selected">-- Select PIC Warehouse --</option>
                                              @foreach ($pic as $p)
                                                  <option value="{{$p->idPic}}">{{$p->nama_lokasi}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">                                  
                                      <div class="form-group">
                                          <label class="control-label">Plant Giver</label>
                                          <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                                            <option value selected="selected">-- Select Plant Giver--</option>
                                            @foreach ($plant as $pln)
                                                <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label">Location Giver</label>
                                          <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                                              <option value selected="selected">-- Select Location Giver --</option>
                                              @foreach ($lokasi as $lok)
                                                  <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                  </div>  
                                </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <div class="panel-title">BPM</div>
                                      <div class="panel-options">
                                          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                      </div>
                                  </div>
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="col-sm-6">  
                                        <div class="form-group">
                                          <label for="field-3" class="control-label">No BPM </label>
                                          <input type="text" class="form-control" id="" name="" required="required" placeholder="No BPM...">
                                        </div>
                                        <div class="form-group">
                                          <label for="field-3" class="control-label">Date Request </label>
                                          <input type="text" class="form-control" id="DateRequest" name="DateRequest" placeholder=" Date Request.. ">
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="field-3" class="control-label">BPM Note</label>
                                            <input type="text" class="form-control" id="BPM_Note" name="BPM_Note" placeholder=" BPM Note ... ">
                                        </div>
                                        <div class="form-group">
                                          <b>BPM File</b>
                                          <input type="file" name="file">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">BPM Upload Date</label>
                                              <input type="date" class="form-control" id="BPM_Upload" name="BPM_Upload">
                                        </div>
                                      </div>  
                                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Request Tool</div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="control-label">Tool</label>
                                            <input type="hidden" name="idTransfertool" id="idTransfertool">
                                                <select class="chosen-select" id="id_tool" name="id_tool" data-placeholder="Select Project" required>
                                                    <option value selected="selected">-- Select Tool --</option>
                                                    @foreach ($tool as $to)
                                                        
                                                        <option value="{{$to->idtool}}">[{{$to->tool_code}}] {{$to->tool_name}}</option>
                                                    
                                                    @endforeach
                                                </select>
                                        </div>
                                      <div class="form-group">
                                        <label for="field-3" class="control-label">Measurement</label>
                                        <!-- <input type="text" class="form-control" id="DateRequest" name="DateRequest" placeholder=" Date Request.. "> -->
                                      </div>
                                      <div class="form-group">
                                        <label for="field-3" class="control-label">Specification</label>
                                        <!-- <input type="text" class="form-control" id="DateRequest" name="DateRequest" placeholder=" Date Request.. "> -->
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="field-3" class="control-label">Available Stock</label>
                                          <!-- <input type="text" class="form-control" id="BPM_Note" name="BPM_Note" placeholder=" BPM Note ... "> -->
                                      </div>
                                      <div class="form-group">
                                        <label for="field-3" class="control-label">QTY Requested</label>
                                        <div class="input-group">
                                          <input type="number" style="text-align:right;" class="form-control" id="duration" name="duration">
                                          <span class="input-group-addon" style="background-color:#dddcdc;"></span>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>
                                </div>
                            </div>
                        </div>
                  </div> <div class="model-footer" style="text-align:right;">
                 <button type="submit" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
              </div>
                </div>
               
            </form>
          </div>
    </div>
  </div>
</div>

 @endsection