@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
  <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Location</li>
    <li class="breadcrumb-item">Stock</li>
    <li class="breadcrumb-item"><strong>Tool</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Tool Stock </strong> </h3>
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

          <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fplant1">Plant Location</label>
                  <div class="col-sm-8">
                    <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
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
                      
                      <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
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
            </div>
          </form>

        <div style="text-align:right; margin:10px;">
          <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
        <br>

        <div class="card">
          <div class="card-body">
                <div class="card-body">
                  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark" style="text-align:center;">
                      <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Tool Code</th>
                        <th rowspan="2">Tool Name</th>
                        <th rowspan="2">Tool Measurement</th>
                        <th colspan="8"><center>Stock Info</center></th>
                        <th rowspan="2">Detail Stock</th>
                      </tr>
                      <tr>
                        <th>All</th>
                        <th>Available</th>
                        <th>Used</th>
                        <th>Locked Transfer</th>
                        <th>Calibration Required</th>
                        <th>Calibration Queue</th>
                        <th>Calibration Process</th>
                        <th>Scrap</th>
                      </tr>
                    </thead>
                    <tbody>      
                            @php $i = 1 @endphp
                            @foreach($stocktool as $tool)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$tool->tool->tool_code}}</td>
                            <td>{{$tool->tool->tool_name}}</td>
                            <td>{{$tool->measurement->Measurement_Name_2}}</td>
                            <td>{{$tool->all}}</td>
                            <td>{{$tool->available}}</td>
                            <td>{{$tool->used}}</td>
                            <td>{{$tool->locked}}</td>
                            <td>{{$tool->process}}</td>
                            <td>{{$tool->required}}</td>
                            <td>{{$tool->queue}}</td>
                            <td>{{$tool->process}}</td>
                            <td>
                            <a href="/stocktool/detail/{{ $tool->id_stocktool}}"  class="on-default edit-row btn btn-success" ><i class="fa fa-shopping-cart"></i></a>
                            </td>
                          </tr>
                            @endforeach
                    </tbody>
                    </table>
                    <br>
                    <br>
                    <table id="datatable" class="col-lg-3 col-5">
                      <thead class="table-dark" style="text-align:center;">
                        <tr>
                          <th colspan="2">Information</th>
                        </tr>
                      </thead>
                       <tbody>
                        <tr>
                          <td width="30 px" style="background-color: #7FFFD4;"></td>
                         	<td> Available (Free) </td>
                        </tr>
                        <tr>
                          <td style="background-color: #FFE4C4;"></td>
                          <td> Need Calibration </td>
                        </tr>
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
          <h4 class="modal-title">Add Data Stock Tool</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Stock Detail</div>
            
                      <div class="panel-options">
                          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                      </div>
                </div>
                <div class="panel-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Plant </label>
                      <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                          <option value selected="selected">-- Select Plant --</option>
                          @foreach ($plant as $pln)
                              <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Location </label>
                      <select class="chosen-select" id="id_lokasi" name="id_lokasi" data-placeholder="Select Location" required>
                          <option value selected="selected">-- Select Location  --</option>
                          @foreach ($lokasi as $lok)
                              <option value="{{$lok->id_lokasi}}">{{$lok->nama_lokasi}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label class=" control-label">PIC Warehouse</label>
                        <select class="chosen-select" id="" name="" data-placeholder="Select PIC Project" required>
                            <option value selected="selected">-- Select PIC Project --</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="field-3" class="control-label">Stock In Date </label>
                        <input type="date" class="form-control" id="" name="" required="required" placeholder="Document Number...">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="field-3" class="control-label">Document Number </label>
                      <input type="text" class="form-control" id="" name="" required="required" placeholder="Document Number...">
                    </div>
                    <div class="form-group">
                      <b>Document File</b>
                      <p>(Max. @File Upload Size 5 MB - File allowed : jpg, jpeg, pjpeg, png, bmp, gif, zip, pdf, doc, docx, xls, xlsx, ppt, pptx)</p>
                      <input type="file" name="file">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Document File</label>
                      <div>
                        <input type="file" class="form-control" placeholder="Document File..." data-validate="required">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Stock List</div>
            
                      <div class="panel-options">
                          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                      </div>
                </div>
                <div class="panel-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Tool</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Unique Number</label>
                      <input type="text" class="form-control" id="" name="" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Specification</label>
                        <input type="text" class="form-control" id="" name="" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Measurement</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Normal Duration Use</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="model-footer" style="text-align:right;">
                <button type="submit" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
