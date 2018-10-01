@extends('agent.layout.app')
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
                        <a href="javascript:void(0)" data-target="tab_2" class="completed"><span>2 </span> Sales Information </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-target="tab_3" class="active"><span> 3</span> Upload Documents </a>
                    </li>
                </ul>
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
                        @php
                                    $files=Session::get('cart1');

                                    $i=0;
                                    @endphp

                                    @if($files != '')
                    <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                <div class="sed-heading">Uploaded Documents</div>
                                <ul class="sale-pdf-list">
                                    
                                    @foreach($files as $filedata)
                                    
                                    <li>
                                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#deletesalefile{{$i}}"  class="pdfdwn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn normal" style="-webkit-transform: rotate(0deg);">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                        </svg>                                        
                                         Delete</a>

<!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="deletesalefile{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> My Sale </h2>
                 
                 <h6>Are you want to delete the sale file?</h6>
                       <form class="login_modal forgot_password" action="{{route('agent.delete_document')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                            <input type="hidden" name="arrayid" value="{{$i}}">
                            <input type="hidden" name="saleid" value="{{Request::segment('3')}}">
                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">Cancel</button>
                              <button type="submit" class="custom-btn mr15">Delete</button>
                          </div>

                      </form>
            </div>
        </div>
    </div>
</div><!--End picture modal -->
                                        <a href="{{URL::asset('file/'.$filedata)}}" target="_blank" class="pdfvew"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg> View</a>
                                        <div class="pdf-file">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"></path>
                                                </svg>
                                            <span class="head">{{$filedata}}</span>
                                        </div>
                                    </li>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="btn-wrap col-sm-12">
                            <a href="{{url('agent/edit_business1/'.$id)}}"><button type="button" class="custom-btn mr15">Back</button></a>
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