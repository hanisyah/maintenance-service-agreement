@extends('layouts.app2')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card " style="background-color:rgba(255,255,255,0.5);" >
                
                <div class="card-body">
                  <div style="font-weight:800;  
                                color: red;
                                color: black;
                                font-family: Calibri, Helvetica, Arial, sans-serif;
                                text-shadow: 3px 3px 0px #D7DACC, 8px 8px 0px rgba(0, 0, 0, 0.15);">
                    <h1><center>MSA</center></h1>
                  </div>
                    <center><strong>Maintenance Service Agreement</strong></center>
                </div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="username"  class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> -->
                        <div class="col-md-12">
                                <input id="username" style="background-color:rgba(255,255,255,0.5);"  type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                                @error('username') 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" style="background-color:rgba(255,255,255,0.5);"  class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check" style="text-align:center;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <center><strong>{{ __('Keep me signed in') }}</strong></center>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row float-center">
                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-dark" style="width:315px;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                @if (Route::has('password.request'))
                                <div style="text-align:center; color:black;">
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
