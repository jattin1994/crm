@extends('admin.layout.app')

@section('content')
        <div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg> Note For file </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                        <form action="{{route('admin.submit_notepost')}}" method="post" class="referal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Note :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <textarea name="comment" placeholder="" id="comment" class="input-class"></textarea>
                                        <input type="hidden" name="businessfile_id" value="{{$businessdata->id}}">
                                        <input type="hidden" name="saleid" value="{{$businessdata->business_id}}">
                                        <input type="hidden" name="userid" value="{{Auth::guard('admin')->user()->id}}">
                                        <input type="hidden" name="usertype" value="admin">

                                    </div>
                                </div>
                            </div>
                           
                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                <a href="{{URL::previous()}}"><button type="button" class="custom-btn mr15">Cancel</button></a>
                                <button type="submit" class="custom-btn fill">Submit</button>
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


                $('.referal').validate({

                    rules: {                       
                        name:{
                            required : true,
                        },
                        email:{
                            required : true,
                        },
                        compensation:{
                            required : true,
                        },
                    }

                });
                });


        </script>
@endsection
@endsection