@extends('layouts.app')

@section('content')

<div class="container">

      <section class="section register min-vh-85 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center pb-3">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="public/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Upskill</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 pt-1 mt-0 fs-4">Login to Your Account</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-12">
                        <label for="yourUsername" class="form-label">Username</label>
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="col-12">
                        <a href="{{ url('auth/google') }}" class="btn btn-danger p-0 w-100">
                            <img src="{{ asset('public/assets/img/google_logo6.png') }}" height="36" width="38" class="google-img">
                            Sign in with Google
                        </a>
                    </div>
                    <div class="col-12 text-center">
                      <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>

@endsection
