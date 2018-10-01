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
                <h1>Log In</h1>
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/agent/login') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix active {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" name="email"  maxlength="70" id="email" value="{{ old('email') }}" autofocus/>
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
                        <div class="input-holder anim-label clearfix active {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password"  name="password" maxlength="70" />
                                <label for="password">Password</label>
                                <span class="error"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="remember-forgot-wrap clearfix">
                            <div class="input-holder clearfix">
                                <input type="checkbox" id="remember-me">
                                <label for="remember-me">Remember me</label>
                            </div>
                            <div class="forgot-password">
                                <a href="{{ route('agent.password.reset') }}">
                                    Forgot Password?
                                </a>
                                <!-- <a href="forgot-password.html">Forgot Password?</a> -->
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('status'))
                            <span class="help-block" style="color:red;">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                            @endif
                    <div class="form-group">
                        <div class="btn-holder">
                            <button type="submit" class="btn success hvr-ripple-out">Log In</button>
                        </div>
                    </div>
                    
                </form>
                <!-- Login form end here -->
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
