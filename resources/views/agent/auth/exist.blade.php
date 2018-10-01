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
                <div class="alert alert-success fade in">
                    <p class="description">We're sorry, but the page could not be found.The link may be outdated, you may have entered the address (URL) incorrectly, or the page may have expired.
                    </p>
                </div>
<!--                 <div class="form-group">
                    <div class="btn-holder center-align-block two-btn">
                        <a href="{{route('agent.register')}}" class="btn back hvr-ripple-out">Back</a>
                        <a href="{{route('agent.login')}}" class="btn success hvr-ripple-out">Login</a>
                    </div>
                </div> -->
            </div>
        </div>
@endsection
