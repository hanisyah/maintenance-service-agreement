@extends('layouts.app')
@section('content')


<div class="col-lg-12">
     <div style="text-align:left;">
        <h2  class="fas fa-shopping-cart"> Material Stock Detail </h2>
     </div>
     <br>
     <br> 
     <a class="on-default edit-row btn btn-dark" href="/stocktool" ><i class="fas fa-arrow-left text-sm "> Back</i></a>
      
        <div class="card-body">
         
            <div class="content">
                <div class="dialog">
     <div class="row">           
        <table>
          
  	      <tr>
	         <th>Code</th>
	         <td>:  Indonesia</td>
	      </tr>
	      <tr>
	         <th>Name</th>
	         <td>:  25 September 1810</td>
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
	         <td>:  +62 22UUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU</td>
	      </tr>
    </table>
  
    <table class="float-right">
          
  	      <tr>
	         <th>Code</th>
	         <td>:  Indonesia</td>
	      </tr>
	      <tr>
	         <th>Name</th>
	         <td>:  25 September 1810</td>
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
    </table>
</div>
</table>
          
<div class="card-body">
                  <table id="datatable" class="table table-bordered table-striped projects">
                    <thead class="table-dark" style="text-align:center;">
                      <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Tool Code</th>
                        <th rowspan="2">Tool Name</th>
                        <th rowspan="2">Tool Measurement</th>
                        <th colspan="8">Stock Info</th>
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
                   
                    </table>
                    <br>
                    <br>
                    <table id="datatable" class="col-lg-3 col-5">
                     <div class="col-lg-6">
                      <thead class="table-dark" style="text-align:center;">
                        <tr>
                          <th colspan="2">Information</th>
                        </tr>
                      </thead>
                     </div>
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

@endsection