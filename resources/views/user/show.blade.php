@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><center><strong> <i class="fa fa-info"></i>  Detail Data User </strong> </center></h3>
     </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <hr width="100%">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="moddetail" style="display: block;">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">User Info</div>
                                
                                            <div class="panel-options">
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status</label>
                                            <span> </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Keterangan</label>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">Detail User</div>
                                
                                            <div class="panel-options">
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Username</label>
                                            <span>{{ $user->username }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password</label>
                                            <span>{{ $user->password }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Level</label>
                                            <span>{{ $user->level }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Keterangan</label>
                                            <span>{{ $user->keterangan }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Asli</label>
                                            <span>{{ $user->name }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <span>{{ $user->email }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status</label>
                                            <span>{{ $user->status }}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">User Info</div>
                                
                                            <div class="panel-options">
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                    <div class="panel-body">Panel Content</div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="model-footer" style="text-align:right;">
                            <a class="on-default edit-row btn btn-danger" href="{{url('/user/')}}"> OK</a>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
</section>

@endsection
