@extends('admin.layout.app')
@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path fill="none" d="M0 0h24v24H0zm10 5h4v2h-4zm0 0h4v2h-4z"/>
                    <path d="M10 16v-1H3.01L3 19c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2v-4h-7v1h-4zm10-9h-4.01V5l-2-2h-4l-2 2v2H4c-1.1 0-2 .9-2 2v3c0 1.11.89 2 2 2h6v-2h4v2h6c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm-6 0h-4V5h4v2z"/>
                </svg> Edit Sale Amount <span style="font-size: 16px;"><a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#deletesalefile" class="back" style="float: right;">Delete Sale</a></span>
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
                            <input type="hidden" name="id" value="{{$data->id}}">
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
                        <a href="javascript:void(0)" data-target="tab_1" class="completed"><span>1</span>  Client Information  </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-target="tab_2" class="active"><span>2 </span> Sales Information </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-target="tab_3"><span> 3</span> Upload Documents </a>
                    </li>
                </ul>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                        <form action="{{route('admin.update_sale1')}}" class="editbusiness1" method="post">

                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Sales Amount ($):</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="amount" id="amount" value="{{$data->amount}}" class="input-class">
                                        <input type="hidden"  name="id" id="id" value="{{$data->id}}" class="input-class">
                                        <input type="hidden"  name="business_id" id="business_id" value="{{$data->business_id}}" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Type of Sale :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="inputfield-wrap qualified-radio radio-btn">
                                        <label class="radio-inline"><input type="radio" value="Qualified" name="optradio" @if($data->type=='Qualified') checked @endif>Qualified</label>
                                        <label class="radio-inline"><input type="radio" value="Non-Qualified"  name="optradio" @if($data->type=='Non-Qualified') checked @endif>Non-Qualified</label>
                                    </div>
                                </div>
                            </div>
                            <div id="qualified" class="qual-non-qual-wrap" @if($data->type=='Qualified') style="display:block;" @endif>
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Custodian name : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="custodian" id="qual-custodian" class="selectpicker"> 
                                                <option value="0" @if($data->custodian == '0') selected @endif>Select an option</option>                                
                                                <option value="1" @if($data->custodian == '1') selected @endif>IRA Services Trust Company</option>
                                                <option value="2" @if($data->custodian == '2') selected @endif>Mainstar Trust Group</option>
                                                <option value="3" @if($data->custodian == '3') selected @endif>Provident Trust</option>                                                    
                                            </select>
                                            <div class="qualified-non-para-wrap qualified">
                                            <div class="select-para">Fill out the Investment Authorization Kit on the IRA Services website <a href="https://www.iraservices.com/forms" target="_blank">https://www.iraservices.com/forms</a> and turn in to IRA Services directly to
                                                have the funds sent. Contact IRA Services customer service for assistance with this form.</div>
                                            <div class="select-para">Fill out the Purchase Authorization form under any type of account on the Mainstar website at <a href="https://mainstartrust.com/forms" target="_blank">https://mainstartrust.com/forms</a> and turn in to Mainstar
                                                directly by mail or email. Instructions are on the form. Contact Mainstar customer service for assistance with this form.
                                            </div>
                                            <div class="select-para">Fill out the Direction of Investment – General on the Provident website at <a href="https://trustprovident.com/forms/" target="_blank">https://trustprovident.com/forms/</a> and turn in to Provident directly.
                                                Contact Provident customer service for assistance with this form.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Account Type : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="account_type" id="qual-account-type" class="selectpicker">
                                                <option value="0" @if($data->account_type == '0') selected @endif>Select an option</option>        
                                                <option value="1" @if($data->account_type == '1') selected @endif>Traditional IRA</option>   
                                                <option value="2" @if($data->account_type == '2') selected @endif>Roth IRA</option>   
                                                <option value="3" @if($data->account_type == '3') selected @endif>Inherited IRA</option>   
                                                <option value="4" @if($data->account_type == '4') selected @endif>401k</option>   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="Non-Qualified" class="qual-non-qual-wrap" @if($data->type=='Non-Qualified') style="display:block;" @endif>
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Funding Methord : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="funding" id="non-qualfundingm" class="selectpicker">
                                                <option value="0" @if($data->funding == '0') selected @endif>Select an option</option>
                                                <option value="1" @if($data->funding == '1') selected @endif>Check</option>
                                                <option value="2" @if($data->funding == '2') selected @endif>Wire</option>                                        
                                            </select>
                                        </div>
                                        <div class="qualified-non-para-wrap non-qualified">
                                            <div class="select-para">All checks to 1234 street City, TX 77888.</div>
                                            <div class="select-para">
                                                <ul class="wirelist">
                                                    <li>Wire Instructions</li>
                                                    <li>Bank Bank </li>
                                                    <li>Bank Address </li>
                                                    <li><label>Account Number :</label> 1234556 </li>
                                                    <li><label>Routing Number :</label> 123456</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                                <div class="btn-wrap col-sm-12">
                                    <a href="{{route('admin.sales_detail',Request::segment('3'))}}"><button type="button" class="custom-btn mr15">Cancel</button></a>
                                    <a href="{{route('admin.edit_sale',$data->id)}}"><button type="button" class="custom-btn fill arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                                    </svg>  
                                </button></a>
                                <button type="submit" class="custom-btn fill arrow btn-left-space">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                                    </svg>
                                </button>
                                <button type="button" class="custom-btn blank btn-left-space nonquilbtn">Finish Later</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                            
        </div>
        <!--  center-wrapper -->
