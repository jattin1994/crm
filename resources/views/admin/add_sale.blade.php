@extends('admin.layout.app')
@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path fill="none" d="M0 0h24v24H0zm10 5h4v2h-4zm0 0h4v2h-4z"/>
                    <path d="M10 16v-1H3.01L3 19c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2v-4h-7v1h-4zm10-9h-4.01V5l-2-2h-4l-2 2v2H4c-1.1 0-2 .9-2 2v3c0 1.11.89 2 2 2h6v-2h4v2h6c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm-6 0h-4V5h4v2z"/>
                </svg> Submit New Sales </h2>
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
                @php
                $new_id=rand(100000,999999);
                @endphp
                    <div class="row tabs-container" id="tab_2" style="display:block">
                        <form action="{{route('admin.add_saleamount')}}" class="editbusiness1" method="post">

                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Sales Amount :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="amount" id="amount" class="input-class">
                                        <input type="hidden"  name="business_id" id="business_id" value="{{$id}}" class="input-class">
                                        <input type="hidden"  name="userid" id="userid" value="{{$userid}}" class="input-class">
                                        <input type="hidden"  name="usertype" id="usertype" value="{{$usertype}}" class="input-class">
                                        <input type="hidden"  name="new_id" id="new_id" value={{$new_id}} class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Type of Sale :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="inputfield-wrap qualified-radio radio-btn">
                                        <label class="radio-inline"><input type="radio" value="Qualified" name="optradio">Qualified</label>
                                        <label class="radio-inline"><input type="radio" value="Non-Qualified"  name="optradio">Non-Qualified</label>
                                    </div>
                                </div>
                            </div>
                            <div id="qualified" class="qual-non-qual-wrap">
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Custodian name : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="custodian" id="qual-custodian" class="selectpicker"> 
                                                <option value="0">Select an option</option>                                
                                                <option value="1">IRA Services Trust Company</option>
                                                <option value="2">Mainstar Trust Group</option>
                                                <option value="3">Provident Trust</option>                                                    
                                            </select>
                                        </div>
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
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Account Type : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="account_type" id="qual-account-type" class="selectpicker">
                                                <option value="0">Select an option</option>        
                                                <option value="1">Traditional IRA</option>   
                                                <option value="2">Roth IRA</option>   
                                                <option value="3">Inherited IRA</option>   
                                                <option value="4">401k</option>   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="Non-Qualified" class="qual-non-qual-wrap">
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Funding Methord : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="funding" id="non-qualfundingm" class="selectpicker">
                                                <option value="0">Select an option</option>
                                                <option value="1">Check</option>
                                                <option value="2">Wire</option>                                        
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

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-lg-offset-3">

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                <button type="button" class="custom-btn mr15 nonquilbtn btn-right-space">Cancel</button>
                                <button type="button" class="custom-btn fill arrow">
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
                                <button type="button" class="custom-btn blank btn-left-space nonquilbtn">Finish Later</button>
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
                            custom_number:true,
                            required: true,
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