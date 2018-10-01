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
                <h1>Reset Password</h1>
                <!-- Reset password form start here -->
                <form action="{{route('agent.password.reset')}}" method="post" class="resetpassword">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">

                            <input type="password" name="password" id="password"  maxlength="70" />
                            <label for="password">Password</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="password" name="confirm_password"  maxlength="70" />
                            <label for="confirm_password">Confirm Password</label>
                            <span class="error"></span>
                            <input type="hidden" name="id" value="{{Request::segment(4)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-holder center-align-block two-btn">
                            <a href="{{route('index')}}" class="btn back hvr-ripple-out">Cancel</a>
                            <button type="submit" class="btn success hvr-ripple-out" style="width:50%;">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- Reset password form end here -->
            </div>
        </div>
@section('js')
<script>

             $(document).ready(function(){


                $('.resetpassword').validate({

                    rules: {                       

                        
                        password:{
                            minlength : 5,
                        },
                        confirm_password:{
                            minlength : 5,
                            equalTo: "#password"
                        },
                    }

                });
                });


        </script>
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