@extends('layouts.app')
@section('content')




<section class="content">
  <div class="data-table-area mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
    
          <div style="text-align:left; ">
            <h1><i  class="fa fa-shopping-cart"> Tool Stock Detail </i></h1>
          </div>

          <div style="padding:20px;">
            <a class="on-default edit-row btn btn-dark" href="{{url('/stocktool/')}}" ><i class="fa fa-arrow-left text-sm "> Back</i></a>
          </div>

          <div style="padding:50px;">
            <div class="row">
              <table>
                @foreach($stocktool as $tool)
                <tr>
                  <td><b>Code</b></td>
                  <td>: {{$tool->tool->tool_code}}</td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td  width="500px">:  {{$tool->tool->tool_name}}</td>
                </tr>
                <tr>
                  <th>Measurement</th>
                  <td>:  {{$tool->measurement->Measurement_Name_2}}</td>
                </tr>
                <tr>
                  <th>Normal Duration Use</th>
                  <td>:  {{$tool->all}}</td>
                </tr>
                <tr>
                  <th>Need calibrate</th>
                  <td>: {{$tool->available}}</td>
                </tr>
                <tr>
                  <th>Specification</th>
                  <td>:  {{$tool->used}}</td>
                </tr>
                @endforeach
              </table>

              <table class="float-right">
                @foreach($stocktool as $tool)
                <tr>
                  <th><b>Stock Plant Location</b></th>
                </tr>
                <tr>
                  <th>Plant</th>
                  <td>:  [{{$tool->plant->kode}}] {{$tool->plant->nama_plant}}</td>
                </tr>
                <tr>
                  <th>Location</th>
                  <td>:  {{$tool->lokasi->nama_lokasi}}</td>
                </tr>
                <tr>
                  <th><b>Stock Info</b></th>
                </tr>
                <tr>
                  <th>Measurement</th>
                  <td>:  167.67 km<sup>2</sup></td>
                </tr>
                <tr>
                  <th>Normal Duration Use</th>
                  <td>:  Sunda</td>
                </tr>
                <tr>
                  <th>Need calibrate</th>
                  <td>:  +62 22</td>
                </tr>
                <tr>
                  <th>Specification</th>
                  <td>:  +62 22</td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>

            <div class="row card-body">
                    <div class="col-lg-12">
                        <div class="project-details-tab">
                            <ul class="nav nav-tabs res-pd-less-sm">
                                <li class="active" ><a data-toggle="tab" href="#home">Train availability</a>
                                </li>
                                <li><a data-toggle="tab" href="#menu1">Train Reliability</a>
                                </li>
                            </ul>
                            <div class="tab-content res-tab-content-project">
                                <div id="home" class="tab-pane fade in active animated zoomInLeft">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="charts-single-pro shadow-reset">
                                            <div class="alert-title">
                                                <h2>Bar Chart Stacked</h2>
                                                <p>A bar chart provides a way of showing data values represented as Stacked bars. It is sometimes used to show trend data, and the comparison of multiple data sets</p>
                                            </div>
                                            <div id="bar5-chart">
                                                <canvas id="barchart5"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div id="menu1" class="tab-pane fade animated bounceInUp">
                                    <div class="project-details-completeness">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="datatable" >
                     <!-- <div class="col-lg-8"> -->
                      <thead class="table-dark" style="text-align:center; padding:10px;  ">
                        <tr>
                          <th colspan="2">Information</th>
                        </tr>
                      </thead>
                     </div>
                       <tbody>
                        <tr >
                          <td width="30 px" style="background-color: #A8E1D6;"></td>
                         	<td> Tool Stock is in Maximum Used </td>
                        </tr>
                        <tr>
                          <td style="background-color: #BCA7D3;"></td>
                          <td> In the near term Tool Stock needs to be calibrated </td>
                        </tr>
                        <tr>
                          <td style="background-color: #CBE96B;"></td>
                         	<td> Tool Stock should be calibrated </td>
                        </tr>
                        <tr>
                          <td width="30 px" style="background-color: #FFE4C4;"></td>
                         	<td> Tool Stock has been Scrapped </td>
                        </tr>
                       </tbody>
                    
                    </table>

          </div>
        </div>
      </div>
    </div>
</section>
@endsection