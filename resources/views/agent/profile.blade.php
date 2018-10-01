@extends('agent.layout.app')
@section('content')
        <div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> My Profile </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                        <form action="">
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="pp-images imgshow" style="background-image: none!important;">
                                        @if((Auth::guard('agent')->user()->image) == '')
                                        <img class="img" src="{{URL::asset('theme/assets/images/avtar-img.png')}}" id="image_upload_preview" />
                                        @else
                                        <img class="img" src="{{URL::asset('agentimage/'.(Auth::guard('agent')->user()->image))}}" style="opacity: 2;" id="image_upload_preview" />
                                        @endif
                                        <a href="javascript:void(0);" class="removePic removePicRestImage"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="username-pp">{{ucfirst(Auth::guard('agent')->user()->name)}} {{ucfirst(Auth::guard('agent')->user()->lastname)}}
                                    @if(Auth::guard('agent')->user()->status == '1')
                                    <span class="status-sec pending" style="margin-left: 20px;">Pending</span>
                                    @elseif(Auth::guard('agent')->user()->status == '2')
                                    <span class="status-sec closed" style="margin-left: 20px;">Contracted</span>
                                    @endif
                                    </div>
                                    <div class="clear"></div>
                                    <div class="pp-change-images">
                                        <span class="text"><i class="fa fa-camera" aria-hidden="true"></i> Change Picture</span>
                                        <input type="file" name="rest_image" class="rest_img" id="inputFile" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="pp-details clearfix">
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Agent Id: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text" style="text-transform: uppercase;">{{ucfirst(Auth::guard('agent')->user()->agentid)}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Upline:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{ucfirst(Auth::guard('agent')->user()->upline(Auth::guard('agent')->user()->uplinetype,Auth::guard('agent')->user()->upline))}}</span>
                                    </div>
                                    @if(Auth::guard('agent')->user()->company_name != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Company Name:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{ucfirst(Auth::guard('agent')->user()->company_name)}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Social Security: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">XXX-XX-{{substr(Auth::guard('agent')->user()->socail_security_number,-4)}}</span>
                                    </div>
                                    @if(Auth::guard('agent')->user()->tax_id != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>EIN/Tax ID for company: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('agent')->user()->tax_id)}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Phone:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('agent')->user()->phone_number)}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('agent')->user()->email)}}</span>
                                    </div>
                                    @if(Auth::guard('agent')->user()->email2 != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Alternate Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('agent')->user()->email2)}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('agent')->user()->address)}} </span>
                                    </div>
                                    @if(Auth::guard('agent')->user()->address2 != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Alternate Address:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('agent')->user()->address2)}} </span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                @if(Auth::guard('agent')->user()->bankingdetail == '') 
                                <a href="{{route('agent.add_banking')}}"><button type="button" class="custom-btn fill mr15">Add Banking Details</button></a>
                                @endif
                                @php
                                $id=encrypt(Auth::guard('agent')->user()->id);
                                @endphp

                                <a href="{{url('agent/changepasswordForm/'.$id)}}"> <button type="button" class="custom-btn mr15">Change Password</button></a>
                                <a href="{{url('agent/edit_profile')}}"> <button type="button" class="custom-btn mr15">Edit Profile</button></a>
                            </div>
                            @if ($errors->has('status'))
                            <span class="help-block" style="color:red;">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                            @endif

                            <div class="pp-details clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <hr class="fline">
                                </div>

                                @if(Auth::guard('agent')->user()->bankingdetail != '')
                                    <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="headblc">Banking Details</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Bank Name:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{ucfirst(Auth::guard('agent')->user()->bankingdetail->bankname)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Bank Address:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{(Auth::guard('agent')->user()->bankingdetail->bankaddress)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Routing Number.:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">****{{substr(Auth::guard('agent')->user()->bankingdetail->routingno,-4)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Account Holder Name:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{ucfirst(Auth::guard('agent')->user()->bankingdetail->accountholdername)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Account Number:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">****{{substr(Auth::guard('agent')->user()->bankingdetail->accoutnumber,-4)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Account Type:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{ucfirst(Auth::guard('agent')->user()->bankingdetail->accounttype)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="btn-wrap">
                                                    <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#delete_accountdetail" class="login_modal_forgot"><button type="button" class="custom-btn mr15">Delete Bank</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <hr class="fline">
                                </div>
                                @endif
                                
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <label class="headblc">Agent Documents</label>
                                    </div>
                                    @if(Auth::guard('agent')->user()->contract_file != '')
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <ul class="sale-pdf-list pp-docwrap no-mrg">
                                            <li>
                                                <a href="{{route('agent.download1',Auth::guard('agent')->user()->contract_file)}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn"> 
                                                    <path d="M5 4v2h14V4H5zm0 10h4v6h6v-6h4l-7-7-7 7z"/>
                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                </svg>
                                                 Download</a>
                                                <div class="pdf-file">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">
                                                            <path fill="none" d="M0 0h24v24H0z"/>
                                                            <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/>
                                                        </svg>
                                                    <span class="head">Contract With Company</span>
                                                    <span class="upcname"><i>Uploaded by:</i> {{ucfirst(Auth::guard('agent')->user()->name)}}</span>
                                                    <span class="upcdate"><i>Uploaded on:</i> {{date('F d, Y (h:iA)', strtotime(Auth::guard('agent')->user()->updated_at))}}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                    $('#image_upload_preview1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#inputFile").change(function() {
            $(".pp-images").addClass("imgshow");
            $(".pp-images").addClass("imgshow1");
            readURL(this);
        });
        $(".removePic").click(function() {
            $("#image_upload_preview").attr('src', '');
            $("#image_upload_preview1").attr('src', '');
            $(".pp-images").removeClass("imgshow");
        });
    </script>
<script>
$(function(){

    //call a function to handle file upload on select file
    $('input[type=file]').on('change', fileUpload);
});

function fileUpload(event){
    
    //get selected file
    files = event.target.files;
    
    //form data check the above bullet for what it is  
    var data = new FormData();                                   

    //file data is presented as an array
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
            data.append('file', file, file.name);
            
            //create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();     
            
            //post file data for upload
            xhr.open('POST', 'change_profile', true);  
            xhr.send(data);
}

}
</script>
<script>
    $(".removePic").click(function() {
            $.ajax({
                type: "POST",
                url: "remove_pic",
                data: {_token: '{{csrf_token()}}' },
                success: function(data) {
        }
    });
            });
</script>
@endsection
@endsection