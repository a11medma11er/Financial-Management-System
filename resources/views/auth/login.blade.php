@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            {{-- <div class="col-md-12 col-lg-12 col-xl-4 d-none d-md-flex ">
					<div >
						<div class="col-md-17 col-lg-17 col-xl-17 my-auto mx-auto wd-200p">
							<img src="{{URL::asset('assets/img/media/login.jpg')}}" class="my-auto ht-xl-150p wd-md-300p wd-xl-150p mx-auto" alt="logo">
						</div>
					</div>
				</div> --}}
            <!-- The content half -->
            <div class="col-md-4 col-lg-4 col-xl-12 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-6 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>Welcome back!</h2>
                                            <h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label> <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label> <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="ckbox">
                                                        <input type="checkbox" name="remember" id="remember"
                                                            {{ old('remember') ? 'checked' : '' }}>
                                                        <span>Remember me</span>
                                                    </label>
                                                </div>
                                                <button class="btn btn-main-primary btn-block">Sign In</button>
                                                {{-- <div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div> --}}
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a></p>
                                                <p>Don't have an account? <a href="{{ url('/' . ($page = 'register')) }}">Create
                                                        an Account</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection