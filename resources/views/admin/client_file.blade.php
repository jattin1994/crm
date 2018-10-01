@extends('admin.layout.app')
@section('content')
        <div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> Client File</h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <!-- tabs _ 2-->
                    <div class="row tabs-container" id="tab_3" style="display:block">
                        <div id="dropzone">
                            <form action="{{route('admin.submit_clientfile')}}" class="dropzone needsclick" id="uploadfiles">
                                {{csrf_field()}}
                                <div class="dz-message needsclick">
                                    <span class="uploadn"><i class="fa fa-cloud-upload"></i> Upload Document</span> <br><br>Drag and drop the files here Or <span class="nmbrs">Browse from computer</span><br />
                                    <span class="note needsclick">Maximum files size is 20MB</span>
                                </div>
                                <input type="hidden" name="clientid" value="{{Request::segment('3')}}"

                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="btn-wrap col-sm-12">
                            <a href="{{url::previous()}}"><button type="button" class="custom-btn mr15">Cancel</button></a>
                            <a href="{{url::previous()}}"><button type="button" class="custom-btn fill">Submit Client File</button></a>
                        </div>
                    </div>
                    <!-- tabs _ 3-->
                </div>
                <!--  form-wrapper -->
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@endsection