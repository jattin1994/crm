@extends('agent.layout.app')
@section('content')
@php
Session::forget('cart1');
Session::forget('cart');

@endphp
        <div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path fill="none" d="M0 0h24v24H0zm10 5h4v2h-4zm0 0h4v2h-4z"/>
                    <path d="M10 16v-1H3.01L3 19c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2v-4h-7v1h-4zm10-9h-4.01V5l-2-2h-4l-2 2v2H4c-1.1 0-2 .9-2 2v3c0 1.11.89 2 2 2h6v-2h4v2h6c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm-6 0h-4V5h4v2z"/>
                </svg> Upload Documents </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <!-- tabs _ 2-->
                    <div class="row tabs-container" id="tab_3" style="display:block">
                        <div id="dropzone">
                            <form action="{{route('agent.submit_business')}}" class="dropzone needsclick" id="uploadfiles" method="post">
                                {{csrf_field()}}
                                <div class="dz-message needsclick">
                                    <span class="uploadn"><i class="fa fa-cloud-upload"></i> Upload Document</span> <br><br>Drag and drop the files here Or <span class="nmbrs">Browse from computer</span><br />
                                    <span class="note needsclick">Maximum files size is 20MB</span>
                                </div>

                                <input type="hidden"  name="id" id="id" value="">
                                <input type="hidden" name="lastid"  value="{{Request::segment('3')}}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="btn-wrap col-sm-12">
                            <a href="javascript:history.go(-1)"><button type="button" class="custom-btn mr15">Back</button></a>
                            <button type="submit" onclick="setValue()" class="custom-btn fill">Submit New Business</button>
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
    function setValue() {
        document.getElementById('id').value = "1";
    }
</script>

@endsection
@endsection