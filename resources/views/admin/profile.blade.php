@extends('admin.layout.app')
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
                                    <div class="pp-images imgshow" style="background-image: none!important;" >
                                        @if((Auth::guard('admin')->user()->image) == '')
                                        <img class="img" src="{{URL::asset('theme/assets/images/avtar-img.png')}}" id="image_upload_preview" />
                                        @else
                                        <img class="img" src="{{URL::asset('adminimage/'.(Auth::guard('admin')->user()->image))}}" id="image_upload_preview" />
                                        @endif
                                        <a href="javascript:void(0);" class="removePic removePicRestImage"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="username-pp">{{ucfirst(Auth::guard('admin')->user()->name)}} {{ucfirst(Auth::guard('admin')->user()->lastname)}}</div>
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
                                        <label>Manager Id: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text" style="text-transform: uppercase;">{{ucfirst(Auth::guard('admin')->user()->managerid)}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{(Auth::guard('admin')->user()->email)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                <a href="{{route('admin.change_password')}}"><button type="button" class="custom-btn mr15">Change Password</button></a>
                                <a href="{{route('admin.edit_profile')}}"><button type="button" class="custom-btn mr15">Edit Profile</button></a>
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