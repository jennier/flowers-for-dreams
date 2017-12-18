@extends('layouts.app')

@section('content')
<div class="container">

    <!-- start modal window -->
    <div class="modal show bd-example-modal-lg" id="welcome" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- start modal content -->

        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row vertical-align">
                      <div class="col-md-6 col-sm-0 image-col hidden-sm hidden-xs"><img src="http://lorempixel.com/539/600/nature/1"></div>
                      <div class="col-md-6 col-sm-12 text-center">
                                <span class="logo">
                                    <img src="https://www.flowersfordreams.com/images/logo-bloom.svg" alt="Flowers for Dreams">
                                </span>
                                @guest
                                <h1>Welcome Dreamer!</h1>
                                <p>Pick one to track your purchases and check out faster.</p>
                                @else
                                <h1>Welcome {{ Auth::user()->name }}!</h1>
                                <p>You're logged in as {{ Auth::user()->email }}.</p>
                                @endguest
                                
                            
                             @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                             @endif

                            @guest
                                    <a href="#login" role="button" class="btn btn-main" data-toggle="modal" data-target="#login" data-dismiss="modal" data-backdrop="false">Login</a>
                               
                                     <a href="#register" role="button" class="btn btn-main" data-target="#register" data-toggle="modal" data-dismiss="modal" data-backdrop="false">Sign Up</a>
                             
                            @else
              
                                    <a href="{{ route('logout') }}" class="btn btn-main" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                          
                            @endguest
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- end modal content -->

    </div>
  </div>
  <!-- end modal window -->

<!-- login -->

  <!-- start modal window -->
    <div class="modal bd-example-modal-lg" id="login" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- start modal content -->

        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
               
                      <div class="col-md-6 col-sm-0 image-col hidden-sm hidden-xs"><img src="http://lorempixel.com/539/600/nature/1"></div>
                      <div class="col-md-6 col-sm-12 text-col">
                        <div class="row header">
                                <div class="col-md-2"><h1>Login</h1></div>
                                <div class="col-md-10 text-right">
                                    <a href="" class="btn btn-social btn-facebook"><i class="fab fa-facebook-f"></i>
                                        Facebook</a>
                                    <a href="" class="btn btn-social btn-google"><i class="fab fa-google-plus-g"></i>
                                        Google</a>
                                </div>
                        </div>
                        <div class="row content">
                        <form method="POST" id="{{ route('login') }}" class="bootstrap-modal-form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    <span class="help-block">
                                        <strong id="email-error"></strong>
                                    </span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                 <small><a href="#reset" data-toggle="modal" data-target="#reset" data-dismiss="modal" data-backdrop="false" class="password-request">Forgot Your Password?</a></small>
                                 <input id="password" type="password" class="form-control" name="password" required>
                                    <span class="help-block">
                                        <strong id="password-error"></strong>
                                    </span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-main">Login</button>
                            </div>
                        </form> 
                        </div>
                        <div class="row footer">
                            <span class="text-center"><p>Don't have an account? <a href="#register" data-toggle="modal" data-target="#register" data-dismiss="modal" data-backdrop="false">Sign up.</a></p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end modal content -->

    </div>
  </div>
  <!-- end modal window -->

<!-- register -->

  <!-- start modal window -->
    <div class="modal bd-example-modal-lg" id="register" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- start modal content -->

        <div class="modal-content">

            <div class="modal-body">
                <div class="container-fluid">
                      <div class="col-md-6 col-sm-0 image-col hidden-sm hidden-xs"><img src="http://lorempixel.com/539/600/nature/1"></div>
                      <div class="col-md-6 col-sm-12 text-col">
                            <div class="row header">
                                <div class="col-md-5"><h1>Sign Up</h1></div>
                                <div class="col-md-7 text-right">
                                    <a href="" class="btn btn-social btn-facebook"><i class="fab fa-facebook-f"></i>
                                        Facebook</a>
                                    <a href="" class="btn btn-social btn-google"><i class="fab fa-google-plus-g"></i>
                                        Google</a>
                                </div>
                            </div>
                            <div class="row content">
                                <form method="POST" id="{{ route('register') }}" class="bootstrap-modal-form">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <span class="help-block">
                                            <strong id="email-error"></strong>
                                        </span>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                        
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>

                                        <input id="password" type="password" class="form-control" name="password" required min="6">
                                        <span class="help-block">
                                            <strong id="password-error"></strong>
                                        </span>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="control-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required min="6">
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-main" id="submitRegisterForm">Sign Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="row footer">
                            <span class="text-center"><p>Already have an account? <a href="#login" data-toggle="modal" data-target="#login" data-dismiss="modal" data-backdrop="false">Login.</a></p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end modal content -->

    </div>
  </div>
  <!-- end modal window -->

<!-- password reset -->

  <!-- start modal window -->
    <div class="modal bd-example-modal-lg" id="reset" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- start modal content -->

        <div class="modal-content">

            <div class="modal-body">
                <div class="container-fluid">
                      <div class="col-md-6 col-sm-0 image-col hidden-sm hidden-xs"><img src="http://lorempixel.com/539/600/nature/1"></div>
                      <div class="col-md-6 col-sm-12 text-col">
                        <div class="row content">
                            <h1>Reset your password</h1>
                            <form method="POST" id="{{ route('password.email') }}" class="bootstrap-modal-form">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-main">Send Reset Link</button>
                                </div>
                            </form>
                        </div>
                        <div class="row footer">
                            <span class="text-center"><p>Don't have an account? <a href="#register" data-toggle="modal" data-target="#register" data-dismiss="modal" data-backdrop="false">Sign up.</a></p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end modal content -->

    </div>
  </div>
  <!-- end modal window -->

</div>   
@endsection
