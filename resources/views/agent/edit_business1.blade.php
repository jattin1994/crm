@extends('agent.layout.app')
@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> Submit New Business </h2>
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
                        <form action="{{route('agent.update_business1')}}" class="editbusiness1" method="post">

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
                                        <label class="radio-inline"><input type="radio" value="Qualified" name="optradio" id="Qualified" @if($data->type=='Qualified') checked @endif>Qualified</label>
                                        <label class="radio-inline"><input type="radio" value="Non-Qualified"  name="optradio" id="non" @if($data->type=='Non-Qualified') checked @endif>Non-Qualified</label>
                                    </div>
                                </div>
                            </div>
                            <div id="qualified" class="qual-non-qual-wrap" @if($data->type=='Qualified') style="display:block;" @endif>
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Custodian name : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="custodian" id="qual-custodian" class="selectpicker"> 
                                                <option value="">Select an option</option>                                
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
                                        <span id="custodianerror" style="color:red;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Account Type : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="account_type" id="qual-account-type" class="selectpicker">
                                                <option value="">Select an option</option>        
                                                <option value="1" @if($data->account_type == '1') selected @endif>Traditional IRA</option>   
                                                <option value="2" @if($data->account_type == '2') selected @endif>Roth IRA</option>   
                                                <option value="3" @if($data->account_type == '3') selected @endif>Inherited IRA</option>   
                                                <option value="4" @if($data->account_type == '4') selected @endif>401k</option>   
                                            </select>
                                        </div>
                                    <span id="accounterror" style="color:red;"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="Non-Qualified" class="qual-non-qual-wrap" @if($data->type=='Non-Qualified') style="display:block;" @endif>
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Funding Method : </span></div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="input-wrap">
                                            <select name="funding" id="non-qualfundingm" class="selectpicker">
                                                <option value="">Select an option</option>
                                                <option value="1" @if($data->funding == '1') selected @endif>Check</option>
                                                <option value="2" @if($data->funding == '2') selected @endif>Wire</option>                                        
                                            </select>
                                        </div>
                                        <div class="qualified-non-para-wrap non-qualified">
                                            <div class="select-para">Heartland Production and Recovery. Please mail the check to the following address:<br>
                                            - 99 Regency Parkway, Ste 209<br>
                                            - Mansfield, TX 76063</div>
                                            <div class="select-para">
                                                <label style="font-weight: bold;">Wire Instructions</label>
                                                <ul class="wirelist">
                                                    <li>Bank Bank </li>
                                                    <li>Bank Address </li>
                                                    <li><label>Account Number :</label> 1234556 </li>
                                                    <li><label>Routing Number :</label> 123456</li>
                                                </ul>
                                            </div>
                                        </div>
                                    <span id="funding" style="color:red;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                                <div class="btn-wrap col-sm-12">
                                    <a href="{{route('agent.clients')}}"><button type="button" class="custom-btn mr15 btn-right-space">Cancel</button></a>
                                    <a href="{{route('agent.edit_business',$data->business_id)}}"><button type="button" class="custom-btn fill arrow">
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
console.log(/[$/]/.test( amount ));
console.log(/[./]/.test( amount ));

if (/[$/]/.test( amount ) && /[./]/.test( amount ))
{
    console.log(amount);
    document.getElementById('amount').value =  amount;
}
else if((/[./]/.test( amount )===false) && (/[$/]/.test( amount )))
{
     var amount = amount + '.00';
     console.log(amount);
     document.getElementById('amount').value =  amount;   
}
else if((/[./]/.test( amount )) && (/[$/]/.test( amount ) === false))
{
     var amount = '$'+ amount;
     document.getElementById('amount').value =  amount;      
     console.log(amount);
}
else
{
     var amount = '$'+amount + '.00';
     document.getElementById('amount').value =  amount;
     console.log(amount);
}

});
$.validator.addMethod("custom_number", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\.$]+$/) && value.match(/^\$([1-9]\d*(\.\d{0,2})?)$/);
}, "Please enter a valid number");


$('form').submit(function () {

    // Get the Login Name value and trim it
    if(document.getElementById('Qualified').checked && document.getElementById('qual-custodian').value == '' && document.getElementById('qual-account-type').value == '')
    {

        document.getElementById('custodianerror').innerHTML="This is field required";   
        document.getElementById('accounterror').innerHTML="This is field required";
        return false;
    }
    else if(document.getElementById('Qualified').checked && document.getElementById('qual-custodian').value == '')
    {
        document.getElementById('custodianerror').innerHTML="This is field required";   
        return false;
    }
    else if(document.getElementById('Qualified').checked && document.getElementById('qual-account-type').value == '')
    {
        document.getElementById('accounterror').innerHTML="This is field required";   
        return false;
    }
    else if(document.getElementById('non').checked && document.getElementById('non-qualfundingm').value == '')
    {

        document.getElementById('funding').innerHTML="This is field required";
        return false;   
    }
});

$("#qual-custodian").on("change", function() {
    if(document.getElementById('qual-custodian').value != '')
    {
        document.getElementById('custodianerror').innerHTML="";
    }
});
$("#qual-account-type").on("change", function() {
    if(document.getElementById('qual-custodian').value != '')
    {
        document.getElementById('accounterror').innerHTML="";
    }
});
$("#non-qualfundingm").on("change", function() {
    if(document.getElementById('non-qualfundingm').value != '')
    {
        document.getElementById('funding').innerHTML="";
    }
});


                $('.editbusiness1').validate({

                    rules: {                       

                        
                        amount:{
                            minlength : 2,
                            required: true,
                        },
                        optradio:{
                            required: true,  
                        },
                        custodian:{
                            required: true,  
                        },
                        funding:{
                            required: true,  
                        },
                        account_type:{
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