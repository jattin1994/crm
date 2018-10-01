@extends('agent.layout.auth')

<!-- Main Content -->
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
                <h1>Forgot Password</h1>
                <p class="description">Forgot your password? Don't worry, send us your registered email id and we will send you steps to reset you password.</p>
                <!-- Forgot password form start here -->
                <form action="{{route('agent.password.email')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix {{ $errors->has('email') ? ' has-error' : '' }}"">
                            <input type="text" name="email" id="email"  maxlength="70"  value="{{ old('email') }}" autofocus />
                            <label for="email">Email</label>
                            <span class="error"></span>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-holder center-align-block two-btn">
                            <a href="{{route('agent.login')}}" class="btn back hvr-ripple-out">Cancel</a>
                            <button type="submit" class="btn success hvr-ripple-out" style="width:50%;">Send</a>
                        </div>
                    </div>
                </form>
                <!-- Forgot password form end here -->
            </div>
        </div>
@section('js')
    <script>
        $(document).ready(function() {
            $(".anim-label input").keyup(function() {
                var $this = $(this);
                if ($this.val().length >= 1) {
                    $this.parent().addClass("active");
                } else {
                    $this.parent().removeClass("active");
                }
            });
        });
    </script>
@endsection
@endsection