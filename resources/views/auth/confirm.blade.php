@extends('agent.layout.auth')

@section('content')

<div class="form-login zoomIn animated">
            <div class="form-login-inner">
                <!-- Logo section start here-->
                <div class="logo-wrap">
                    <a href="javascript:void(0)">
                        <img src="{{URL::asset('theme/assets/images/logo.jpg')}}" alt="Carry First" />
                    </a>
                </div>
                <!-- Logo section close here-->
                <h1>Register User</h1>
                <div class="alert alert-success fade in">
                    <p class="description">Your email id  now confirm. You can click on the login button for login.
                    </p>
                </div>
                <div class="form-group">
                    <div class="btn-holder center-align-block two-btn">
                        <a href="{{route('agent.register')}}" class="btn back hvr-ripple-out">Back</a>
                        <a href="{{route('agent.login')}}" class="btn success hvr-ripple-out">Login</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
