@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
    <li class="breadcrumb-item">Transaction</a></li>
    <li class="breadcrumb-item">Monitoring</a></li>
    <li class="breadcrumb-item"><strong>Schedule realization</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Schedule Realization</strong> </h3>
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

        <form method="POST" class="form-horizontal cmxform validate" role="form" id="form_filter" style="margin: 0px 0px 10px 0px; padding:20px;" novalidate="novalidate">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="fplant1">Plant</label>
                <div class="col-sm-8">
                  <select class="chosen-select" id="id_plant" name="id_plant" data-placeholder="Select Plant" required>
                      <option value selected="selected">-- Select Plant--</option>
                      @foreach ($plant as $pln)
                          <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                      @endforeach
                  </select>

                </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 control-label" for="flocation">Project</label>
                  <div class="col-sm-8">
                    
                    <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                        <option value selected="selected">-- Select Project --</option>
                        @foreach ($project as $pro)
                            <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                        @endforeach
                    </select>

                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label" for="flocation">Train Set</label>
                  <div class="col-sm-8">
                    
                    <select class="chosen-select" id="idTrainset" name="idTrainset" data-placeholder="Select Train Set" required>
                        <option value selected="selected">-- Select Train Set --</option>
                        @foreach ($trainset as $tra)
                            <option value="{{$tra->idTrainset}}">[{{$tra->carNumber}}] {{$tra->carName}}</option>
                        @endforeach
                    </select>

                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label" for="flocation">Year</label>
                  <div class="col-sm-8">
                    <select class="chosen-select" id="" name="" data-placeholder="Select Year" required>
                        <option value selected="selected">-- Select Year --</option>
                        <option value="2018" name="" class="pil2018">2018</option>
                        <option value="2019" name="" class="pil2019">2019</option>
                        <option value="2020" name="" class="pil2020">2020</option>
                        <option value="2021" name="" class="pil2021">2021</option>
                        <option value="2022" name="" class="pil2022">2022</option>
                        <option value="2023" name="" class="pil2023">2023</option>
                        <option value="2024" name="" class="pil2024">2024</option>
                        <option value="2025" name="" class="pil2025">2025</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label" for="flocation">Month</label>
                  <div class="col-sm-8">
                    <select class="chosen-select" id="" name="" data-placeholder="Select Month" required>
                        <option value selected="selected">-- Select Month --</option>
                        <option value="January" name="" class="pilJanuary">January</option>
                        <option value="February" name="" class="pilFebruary">February</option>
                        <option value="March" name="" class="pilMarch">March</option>
                        <option value="April" name="" class="pilApril">April</option>
                        <option value="May" name="" class="pilMay">May</option>
                        <option value="June" name="" class="pilJune">June</option>
                        <option value="July" name="" class="pilJuly">July</option>
                        <option value="August" name="" class="pilAugust">August</option>
                        <option value="September" name="" class="pilSeptember">September</option>
                        <option value="October" name="" class="pilOctober">October</option>
                        <option value="November" name="" class="pilNovember">November</option>
                        <option value="December" name="" class="pilDecember">December</option>
                    </select>
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
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead class="table-dark">
                    <tr>
                        <th rowspan="2"><center>No</center></th>
                        <th rowspan="2"><center>Trainset</center></th>
                        <th colspan="31"><center>August 2020</center></th>
                        <th rowspan="2"><center>Action</center></th>
                    </tr>
                    <tr>
                        <th>1</th><th>2</th><th>3</th>
                        <th>4</th><th>5</th><th>6</th>
                        <th>7</th><th>8</th><th>9</th>
                        <th>10</th><th>11</th><th>12</th>
                        <th>13</th><th>14</th><th>15</th>
                        <th>16</th><th>17</th><th>18</th>
                        <th>19</th><th>20</th><th>21</th>
                        <th>22</th><th>23</th><th>24</th>
                        <th>25</th><th>26</th><th>27</th>
                        <th>28</th><th>29</th><th>30</th><th>31</th>
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



  <!-- container -->
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Data Schedule Realization</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="{{url('/schedule_realization')}}" method="post">
          @csrf
            <div class="form-group">
                <label class="control-label">Plant</label>
                <input type="hidden" name="idPic" id="idPic">
                    <select class="chosen-select dynamic" id="id_plant" name="id_plant" data-dependent="idProject" data-placeholder="Select Plant" required>
                        <option value selected="selected">-- Select Plant --</option>
                        @foreach ($plant as $pln)
                            
                            <option value="{{$pln->id_plant}}">[{{$pln->kode}}] {{$pln->nama_plant}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Project</label>
                <input type="hidden" name="idPic" id="idPic">
                    <select class="chosen-select" id="idProject" name="idProject" data-placeholder="Select Project" required>
                        <option value selected="selected">-- Select Project --</option>
                        @foreach ($project as $pro)
                            
                            <option value="{{$pro->idProject}}">[{{$pro->proCode}}] {{$pro->proName}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label">Trainset</label>
                <input type="hidden" name="idTrainset" id="idTrainset">
                    <select class="chosen-select" id="idTrainset" name="idTrainset" data-placeholder="Select Trainset" required>
                        <option value selected="selected">-- Select Trainset --</option>
                        @foreach ($trainset as $pro)
                            
                            <option value="{{$pro->idTrainset}}">[{{$pro->setCode}}] {{$pro->setName}}</option>
                        
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
              <label class="control-label">Maintenance</label>
              <select class="chosen-select" id="id_maintenance" name="id_maintenance" data-placeholder="Select Plant" required>
                <option value selected="selected">-- Select Maintenance--</option>
                @foreach ($maintenance as $main)
                    <option value="{{$main->id_maintenance}}">[{{$main->codeMain}}] {{$main->nameMain}}</option>
                @endforeach
            </select>
          </div>
            <div class="form-group">
                <label class="control-label">Date</label>
                  <input type="date" class="form-control" id="firstDate" name="firstDate">
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