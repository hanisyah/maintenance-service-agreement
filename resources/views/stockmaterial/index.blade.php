@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Location</a></li>
    <li class="breadcrumb-item">Stock</li>
    <li class="breadcrumb-item"><strong>Material</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Material Stock </strong> </h3>
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
                  <label class="col-sm-4 control-label" for="fplant1">Plant </label>
                  <div class="col-sm-8">
                    <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant --</option>
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
                <div class="form-group">
                  <label class="col-sm-4 control-label">Calibration Required</label>
                    <div class="col-sm-8">
                      <select  class="chosen-select" tabindex="-1">
                          <option  selected="false"> -- Select Calibration Required -- </option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                      </select>           
                    </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Plant Project </label>
                    <div class="col-sm-8">
                      <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                          <option value selected="selected">-- Select Plant Project --</option>
                          @foreach ($plant as $pln)
                              <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" for="fproject">Project </label>
                    <div class="col-sm-8">
                      <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                          <option value selected="selected">-- Select Project  --</option>
                          
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Project Date</label>
                    <div class="col-sm-8">
                      <span>-</span>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">PIC Project</label>
                    <div class="col-sm-8">
                    <span>-</span>
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
                        <th>No</th>
                        <th>Material Code</th>
                        <th>Material Name</th>
                        <th>Material Measurement</th>
                        <th>Normal Duration Use (Day)</th>
                        <th>Minimum Stock</th>
                        <th>Available Stock</th>
                        <th>Normal Consumption</th>
                        <th>Consumption Plant</th>
                        <th>Detail Stock</th>
                      </tr>
                    </thead>
                    <tbody>      
                            @php $i = 1 @endphp
                            @foreach($stockmaterial as $tool)
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
                            <a class="on-default edit-row btn btn-success" href=""><i class="fas fa-shopping-cart"></i></a>
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
                          <th colspan="2"><center>Information</center></th>
                        </tr>
                      </thead>
                       <tbody>
                        <tr>
                          <td width="30 px" style="background-color: #fff1b7;"></td>
                         	<td> Need Restock </td>
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


<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Data Stock Material</h4>
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
                      <label for="field-3" class="control-label">Location</label>
                      <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                        id="id_lokasi" name="id_lokasi" required="required">
                        <option>-- Select Location--</option>
                        @foreach ($lokasi as $p)
                        <option value="{{$p->id_lokasi}}">{{$p->nama_lokasi}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="field-3" class="control-label">PIC Warehouse</label>
                      <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                        id="idPic" name="idPic" required="required">
                        <option>-- Select PIC--</option>
                        @foreach ($lokasi as $p)
                        <option value="{{$p->idPic}}">{{$p->status}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="field-3" class="control-label">Project</label>
                      <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                        id="idPic" name="idPic" required="required">
                        <option>-- Select Project--</option>
                        @foreach ($lokasi as $p)
                        <option value="{{$p->idPic}}">{{$p->status}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="field-3" class="control-label">PIC Project</label>
                      <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1"
                        id="idPic" name="idPic" required="required">
                        <option>-- Select PIC--</option>
                        @foreach ($lokasi as $p)
                        <option value="{{$p->idPic}}">{{$p->status}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Stock In Date </label>
                        <input type="date" class="form-control" id="" name="" required="required" placeholder="Document Number...">
                    </div>
                    <div class="form-group">
                        <label for="field-3" class="control-label">Document Number </label>
                        <input type="text" class="form-control" id="" name="" required="required" placeholder="Document Number...">
                    </div>
                    <div class="form-group">
                        <b>Document File</b>
                        <p>(Max. @File Upload Size 5 MB - File allowed : jpg, jpeg, pjpeg, png, bmp, gif, zip, pdf, doc, docx, xls, xlsx, ppt, pptx)</p>
                        <input type="file" name="file">
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
                        <label class="control-label">Material</label>
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
                    <div class="form-group">
                        <label class="control-label">Quantity per Stock</label>
                        <input type="text" class="form-control" id="" name="" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Measurement</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Minimum Stock Margin</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Normal Duration Use</label>
                        <input type="text" class="form-control" id="" name=""  required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lead Time</label>
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
