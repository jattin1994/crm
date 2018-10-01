@extends('agent.layout.auth')
@section('css')
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
@endsection
@php
$rememberemail=session()->get('rememberemail');
$password="";
@endphp
@section('content')
        <div class="form-login zoomIn animated">
            <div class="form-login-inner">
                <!-- Logo section start here-->
                <div class="logo-wrap" style="border-radius: 0px;width: 70%;">
                    <a href="javascript:void(0)">
                        <img src="{{URL::asset('theme/assets/images/logo.jpg')}}" alt="Carry First" />
                    </a>
                </div>
                <!-- Logo section close here-->
                <h1>Log In</h1>
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/agent/login') }}"  autocomplete="off">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-holder anim-label @if(session()->get('rememberemail') != '') active @endif  clearfix">
                            <input type="text" name="email"  maxlength="70" id="email"  
                            @if($rememberemail['0'] != '') value="{{$rememberemail['0']}}" @endif/>
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
                        <div class="input-holder anim-label @if(session()->get('rememberemail') != '') active @endif clearfix">
                            <input id="password" type="password"  name="password" maxlength="70" @if($rememberemail['0'] != '') value="{{$password}}" autocomplete="off"  @endif />
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
                                <input type="checkbox" id="remember-me" name="remember">
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
