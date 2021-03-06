@extends('admin.layout.app')

@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> My Profile </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/admin/update_password') }}" class="referal">
                    {{csrf_field()}}

                     <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">New Password :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="password"  id="password"  class="input-class">
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Confirm Password :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="confirm_password"  id="confirm_password" class="input-class">
                                    </div>
                                </div>
                    </div>


                    <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-3">
                                <a href="{{ URL::previous() }}"><button type="button" class="custom-btn mr15">Cancel</button></a>
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
                        password:{
                            required : true,
                        },
                        confirm_password:{
                            required : true,
                            equalTo: "#password",
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

@endsection
@endsection