@section('js')
<script>

             $(document).ready(function(){
$("#amount").on("change", function() {

     var amount = document.getElementById('amount').value;
     var amount = '$'+amount + '.00';
     document.getElementById('amount').value =  amount;
     console.log(amount);

});
$.validator.addMethod("custom_number", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\.$]+$/);
}, "Please enter a valid number");


                $('.editbusiness1').validate({

                    rules: {                       

                        
                        amount:{
                            minlength : 2,
                            required: true,
                            custom_number: true,
                        },
                        optradio:{
                            required: true,  
                        }
                    }

                });
                });


        </script>
 <script>
        $(document).ready(function() {
            $(".qualified-radio input[type='radio']").on("change", function() {
                $(".qualified-non-para-wrap").removeClass("ira mainst provident checknonq wirenonqa").hide();
                $(".selectpicker").val('0').selectpicker("refresh");
                if ($(this).val() == "Qualified") {
                    $("#qualified").show();
                    $("#Non-Qualified, .nonquilbtn").hide();
                } else {
                    $("#Non-Qualified, .nonquilbtn").show();
                    $("#qualified").hide();
                }
            });

            $("#qual-custodian").on("change", function() {
                $(".qualified-non-para-wrap").removeClass("ira mainst provident").hide();
                if ($(this).val() == 1) {
                    $(".qualified-non-para-wrap").removeClass("mainst provident");
                    $(".qualified-non-para-wrap").addClass("ira").show();
                }
                if ($(this).val() == 2) {
                    $(".qualified-non-para-wrap").removeClass("ira provident");
                    $(".qualified-non-para-wrap").addClass("mainst").show();
                }
                if ($(this).val() == 3) {
                    $(".qualified-non-para-wrap").removeClass("ira mainst");
                    $(".qualified-non-para-wrap").addClass("provident").show();

                }
            });

            $("#non-qualfundingm").on("change", function() {
                $(".qualified-non-para-wrap").removeClass("ira mainst provident checknonq wirenonqa").hide();
                if ($(this).val() == 1) {
                    $(".qualified-non-para-wrap").removeClass("ira mainst provident wirenonqa");
                    $(".qualified-non-para-wrap").addClass("checknonq").show();
                }
                if ($(this).val() == 2) {
                    $(".qualified-non-para-wrap").removeClass("ira mainst provident checknonq");
                    $(".qualified-non-para-wrap").addClass("wirenonqa").show();
                }
            });

        });
    </script>
@endsection
@endsection