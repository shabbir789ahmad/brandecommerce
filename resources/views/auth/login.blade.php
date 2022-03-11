@extends('master.master')

@section('content')

<style type="text/css">
   
    .login{
        font-family: ;
        font-size: 2rem;
        font-weight: 650;
        text-align: center;
        width: 100%;
    }
    .btn_color{
        background: #570530;
        color: #ffffff;
    }
</style>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            @if(session()->has('agenerror'))
            <div class="alert alert-danger">
           <strong>Error!</strong>{{session()->get('agenerror')}}
            </div>
            @endif
            <div class="card shadow " style="border: 1.2px solid #002F34;">
                
                <div class="card-header  login">{{ __('Welcome ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                         <div class="col-md-12">
                            <label for="email" class="  text-md-end"><i class="fa fa-fw fa-envelope"></i>
                        Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-12">
                                <label for="password" class=" text-md-end"><i class="fa fa-fw fa-key"></i>
                        Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-6">
                             @if (Route::has('password.request'))
       <a class="text-dark rounded text-light" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
          </a>
     @endif
                        </div>
 </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn_color btn-block">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                             <div class="col-md-12 mt-4 p-0 text-center">
                               <a class=" mt rounded text-dark " href="{{ route('register') }}">
        {{ __('Create Your Account') }}
          </a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
