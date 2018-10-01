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
                <h1>Sign Up</h1>
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/agent/register') }}">
                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"">
                        <div class="input-holder anim-label active clearfix">
                            <input  id="fname" type="name" name="name" value="{{Request::segment(3)}}"/ readonly="readonly">
                            <label for="fname">First Name</label>
                            <span class="error"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="middlename" id="mname" value="" />
                            <label for="mname">Middle Initial</label>
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
                            <input type="text" name="agentid" id="agentid" readonly />
                            <label for="agentid">Agent ID</label>
                            <span class="error"></span>
                            <span id="error23" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="company_name" id="comname"/>
                            <label for="comname">Company Name(If applicable)</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="socail_security_number" id="socialsec"/>
                            <label for="socialsec">Social Security Number</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="tax_id" id="eintax" value="" />
                            <label for="eintax">EIN/Tax ID for Company (If applicable)</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="phone_number" id="addphnum" value="" />
                            <label for="addphnum">Phone Number</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label active clearfix {{ $errors->has('email') ? ' has-error' : '' }}"">
                            <input id="email" type="text" name="email" maxlength="70" value="{{Request::segment(4)}}" readonly="readonly" />
                            <label for="email">Email (you will use this to sign in)</label>
                            <span class="error"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-holder anim-label active clearfix ">
                            <input id="password" type="password" name="password" maxlength="70" />
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
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="email2" id="addemdl"/>
                            <label for="addemdl">Alternate Email</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="address" id="addemd1"/>
                            <label for="addemd1">Address Line 1</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="address2" id="addemd2"/>
                            <label for="addemd2">Address Line 2</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="city" id="cityemd"/>
                            <label for="cityemd">City</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="state" id="stateid"/>
                            <label for="stateid">State</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="pincode" id="zipcd"/>
                            <label for="zipcd">Zip Code</label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="hidden" name="upline" id="uplnam" value="{{Request::segment(6)}}" />
                            <input type="hidden" name="uplinetype" id="uplnam" value="{{Request::segment(7)}}" />
                            <input type="hidden" name="compensation" id="uplnam" value="{{Request::segment(5)}}" />
                            <input type="hidden" name="override" id="uplnam" value="{{Request::segment(8)}}" />
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="btn-holder">
                            <button type="submit" class="btn success hvr-ripple-out">Sign Up</button>
                        </div>
                    </div>
<!--                     <div class="form-group">
                        <p class="newagent"><a href="{{route('agent.login')}}">Log In</a></p>
                    </div> -->


                </form>
                <!-- Login form end here -->
            </div>
        </div>
@section('js')
    <script>
        window.onload = function(e){ 
        if($("#agentid").val().length >= 1){         
                $("#agentid").parent().addClass("active");
            }     
        }
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

                document.getElementById("agentid").value=fname + lname + ran ;
                $('#agentid').focus();
                document.getElementById('agentid').readOnly = false;
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