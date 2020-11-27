@extends('layouts.app')
@section('content')

<div class="card-body">
  <ol class="breadcrumb" style="background-color:#e6212a; color: white; padding:10px; font-size:13px;">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Report</li>
    <li class="breadcrumb-item"><strong>Material Log</strong></li>
  </ol>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

                @if(session('success'))
                    <!-- ketika tampilan alert sukses-->
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                    <!--ketika tampilan alert error-->
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif

                  
              <div style="text-align:right; padding:10px;">
                <button type="submit" class="btn btn-success" value="Refresh" onClick="document.location.reload(true)">
                <i class="fa fa-refresh"></i>
                Refresh
                </button>
              </div>

        <div class="card">
          <div class="card-body">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" >
              <thead class="table-dark">
                <tr>
                  <th>Post Datetime</th>
                  <th>Status</th>
                  <th>Location & Project</th>
                  <th>Material Code</th>
                  <th>Material Name</th>
                  <th>Document Number</th>
                  <th>Document Datetime</th>
                  <th>Unique Number</th>
                  <th>Source</th>
                  <th>Quantity</th>
                  <th>Measurement</th>
                </tr>
              </thead>
              </tbody>
                  
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    
@endsection