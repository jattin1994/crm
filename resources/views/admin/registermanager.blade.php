@extends('admin.layout.app')

@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg> Register Admin </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/admin/submit_managar') }}" class="referal">
                    {{csrf_field()}}

                     <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Email :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="email"  id="email" class="input-class">
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">First Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="name"  id="fname" class="input-class">
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Last Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input  type="text" name="lastname" id="lname" class="input-class" />
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Admin ID :</span></div>

                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <button type="button" id="generate" class="generate">Generate</button>
                                    <input name="managerid" id="managerid" class="input-class" readonly />
                                    </div>
                                    <span class="error" id="error23" style="color:red;"></span>
                                </div>
                    </div>

                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Password :</span></div>

                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                    <input name="password" type="password" id="password" class="input-class"/>
                                    </div>
                                </div>
                    </div>
                    <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-3">
                                <button type="button" id="reset-form" class="custom-btn mr15">Clear</button>
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


                $('.referal').validate({

                    rules: {                       
                        name:{
                            required : true,
                        },
                        lastname:{
                            required : true,
                        },
                        email:{
                            required : true,
                        },
                        password:{
                            required : true,
                        },
                        managerid:{
                            required : true,
                        },


                    }

                });

                $('#reset-form').on('click', function()
    {
        $(".referal").trigger("reset");
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

                document.getElementById("managerid").value=fname + lname + ran ;
                $('#managerid').focus();
                document.getElementById('managerid').readOnly = false;
                $(this).parent().addClass("active");
        }
        else
        {
            document.getElementById("error23").innerHTML="Please fill in First Name and Last Name." ;
           
        }
         });

    });
</script>

@endsection
@endsection