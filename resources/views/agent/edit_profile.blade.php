@extends('agent.layout.app')
@section('css')
<style>
.error{   
color:red !important;
margin-top: 10px !important;
}
</style>
@endsection
@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> My Profile </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/agent/update_profile') }}" id="register">
                    {{csrf_field()}}

                     <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="name"  id="name" value="{{Auth::guard('agent')->user()->name}}" class="input-class">
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Middle Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="middlename"  id="middlename" value="{{Auth::guard('agent')->user()->middlename}}" class="input-class">
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Last Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="lastname"  id="lastname" value="{{Auth::guard('agent')->user()->lastname}}" class="input-class">
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Agent ID :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input type="text" name="agentid" id="agentid" value="{{Auth::guard('agent')->user()->agentid}}" class="input-class" readonly />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Company Name (If applicable):</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input type="text" name="company_name" id="comname" value="{{Auth::guard('agent')->user()->company_name}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Social Security Number :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input type="text" name="socail_security_number" id="socialsec" value="{{Auth::guard('agent')->user()->socail_security_number}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">EIN/Tax ID for Company (If applicable) :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input type="text" name="tax_id" id="eintax" value="{{Auth::guard('agent')->user()->tax_id}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Phone Number :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input type="text" name="phone_number" id="addphnum" value="{{Auth::guard('agent')->user()->phone_number}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Email :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="email" type="text" name="email" value="{{Auth::guard('agent')->user()->email}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Alternate Email :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="addemd1" type="text" name="email2" value="{{Auth::guard('agent')->user()->email2}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Address Line 1 :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="addemd1" type="text" name="address" id="addemd1" value="{{Auth::guard('agent')->user()->address}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Address Line 2 :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="addemd1" type="text" name="address2" id="addemd2" value="{{Auth::guard('agent')->user()->address}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">City :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="addemd1" type="text" name="city" id="city" value="{{Auth::guard('agent')->user()->city}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">State :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="addemd1" type="text" name="state" id="state" value="{{Auth::guard('agent')->user()->state}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Postal Code :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input id="addemd1" type="text" name="pincode" id="pincode" value="{{Auth::guard('agent')->user()->pincode}}" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-3">
                                <a href="{{URL::previous()}}"><button type="button" class="custom-btn mr15">Cancel</button></a>
                                <button type="submit" class="custom-btn fill">Submit</button>
                            </div>
                </form>
                <!-- Login form end here -->
            </div>
        </div>
    </div>
</div>

@section('js')
<script>

             $(document).ready(function(){

                $('#register').validate({
                    rules: {                       
                        name:{
                            required : true,
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
                            required : true,
                        },
                        pincode:{
                            required : true,
                        },
                        agentid:{
                            required : true,
                        },
                        email:{
                            required : true,
                        },
                        pincode:{
                            required : true,
                        },
                        address:{
                            required : true,
                        },
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
        $('#generate').click(function(){
        var firstname = document.getElementById("fname").value;
        var fname = firstname.slice(0, 1);
        var lastname = document.getElementById("lname").value;
        var lname = lastname.slice(0, 1);
            document.getElementById("agentid").value=fname + lname + ran ;
            $('#agentid').focus();
            document.getElementById('agentid').readOnly = false;
            $(this).parent().addClass("active");
        });

    });
</script>
@endsection
@endsection