@extends('agent.layout.auth')

@section('content')

<div class="form-login zoomIn animated">
            <div class="form-login-inner">
                <!-- Logo section start here-->
                <div class="logo-wrap" style="border-radius: 0px;width:70%;">
                    <a href="javascript:void(0)">
                        <img src="{{URL::asset('theme/assets/images/logo.jpg')}}" alt="Carry First" />
                    </a>
                </div>
                <!-- Logo section close here-->
                <h1>Registration Successful!</h1>
                <div class="alert alert-success fade in">
                    <p class="description">A link has been sent to your email address. Please check that email and click on the link to verify your account.
                    </p>
                </div>
                <div class="form-group">
                    <div class="btn-holder center-align-block two-btn">
                        <a href="{{route('agent.login')}}" style="width: 212px !important;" class="btn success hvr-ripple-out">Login</a>
                    </div>
                    <div class="btn-holder center-align-block two-btn">
                        <a href="#" onclick="window.location.reload(true);" class="btn back hvr-ripple-out">Send confirmation email again</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
