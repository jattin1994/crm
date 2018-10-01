@extends('agent.layout.app')
@section('content')
        <div class="center-wrapper">
            <div class="center-inner clearfix">
                <nav class="agent-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                    </svg> Client Bank</a>
                        </li>
                        <li class="breadcrumb-item current" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 10v7h3v-7H4zm6 0v7h3v-7h-3zM2 22h19v-3H2v3zm14-12v7h3v-7h-3zm-4.5-9L2 6v2h19V6l-9.5-5z"/>
                                </svg> Add Client Bank Details</li>
                        <li class="breadcrumb-item"><a href="javascript:history.go(-1)" class="back"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></li>
                    </ol>
                </nav>
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                        <form action="{{route('admin.submit_clientbankingdetail')}}" method="post" class="referal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Bank Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="bankname"  id="bankname" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Bank Address :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="bankaddress" id="bankaddress" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Routing Number :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="routingno" id="routingno" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Account Holder Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="accountholdername" id="accountholdername" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Account Number :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="accoutnumber" id="accoutnumber" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Confirm Account Number :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text" name="confirm_account" id="confirm_account" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Account Type :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="accounttype" id="accounttype" class="input-class">
                                        <input type="hidden"  name="businessid" id="businessid" value="{{$id}}" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-12">
                                <button type="button" class="custom-btn mr15">Cancel</button>
                                <button type="submit" class="custom-btn fill">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- tabs _ 2-->
                </div>
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@section('js')
<script>

             $(document).ready(function(){


                $('.referal').validate({

                    rules: {                       
                        bankname:{
                            required : true,
                        },
                        bankaddress:{
                            required : true,
                        },
                        routingno:{
                            required : true,
                        },
                        accountholdername:{
                            required : true,
                        },
                        accounttype:{
                            required : true,
                        },
                        accoutnumber:{
                            required : true,
                        },
                        confirm_account:{
                            required : true,
                            equalTo: "#accoutnumber",
                        }
                    }

                });
                });


        </script>
@endsection
@endsection