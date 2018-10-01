@extends('admin.layout.app')
@section('content')
 <div class="center-wrapper">
            <div class="center-inner clearfix">
                <nav class="agent-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> Sales</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                            </svg> View Sales</a>
                        </li>
                        <li class="breadcrumb-item current" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                    <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM18 14H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </svg> View Notes</li>
                        <li class="breadcrumb-item"><a href="#" onclick="history.go(-1);" class="back"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></li>
                    </ol>
                </nav>
                <!-- Note List -->
                <div class="note-list-wrapper">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                            <button type="button" class="btn custom-btn editsale" data-toggle="modal" data-target="#createnotes">Create Note</button>
                            <ul class="sale-pdf-list notes-list">
                                @foreach($data as $d)
                                <li>
                                    <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#deletesalefile{{$d->id}}"  class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn normal">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                        </svg>                                        
                                         Delete</a>

<!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="deletesalefile{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> Delete Note </h2>
                 
                 <h6>You want to delete this note.</h6>
                       <form class="login_modal forgot_password" action="{{url('/admin/sale_notedelete')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                            <input type="hidden" name="id" value="{{$d->id}}">
                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">close</button>
                              <button type="submit" class="custom-btn mr15">Submit</button>
                          </div>

                      </form>
            </div>
        </div>
    </div>
</div>

                                    <div class="pdf-file">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">
                                                <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM18 14H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"></path>
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                            </svg>
                                        <span class="head" style="white-space: unset;
    overflow: unset;    line-height: 2;">{{$d->comment}}</span>
                                        <span class="upcname"><i>Note by:</i> {{$d->username->name}}</span>
                                        <span class="upcdate"><i>Created on:</i>{{date('h:i a, dM', strtotime($d->created_at))}}</span>
                                    </div>
                                        
                                </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Note List End -->
            </div>
            <!--  center-inner -->
        </div>
    <!-- Modal -->
    <div id="createnotes" class="modal fade modal-common-box" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content clearfix">
                <div class="modal-body clearfix">
                    <div class="close-modal" data-dismiss="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg></div>
                    <span class="heads">Create Note</span>
                    <form action="{{route('admin.submit_salenote')}}" method="post">
                        {{csrf_field()}}
                    <div class="create-note-textarea">
                        <textarea placeholder="Notes..." name="comment"></textarea>
                        <input type="hidden" name="businessfile_id" value="{{Request::segment(3)}}"> 
                    </div>
                    <div class="btn-wrap align-center">
                        <button type="button" data-dismiss="modal" class="custom-btn mr15">Cancel</button>
                        <button type="submit" class="custom-btn fill">Save</button>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
@section('js')
<script>
$(document).ready(function() {
   $('#createnotes').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();

});
});
</script>
@endsection
@endsection