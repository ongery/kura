@extends('layouts.app')

@section('content')


    <div class="container" id="container">

        <div class="form-container sign-up">
            <form method="POST" action="#">
                @csrf
                <h1>Create Account</h1>
                {{-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div> --}}
                {{-- <span>or use your email for registeration</span> --}}
                <input id="name" placeholder="First Name" type="text" class="form-control @error('Fname') is-invalid @enderror"
                                    name="Fname" value="{{ old('Fname') }}" required autocomplete="Fname" autofocus>
                @error('Fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="name" placeholder="Last Name" type="text" class="form-control @error('Lnamename') is-invalid @enderror" name="Lname"
                value="{{ old('Lname') }}" required autocomplete="Lname" autofocus>

                @error('Lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button type="submit" >Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Sign In</h1>
                {{-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div> --}}
                {{-- <span>Use your email password</span> --}}

                <input id="email" placeholder="Email" type="text" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror 

                <input  id="password" placeholder="Password" type="password"
                class="form-control @error('password') is-invalid @enderror" name="password"
                required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{-- <a href="#">Forget Your Password?</a> --}}

                
                {{-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="d-flex"> --}}

                        <div style="width: 100%">
                            <input style="width: 40px"  type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>

                            <span class="fw-bold fs-5" for="remember">
                                {{ __('Remember Me') }}
                            </span>
                        </div>

                        <button type="submit" style="margin-bottom: 15px; background: #258c37;">Sign In</button>


                    <div class="col-md-6 mt-5">

                        @if (Route::has('password.request'))
                        <a class="btn btn-link  text-white" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif

                    </div>

                {{-- </div> --}}



              

            </form>
        </div>

        <div class="toggle-container" >
            <div class="toggle" >
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>

                <div class="toggle-panel toggle-right"  >
                    
                    <div class="row justify-content-center" >
                        <img src="{{asset('/img/KURAlogo.png')}}" alt="Logo"  style="height:200px;  width:200px; margin-left:10px; margin-top:-30px;">
                    </div>
                    <h1 style="margin-top:15px; margin-bottom:30px;">
                        <span style="font-size: 50px; margin-left:1px; font-weight:700; color: #4a4a49;" >KURA</span>
                        {{-- <span style="font-size: 50px; margin-left:-16px; color: #ff0000;  letter-spacing: 0.3px; font-weight:700"> Top</span> --}}
                    </h1>
                    {{-- &  --}}
                    {{-- GOVERNANCE --}}
                    <p class="" style="margin-top:-21px; font-weight:500; color:#fff"> RISK MANAGEMENT SYSTEM</p>
                    {{-- <button class="hidden" id="register">Sign Up</button> --}}
                </div>

            </div>
        </div>

    </div>

    <script>
        localStorage.removeItem('authToken');
    </script>


@endsection
