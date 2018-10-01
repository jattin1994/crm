@extends('agent.layout.app')
@section('content')
<div class="center-wrapper">
            <div class="center-inner clearfix">
                <nav class="agent-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('agent.sales')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> Sales</a>
                        </li>
                        <li class="breadcrumb-item current" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg> View Sales</li>
                        <li class="breadcrumb-item"><a href="{{route('agent.sales')}}" class="back"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></li>
                    </ol>

                </nav>

                <div class="agent-sales-view-tab clearfix">
                    <ul class="sales-view-tab-navi clearfix">
                        <li><a href="#clientinfo" class="active">Sale Information</a></li>
                        <li><a href="#uploaddoc">Uploaded Document</a></li>
                    </ul>
                    <div class="sales-view-tab-container" id="clientinfo" style="display:block;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="details-heads clearfix">
                                    <a href="{{route('agent.client_overview',$businessdata->client->id)}}"><span class="name">{{ucfirst($businessdata->client->name)}}</span></a>
                                    @if($businessdata->status == '0')
                                    <span class="status-sec pending">Processing</span>
                                    @elseif($businessdata->status == '1')
                                    <span class="status-sec pending">Waiting on Funds</span>
                                    @elseif($businessdata->status == '2')
                                    <span class="status-sec ac-required">Action Required</span>
                                    @elseif($businessdata->status == '3')
                                    <span class="status-sec cancelled">Company Signing</span>
                                    @elseif($businessdata->status == '4')
                                    <span class="status-sec cancelled">Cancelled</span>
                                    @elseif($businessdata->status == '5')
                                    <span class="status-sec closed">Pending Fee Payment</span>
                                    @elseif($businessdata->status == '6')
                                    <span class="status-sec closed">Completed</span>
                                    @endif
                                    <!-- <a href="{{url('agent/edit_business/'.$businessdata->client->id)}}"><button type="button" class="btn custom-btn pull-right editsale">Edit</button></a> -->
                                </div>
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Sale ID: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{($businessdata->id)}}</span>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Sales Amount:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">$ {{number_format(preg_replace("/[^0-9,.]/", "", $businessdata->amount),2)}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Sales Type:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->type}}</span>
                                    </div>
                                    
                                    @if($businessdata->type == 'Qualified' && $businessdata->custodian > '0')
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Custodian Name:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        @if($businessdata->custodian =='1')
                                        <span class="text">IRA Services Trust Company</span>
                                        @elseif($businessdata->custodian =='2')
                                        <span class="text">Mainstar Trust Group</span>
                                        @elseif($businessdata->custodian =='3')
                                        <span class="text">Provident Trust</span>
                                        @endif
                                    </div>
                                    @endif
                                    @if($businessdata->type == 'Qualified' && $businessdata->account_type > '0')
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Account Type:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        @if($businessdata->account_type =='1')
                                        <span class="text">Traditional IRA</span>
                                        @elseif($businessdata->account_type =='2')
                                        <span class="text">Roth IRA</span>
                                        @elseif($businessdata->account_type =='3')
                                        <span class="text">Inherited IRA</span>
                                        @elseif($businessdata->account_type =='4')
                                        <span class="text">401K</span>
                                        @endif
                                    </div>
                                    @endif

                                    @if($businessdata->type == 'Non-Qualified' && $businessdata->funding > '0')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Funding Method:</label>
                                    </div>
                                    @if($businessdata->funding =='1')
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">Check</span>
                                        </div>
                                        @elseif($businessdata->funding =='2')
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">Wire</span>
                                        </div>
                                        @endif
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Effective Date:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">06/06/2018</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Maturity Date:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">06/06/2018</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Term:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">06/06/2018</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Return:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">06/06/2018</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sales-view-tab-container" id="uploaddoc">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                <div class="sed-heading">Uploaded Documents</div>
                               <a href="{{url('agent/upload_document/'.$businessdata->id)}}"> <button type="button" class="btn custom-btn pull-right editsale">Upload Files</button></a>
                                <ul class="sale-pdf-list">
                                    @foreach($businessdata->file as $filedata)
                                    @if($filedata->username($filedata->usertype,$filedata->userid) != '')
                                    
                                    <li>
                                        <a href="{{url('agent/download/'.$filedata->image)}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn"> 
                                            <path d="M5 4v2h14V4H5zm0 10h4v6h6v-6h4l-7-7-7 7z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                        </svg>
                                         Download</a>
                                        <a href="{{URL::asset('file/'.$filedata->image)}}" target="_blank" class="pdfvew"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg> View</a>
                                        <div class="pdf-file">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"></path>
                                                </svg>
                                            <span class="head">{{$filedata->image}}</span>
                                            <span class="upcname"><i>Uploaded by:</i> {{($filedata->username($filedata->usertype,$filedata->userid))}}</span>
                                            <span class="upcdate"><i>Uploaded on:</i>{{date('h:i a, dM',strtotime($filedata->created_at))}} </span>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@section('js')
<script>
            $(document).ready(function() {
                $(".sales-view-tab-navi li a").on("click", function(event) {
                event.preventDefault();
                var hashidn = $(this).attr('href');
                $(".sales-view-tab-navi li a").removeClass("active");
                $(".sales-view-tab-container").hide();
                $(this).addClass("active");
                $(hashidn + ".sales-view-tab-container").show();
            });
        });
    </script>
@endsection
@endsection