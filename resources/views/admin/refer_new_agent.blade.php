@extends('admin.layout.app')

@section('content')
        <div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg> Refer New Agent </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                        <form action="{{route('admin.submit-referral')}}" method="post" id="referal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">First Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="name" placeholder="" id="name" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Last Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="lastname" placeholder="" id="lastname" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Email :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="email" name="email" id="email" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Compensation %:</span></div>
                                <div class="col-xs-12 col-sm-2">
                                    <div class="input-wrap with-percent">
                                        <input type="text" name="compensation" id="compensation" class="input-class">
                                        <input type="hidden" name="username" value="{{Auth::guard('admin')->user()->id}}">
                                        <input type="hidden" name="usertype" value="admin">
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                <button type="button" id="reset-form" class="custom-btn mr15">Clear</button>
                                <button type="button" id="referAgent"class="custom-btn fill">Send Referral</button>
                            </div>
                        </form>
                    </div>
                    <!-- tabs _ 2-->
                </div>
                <!--  form-wrapper -->
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
<!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="refer_newagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg> Refer New Agent </h2>
                 
                 <h6>You want to refer a mail for new agent.</h6>
                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">Cancel</button>
                              <button type="button" id="continuebtn" class="custom-btn mr15">Submit</button>
                          </div>
            </div>
    </div>
</div><!--End picture modal -->
@section('js')
<script>

             $(document).ready(function(){


                $('#referal').validate({

                    rules: {                       
                        name:{
                            required : true,
                        },
                        lastname:{
                            required:true,
                        },
                        email:{
                            required : true,
                        },
                        compensation:{
                            number: true,
                            required : true,
                        },
                    }

                });
    $('#reset-form').on('click', function()
    {
        $("#referal").trigger("reset");
    });
                });


        </script>
<script>
$('document').ready(function(){
    
        $('#referAgent').on('click',function(e){
            e.preventDefault();
            $('#refer_newagent').modal('show');
    
        });
    
        $('#continuebtn').on('click',function(){
            
            if (document.getElementById("email").value != '' && document.getElementById("name").value != '' && document.getElementById("compensation").value != '')
            {
                $('#refer_newagent').modal('hide');
                $('#referal').submit();
                
            }
            else
            {
                $('#referal').valid();
                $('#refer_newagent').modal('hide');
            }
        });
    }); 
</script>
@endsection
@endsection