@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px;  font-size:13px; ">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Cofiguration</li>
    <li class="breadcrumb-item"><strong>Setting</strong></li>
  </ol>
</div>

<div class="col-lg-12" style="margin-left:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Setting</strong> </h3>
     </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

        <hr width="100%">
                
        <div class="card">
            <div class="card-body">
              <table id="datatable" class="table table-bordered table-striped projects">
                <thead class="table-dark" style="text-align:center;">
                    <tr>
                        <th>Key</th>
                        <th>Setting</th>
                        <th>value</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach($setting as $ting)
                    <tr>
                        <td width="70px">{{$ting->key}}</td>
                        <td>{{$ting->setting}}</td>
                        <td width="600px" style="text-align:right;">{{$ting->value}}</td>
                    </tr>
                    @endforeach -->
                    <tr>
                      <td style="text-align: left;vertical-align: middle;">train_avlb</td>
                      <td style="text-align: left;vertical-align: middle;">Train Availability Minimum</td>
                      <td style="text-align: left;vertical-align: middle;">
                        <input type="text" class="form-control" id="val" name="val"  placeholder="Train Availability Minimum..." value="87.95" style="text-align: right;">
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: left;vertical-align: middle;">train_set_avlb</td>
                      <td style="text-align: left;vertical-align: middle;">Train Set Availability Minimum</td>
                      <td style="text-align: left;vertical-align: middle;">
                        <input type="text" class="form-control" id="val" name="val" placeholder="Train Set Availability Minimum..." value="95" style="text-align: right;">
                      </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;vertical-align: middle;" colspan="3">
                          <button class="btn btn-success btn-sm btn-block" type="submit" >
                            <big><b>Save Setting</b></big>
                          </button>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div> 
    </div>
  </div>
</section>
@endsection
