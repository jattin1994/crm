@extends('admin.layout.auth')

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
                <h1>Sign Up</h1>
                <!-- Login form start here -->
                <form action="{{url('admin/register')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input id="email" type="email" class="form-control" name="email">
                            <label for="email">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                             <input  type="text" class="form-control" name="name" id="fname" >

                             <label for="fname">Name</label>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="lastname" id="lname" />
                            <label for="lname">Last Name</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <button type="button" id="generate" class="generate">Generate</button>
                            <input type="text" name="managerid" id="managerid" readonly />
                            <label for="agentid">Manager ID</label>
                            <span class="error" ></span>
                            <span id="error23" style="color:red;"></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input id="password" type="password" class="form-control" name="password" >
                            <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-holder">
                            <button type="submit" class="btn success hvr-ripple-out">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="newagent"><a href="{{route('admin.login')}}">Log In</a></p>
                    </div>
                </form>
                <!-- Login form end here -->
            </div>
        </div>
@section('js')
<script>
    $(document).ready(function() {
        var ran = Math.floor(Math.random() * 10000);
        $('#generate').click(function(){
        document.getElementById("error23").innerHTML="";
        var firstname = document.getElementById("fname").value;
        var fname = firstname.slice(0, 1);
        var lastname = document.getElementById("lname").value;
        var lname = lastname.slice(0, 1);

        if((fname && lname) != '')
        {

                document.getElementById("managerid").value=fname + lname + ran ;
                $('#managerid').focus();
                document.getElementById('managerid').readOnly = false;
                $(this).parent().addClass("active");
        }
        else
        {
            document.getElementById("error23").innerHTML="Please fill first name or last name" ;
           
        }
         });

    });
</script>
@endsection
@endsection
