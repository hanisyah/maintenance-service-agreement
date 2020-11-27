@extends('layouts.app')
@section('content')

<div class="col-lg-12" style="margin:10px;">
     <div style="color: #4a4c59;">
        <h3><strong>  Update Data User </strong> </h3>
     </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <hr width="100%">
                <div class="card">
                    <div class="card-body">

                                <!-- container -->
                            
                                <form action="{{url('/user/'.$user->id)}}" method="post">
                                    
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="id" id="id"> <br/>

                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required="required" placeholder="Username...">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password...">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ulangi Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required="required" placeholder="Ulangi Password...">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >Level</label>
                                        <select class="chosen-select" id="level"  name="level"  required>
                                            <option value selected="selected">-- Select Level --</option>
                                            <option value="Administrator" {{ $user->level == 'Administrator' ? 'selected' : '' }}  >Administrator</option>
                                            <option value="AdminPlant" {{ $user->level == 'AdminPlant' ? 'selected' : '' }}>Admin Plant</option>
                                            <option value="WarehouseLocation" {{ $user->level == 'WarehouseLocation' ? 'selected' : '' }}>Warehouse Location</option>
                                            <option value="OperatorLocation" {{ $user->level == 'OperatorLocation' ? 'selected' : '' }}>Operator Location</option>
                                            <option value="PICProject" {{ $user->level == 'PICProject' ? 'selected' : '' }}>PIC Project</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >Keterangan</label>
                                        <select class="chosen-select" id="keterangan"  name="keterangan"  required>
                                            <option value selected="selected">-- Select Keterangan --</option>
                                            <option value="-" {{ $user->keterangan == '-' ? 'selected' : '' }}>-</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required="required" placeholder="Nama...">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required="required" placeholder="Email...">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >Status</label>
                                        <select class="chosen-select" id="status"  name="status"  required>
                                            <option value selected="selected">-- Select Status --</option>
                                            <option value="Aktif" {{ $user->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="Tidak" {{ $user->status == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                    </div>
                                    <div class="model-footer" style="text-align:right;">
                                        <a class="on-default edit-row btn btn-danger" href="{{url('/user/')}}"> Back</a>
                                        <input class="on-default edit-row btn btn-primary" type="submit" value="Save">
                                    </div>
                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
