@extends('admin.layout.app')
@section('css')
<link rel="stylesheet" href="{{URL::asset('theme/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<style>
.agent-breadcrumb .breadcrumb .breadcrumb-item1:before{
    content:none;

}
</style>
@endsection
@section('content')
        <div class="center-wrapper">
            <div class="center-inner clearfix">
                <nav class="agent-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                                    </svg> Agents
                            </a>
                        </li>
                        <li class="breadcrumb-item current" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg> View {{ucfirst($data->name)}} {{ucfirst($data->lastname)}}</li>
                        <li class="breadcrumb-item"><a href="{{URL::previous()}}" class="back"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></li>
                        <li  class="breadcrumb-item1" style="float: right;content: none !important;font-size: 24px;font-weight: 600;margin: 0 25px 0 0;position: relative;padding: 0 0 0 35px;"><a href="{{route('admin.add_newclient',Request::segment('3'))}}"><button class="btn custom-btn pull-right fill editsale">Add New Client</button></a></li>
                    </ol>
                </nav>
                <div class="agent-sales-view-tab clearfix">
                    <ul class="sales-view-tab-navi clearfix">
                        <li style="width:33% !important;"><a href="#clientinfo" class="active">Agent information</a></li>
                        <li style="width:33% !important;"><a href="#uploaddoc">Sales Done by Agent</a></li>
                        <li style="width:33% !important;"><a href="#clients">Clients Submitted by Agent</a></li>
                    </ul>
                    <div class="sales-view-tab-container" id="clientinfo" style="display:block;">
                        <!-- tabs _ 1-->
                        <div class="row tabs-container downlines-tabs-wrap" id="tab_2" style="display:block">
                            <div class="pp-details clearfix">
                            	
                                <div class="details-heads clearfix">
                                    <span class="name">{{ucfirst($data->name)}}  {{ucfirst($data->lastname)}}</span>
                                    @if($data->status == '1')
                                    <span class="status-sec pending">Pending</span>
                                    @elseif($data->status == '2')
                                    <span class="status-sec closed">Contracted</span>
                                    @elseif($data->status == '3')
                                    <span class="status-sec closed" style="color:red;">Terminated</span>
                                    
                                   	@endif
                                    <button type="button" class="btn custom-btn pull-right fill editsale" data-toggle="modal" data-target="#changeagent-status">Change Status</button>
                                </div>
                                <div class="row sales-view-details">

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Agent ID: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text" style="text-transform: uppercase;">{{$data->agentid}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Upline:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{ucfirst($data->upline($data->uplinetype,$data->upline))}}</span> </div>
                                    @if($data->company_name != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Company Name:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{ucfirst($data->company_name)}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Social Security: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">xxx-xx-{{substr("$data->socail_security_number",-4)}}</span>
                                    </div>
                                    @if($data->tax_id != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>EIN/Tax ID for company: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$data->tax_id}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Phone:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$data->phone_number}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$data->email}}</span>
                                    </div>
                                    @if($data->email2 != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Alternate Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$data->email2}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$data->address}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pp-details clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <hr class="fline">
                                </div>
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="headblc">{{ucfirst($data->name)}} Downlines</label>
                                            </div>
                                                @php
                                                $i=1;
                                                @endphp
                                            @foreach($data->downline($data->id) as $down)
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            
                                                <label>Downline {{$i}}:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <a href="{{route('admin.agent_detail',$down->id)}}"><span class="text blue">{{ucfirst($down->name)}}</span></a>
                                                @foreach($down->downline($down->id) as $agentdown)
                                                <a href="{{route('admin.agent_detail',$agentdown->id)}}"><img src="{{URL::asset('theme/assets/images/arrow.png')}}" style="width:100px;margin-left: -8px;display: unset;"><span style="margin-left: -70px;position: absolute;margin-top: 9px;">{{ucfirst($agentdown->name)}}</span></a>
                                                @endforeach
                                            </div>
                                            @php 
                                            $i++;
                                            @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <hr class="fline">
                                </div>
                                <div class="clear"></div>
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="headblc">Banking Details</label>
                                            </div>
                                            @if($data->bankingdetail != '')
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Bank Name:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{$data->bankingdetail->bankname}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Bank Address:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{$data->bankingdetail->bankaddress}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Routing No.:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">XXX-XX-{{substr($data->bankingdetail->routingno,-4)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Account Holder Name:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{ucfirst($data->bankingdetail->accountholdername)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Account Number:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">***-**-{{substr($data->bankingdetail->accoutnumber,-4)}}</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <label>Account Type:</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <span class="text">{{ucfirst($data->bankingdetail->accounttype)}}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <hr class="fline">
                                </div>
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <label class="headblc">Agent Documents</label>
                                    </div>
                                    @if($data->contract_file != '')
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <ul class="sale-pdf-list pp-docwrap no-mrg">
                                            <li>
                                                <a href="{{url('admin/download1/'.$data->contract_file)}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn"> 
                                                        <path d="M5 4v2h14V4H5zm0 10h4v6h6v-6h4l-7-7-7 7z"/>
                                                        <path d="M0 0h24v24H0z" fill="none"/>
                                                    </svg>
                                                     Download</a>
                                              <a href="{{URL::asset('file/contract_file/'.$data->contract_file)}}" class="pdfvew" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg> View</a>
                                                <div class="pdf-file">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">
                                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/>
                                                            </svg>
                                                    <span class="head">{{$data->contract_file}}</span>
                                                    <span class="upcname"><i>Uploaded by:</i> {{ucfirst($data->name)}}</span>
                                                    <span class="upcdate"><i>Uploaded on:</i> {{date('h:i a, m/d/Y',strtotime($data->updated_at))}}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- tabs _ 2-->
                    </div>
                    <div class="sales-view-tab-container" id="uploaddoc">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                                
                                <div class="notification-table-wrap">
                                    <div class="stickyTable" style="overflow-x: unset;">
                                        <table id="example1"  class="table outlet-table shortingTable sticky-enabled notifications-table table-responsive no-padding video-list1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <span class="shortingLabel">Sale ID </span>
                                                    </th>
                                                    <th>
                                                        <span class="shortingLabel">Client Name </span>
                                                    </th>
                                                    <th >
                                                        <span class="shortingLabel">Amount </span>
                                                    </th>
                                                    <th >
                                                        <span class="shortingLabel">Status </span>
                                                    </th>
                                                    <th >
                                                        <span class="shortingLabel">Data Created </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->sales as $sale)
                                                @if($sale->amount != '')
                                                <tr>
                                                    <td><a href="{{url('admin/sales_detail/'.$sale->id)}}" class="cname">{{$sale->id}}</a></td>
                                                    <td>{{ucfirst($sale->client->name)}}</td>
                                                    <td>$ {{number_format(preg_replace("/[^0-9,.]/", "", $sale->amount),2)}}</td>
                                                    <td>@if($sale->status == '0')
                                    <span class="status-sec pending">Processing (Default instead of Pending)</span>
                                    @elseif($sale->status == '1')
                                    <span class="status-sec pending">Waiting on Funds</span>
                                    @elseif($sale->status == '2')
                                    <span class="status-sec pending">Action Required</span>
                                    @elseif($sale->status == '3')
                                    <span class="status-sec cancelled">Company Signing</span>
                                    @elseif($sale->status == '4')
                                    <span class="status-sec ac-required" style="color:  #FFFF00;">Cancelled</span>
                                    @elseif($sale->status == '5')
                                    <span class="status-sec ac-required">Pending Fee Payment</span>
                                    @elseif($sale->status == '6')
                                    <span class="status-sec closed">Completed</span>
                                    @endif</td>
                                                    <td><span class="date">{{date('m/d/Y, h:ia', strtotime($sale->created_at))}}</span></td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="sales-view-tab-container" id="clients">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                            
                                <div class="notification-table-wrap">
                                    <div class="stickyTable" style="overflow-x: unset;">
                                        <table id="example2"  class="table outlet-table shortingTable sticky-enabled notifications-table table-responsive no-padding video-list1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <span class="shortingLabel">First Name</span>
                                                    </th>
                                                    <th>
                                                        <span class="shortingLabel">Last Name</span>
                                                    </th>
                                                    <th >
                                                        <span class="shortingLabel">Social Id</span>
                                                    </th>
                                                    <th >
                                                        <span class="shortingLabel">Phone</span>
                                                    </th>
                                                    <th >
                                                        <span class="shortingLabel">Email</span>
                                                    </th>
                                                    <th>
                                                        <span class="shortingLabel">Birthday</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->clients as $client)
                                                <tr>
                                                    <td><a href="{{route('agent.client_overview',$client->id)}}" class="cname">{{ucfirst($client->name)}}</a></td>
                                                    <td>{{ucfirst($client->lastname)}}</td>
                                                    <td>XXX-XX-{{substr($client->social,-4)}}</td>
                                                    <td>{{($client->phone)}}</td>
                                                    <td>{{($client->email)}}</td>
                                                    <td>{{($client->birthday)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  center-inner -->
        </div>


<!-- change status  -->
    <div id="changeagent-status" class="modal fade modal-common-box" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content clearfix" >
                <div class="modal-body clearfix" >
                    <div class="close-modal" data-dismiss="modal" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg></div>
                    <span class="heads" >Change Agent Status</span>
                <form action="{{route('admin.changeagentstatus')}}" method="post">
                    {{csrf_field()}}
                    <div class="changesale-status-select">
                        <select name="status" class="selectpicker" >
                                <option value="1" @if($data->status == '1') selected @endif> Pending </option>
                                <option value="2" @if($data->status == '2') selected @endif>Contracted </option>
                                <option value="3" @if($data->status == '3') selected @endif>Terminated </option>           
                        </select>
                    </div>
                    <input type="hidden" name="agentid" value="{{Request::segment('3')}}">
                    <div class="btn-wrap align-center" >
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
            $(".qualified-radio input[type='radio']").on("change", function() {
                if ($(this).val() == "Qualified") {
                    $("#qualified").show();
                    $("#Non-Qualified").hide();
                } else {
                    $("#Non-Qualified").show();
                    $("#qualified").hide();
                }
            });
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
<script src="{{URL::asset('/theme/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{URL::asset('/theme/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- <script src="{{URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> -->

<script>

  $(function () {

    $('#example1').DataTable()

    $('#example2').DataTable()

  })

</script>
@endsection
@endsection
