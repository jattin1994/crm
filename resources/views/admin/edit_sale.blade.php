@extends('admin.layout.app')
@section('css')
  <link rel="stylesheet" href="{{URL::asset('/dist/datepicker.css')}}">
@endsection
@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path fill="none" d="M0 0h24v24H0zm10 5h4v2h-4zm0 0h4v2h-4z"/>
                    <path d="M10 16v-1H3.01L3 19c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2v-4h-7v1h-4zm10-9h-4.01V5l-2-2h-4l-2 2v2H4c-1.1 0-2 .9-2 2v3c0 1.11.89 2 2 2h6v-2h4v2h6c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm-6 0h-4V5h4v2z"/>
                </svg> Edit Sale Detail
                <span style="font-size: 16px;"><a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#deletesalefile" class="back" style="float: right;">Delete Sale</a></span>
                </h2>

<!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="deletesalefile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> Delete Sale </h2>
                 
                 <h6>Are you sure you want to delete this sale?</h6>
                       <form class="login_modal forgot_password" action="{{url('/admin/sale_delete')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                            <input type="hidden" name="id" value="{{Request::segment(3)}}">


                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">Cancel</button>
                              <button type="submit" class="custom-btn mr15">Delete</button>
                          </div>

                      </form>
            </div>

      <div class="clearfix"></div><hr class="fline"><p style="text-align: center;"><a class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;" >Back to sale page</a></p>
        </div>
    </div>
</div><!--End picture modal -->


                <ul class="switch-tab clearfix">
                    <li>
                        <a href="javascript:void(0)" data-target="tab_1" class="active"><span>1</span>  Client Information  </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-target="tab_2"><span>2 </span> Sales Information </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-target="tab_3"><span> 3</span> Upload Documents </a>
                    </li>
                </ul>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <div class="row tabs-container" id="tab_1" style="display:block">
                        <form action="{{route('admin.update_sale')}}" class="business" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">First Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="name" id="name" value="{{$data->name}}" class="input-class">
                                        <input type="hidden"  name="id" id="id" value="{{$data->id}}" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Middle Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="middlename" id="middlename" value="{{$data->middlename}}" class="input-class">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Last Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="lastname" id="lastname" value="{{$data->lastname}}" class="input-class">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Suffix :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="suffix" id="suffix" value="{{$data->suffix}}" class="input-class">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Social Security Number :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  value="{{$data->social}}" name="social" id="social" class="input-class">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Phone :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="phone" id="phone" value="{{$data->phone}}" class="input-class">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Alternate Phone : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="phone1" id="phone1" class="input-class" value="{{$data->phone1}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Email : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="email" value="{{$data->email}}" id="email" class="input-class">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Alternate Email : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="email1" value="{{$data->email1}}" id="email1" class="input-class">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Date Of Birth : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" class="input-class" name="birthday" id="birthday" data-toggle="datepicker" placeholder="MM/DD/YYYY"  value="{{$data->birthday}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Address 1 : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="address" value="{{$data->address}}" id="address" class="input-class">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Address 2 : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="address1" id="address1" value="{{$data->address1}}" class="input-class">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">City : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="city" id="city" value="{{$data->city}}" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">State/Province : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="state" id="state" value="{{$data->state}}" class="input-class">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Postal Code : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="pincode" id="pincode" value="{{$data->pincode}}" class="input-class">
                                        <input type=hidden name="businessdetail_id" value="{{Request::segment(3)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Country : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="country" id="country" value="{{$data->country}}" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">How does the client wish to receive correspondence? : </span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <select name="correspondence" id="correspondence" class="selectpicker">
                                                    <option value="">Select an option</option>
                                                    <option value="1" @if($data->correspondence == '1') selected="" @endif> Mail </option>
                                                    <option value="2" @if($data->correspondence =='2') selected="" @endif> Email </option>
                                        </select>
                                    </div>
                                    <span id="correspondenceerror" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                <a href="{{route('admin.sales_detail',Request::segment('3'))}}"><button type="button" class="custom-btn mr15">Cancel</button></a>
                                <button type="button" class="custom-btn fillgray arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                                    </svg>                                        
                                </button>
                                <button type="submit" class="custom-btn fill arrow btn-left-space">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                      <path d="M0 0h24v24H0z" fill="none"/>
                                      <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- tabs _ 3-->
                </div>
                <!--  form-wrapper -->
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@section('js')
<script>

             $(document).ready(function(){
$('#phone').keyup(function(){
var phone=$(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3'));
});
$('#phone1').keyup(function(){
var phone1=$(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3'));

});
$.validator.addMethod("custom_number", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\+-]+$/);
}, "Please enter a valid number");


$('#birthday').keyup(function(){
var birthday=$(this).val($(this).val().replace(/(\d{2})\/?(\d{2})\/?(\d{4})/,'$1/$2/$3'));
});
$.validator.addMethod("custom_birthday", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\/]+$/) && value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
}, "Please enter a valid date of birthday");


                $('.business').validate({

                    rules: {                       

                        
                        name:{
                            minlength : 2,
                            required: true,
                        },
                        social:{
                            required: true,  
                        },
                        phone:
                        {
                            required: true,
                            minlength:9,
                              maxlength:15,
                              custom_number: true  
                        },
                        phone1:
                        {
                           minlength:9,
                              maxlength:15,
                              custom_number: true 
                        },
                        email:{
                            required: true,  
                        },
                        birthday:{
                            custom_birthday:true,
                            required: true,  
                        },
                        address:{
                            required: true,  
                        },
                        city:{
                            required: true,  
                        },
                        pincode:{
                            required: true,  
                        },




                    }

                });
                });


        </script>
<script src="{{URL::asset('/dist/datepicker.js')}}"></script>
  <script>
    $(function() {
      $('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
      });
    });
  </script>
@endsection
@endsection