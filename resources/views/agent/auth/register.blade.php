@extends('agent.layout.auth')
@section('css')
<style>
.error{   
display: block !important;
position: unset !important;
}
</style>
<link href="{{URL::asset('theme/assets/css/jquery.filer.css')}}" rel="stylesheet" type="text/css"> 

@endsection
@section('content')
<div class="form-login zoomIn animated">
            <div class="form-login-inner">
                <!-- Logo section start here-->
                <div class="logo-wrap" style="border-radius:0px;width:70%;">
                    <a href="javascript:void(0)">
                        <img src="{{URL::asset('theme/assets/images/logo.jpg')}}" alt="Carry First" />
                    </a>
                </div>
                <!-- Logo section close here-->
                <h1>Sign Up</h1>
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/agent/register') }}" id="register" enctype= multipart/form-data>
                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"">
                        <div class="input-holder anim-label active clearfix">
                            <input  id="fname" type="name" name="name" value="{{Request::segment(3)}}"/ readonly="readonly">
                            <label for="fname">First Name <sup>*</sup></label>
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
                        <div class="input-holder anim-label active clearfix">
                            <input type="text" name="lastname" id="lname" value="{{Request::segment(4)}}" readonly=""/>
                            <label for="lname">Last Name <sup>*</sup></label>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label active clearfix">
                            <!-- <button type="button" id="generate" class="generate">Generate</button> -->
                            <input type="text" name="agentid" id="agentid" readonly="" />
                            <label for="agentid">Agent ID</label>
                            <span class="error"></span>
                            <span id="error23" style="color:red;"></span>
                            @if ($errors->has('agentid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agentid') }}</strong>
                                    </span>
                                @endif 
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
                            <label for="socialsec">Social Security Number <sup>*</sup></label>
                            <span class="error"></span>
                             @if ($errors->has('socail_security_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('socail_security_number') }}</strong>
                                    </span>
                                @endif 
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
                            <label for="addphnum">Phone Number <sup>*</sup></label>
                            <span class="error"></span>
                            @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label active clearfix {{ $errors->has('email') ? ' has-error' : '' }}"">
                            <input id="email" type="text" name="email" maxlength="70" value="{{Request::segment(5)}}" readonly="readonly" />
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
                            <label for="password">Password <sup>*</sup></label>
                            <span class="error"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                           
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix ">
                            <input id="confirm_password" type="password" name="confirm_password" maxlength="70" />
                            <label for="confirm_password">Confirm Password <sup>*</sup></label>
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
                            <label for="addemd1">Address Line 1 <sup>*</sup></label>
                            <span class="error"></span>
                            @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif 
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
                            <label for="cityemd">City <sup>*</sup></label>
                            <span class="error"></span>
                             @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="state" id="stateid"/>
                            <label for="stateid">State <sup>*</sup></label>
                            <span class="error"></span>
                             @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label clearfix">
                            <input type="text" name="pincode" id="zipcd"/>
                            <label for="zipcd">Postal Code <sup>*</sup></label>
                            <span class="error"></span>
                             @if ($errors->has('pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pincode') }}</strong>
                                    </span>
                                @endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label active clearfix">
                            <input type="text" name="compensation" id="compensation" value="{{Request::segment(6)}}" readonly="" />
                            <label for="compensation">Compensation</label>
                            <span class="error"></span> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-holder anim-label active clearfix">
                            <input type="text" id="upline" value="{{$upline}}"  readonly="" />
                            <label for="upline">Upline</label>
                            <span class="error"></span> 
                        </div>
                    </div>
                                                
                     <div class="form-group select-files">
                        <label style="color:#4990e2;">Upload Signed Agent Agreement Here</label>
                        <input type="file" name="file[]" id="filer_input" onclick="myFunction()">
                        <div>
                            <table class="table table-striped" role="presentation">
                                <tbody class="files"></tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                            <input type="hidden" name="upline" id="upline" value="{{Request::segment(7)}}"  readonly="" />
                            <input type="hidden" name="uplinetype" id="uplinetype" value="{{Request::segment(8)}}" />
                            <input type="hidden" name="override" id="override" value="{{Request::segment(9)}}" />


                    <div class="form-group">
                        <div class="btn-holder">
                            <input type="submit" class="btn success hvr-ripple-out" value="Sign Up" />
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
    function myFunction() {
    var $fileUpload = $("input[type='file']");
    console.log($fileUpload.get(0).files.length);
    if (($fileUpload.get(0).files.length) > 0)
    {
      $("input[type='file']").attr('disabled', true);
      alert("You are only allowed to upload a maximum of 1 files");
    }
    else if (($fileUpload.get(0).files.length) == '0')
    {
        $("input[type='file']").attr('disabled', false);
    }

}

      </script>
<script src="{{URL::asset('theme/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('theme/assets/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="http://igreatcasa.com/javascripts/fileupload/jquery.ui.widget.js"></script>
<script src="{{URL::asset('theme/assets/js/jquery.filer.js')}}" type="text/javascript"></script>
<script src="http://igreatcasa.com/jQuery.filer-1.3.0/examples/default/js/custom.js" type="text/javascript"></script>



<script>

             $(document).ready(function(){

                $('#register').validate({
                    rules: {                       
                        password:{
                            required : true,
                        },
                        confirm_password:{
                            required : true,
                            equalTo: "#password",
                        },
                        lastname:{
                            required : true,
                        },

                        socail_security_number:{
                            required : true,
                        },
                        phone_number:{
                            required : true,
                        },
                        city:{
                            required : true,
                        },
                        state:{
                            lettersonly: true,
                            required : true,
                        },
                        pincode:{
                            required : true,
                        },
                        agentid:{
                            required : true,
                        },
                        address:{
                            required : true,
                        },
                    },
                    messages: {
                                    pincode: "The postal code field is required.",
                                    socail_security_number: "The social security number field is required.",
                                    phone_number: "The phone number field is required.",
                                    city: "The city field is required.",
                                    state: "The state field is required.",
                                    address: "The address field is required.",
                                    password: "The password field is required.",
                                    confirm_password:{
                                     required: "The confirm password field is required.",
                                     equalTo: "confirm password is not equal to password."
                                    }    
                                }

                });
                });
</script>

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
            document.getElementById("error23").innerHTML="";
        var firstname = document.getElementById("fname").value;
        var fname = firstname.slice(0, 1);
        var lastname = document.getElementById("lname").value;
        var lname = lastname.slice(0, 1);

        if((fname && lname) != '')
        {

                document.getElementById("agentid").value=fname + lname + ran ;
                $('#agentid').focus();
                document.getElementById('agentid').readOnly = true;
                $(this).parent().addClass("active");
        }
        else
        {
            document.getElementById("error23").innerHTML="Please fill first name or last name" ;
           
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#getFile').change(function(){
            $("#topfile").show()

        var filename = document.getElementById("getFile").files[0].name;
        document.getElementById("hide").innerHTML = ''; 
        document.getElementById("filename").innerHTML = filename;
        });

    });
</script>

@endsection
@endsection