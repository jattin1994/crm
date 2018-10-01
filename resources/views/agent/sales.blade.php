@extends('agent.layout.app')
@section('css')
<link rel="stylesheet" href="{{URL::asset('theme/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

        <div class="center-wrapper">
            <div class="center-inner clearfix">
                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm4.24 16L12 15.45 7.77 18l1.12-4.81-3.73-3.23 4.92-.42L12 5l1.92 4.53 4.92.42-3.73 3.23L16.23 18z"/>
                </svg> Sales Overview </h2>
                <!-- Overview -->
                <ul class="overview-list clearfix">
                    <li class="total">
                        <a href="{{route('agent.sales')}}">
                            <span class="head">All Sales</span>
                            <span class="num" style="color:#01499e">{{$total}}</span>
                        </a>
                    </li>
                    <li class="completed">
                        <a href="{{route('agent.salefilter','6')}}">
                            <span class="head">Completed</span>
                            <span class="num">{{$completed}}</span>
                        </a>
                    </li>
                    <li class="completed">
                        <a href="{{route('agent.salefilter','5')}}">
                            <span class="head">Pending Fee Payment</span>
                            <span class="num">{{$pending}}</span>
                        </a>
                    </li>
                    <li class="pending">
                        <a href="{{route('agent.salefilter','1')}}">
                            <span class="head">Waiting on funds</span>
                            <span class="num">{{$funds}}</span>
                        </a>
                    </li>
                    <li class="ac-required">
                        <a href="{{route('agent.salefilter','2')}}">
                            <span class="head">Action Required</span>
                            <span class="num">{{$action}}</span>
                        </a>
                    </li>
                    <li class="cancelled">
                        <a href="{{route('agent.salefilter','4')}}">
                            <span class="head">Cancelled</span>
                            <span class="num">{{$cancel}}</span>
                        </a>
                    </li>
                    <li class="pending">
                        <a href="{{route('agent.salefilter','0')}}">
                            <span class="head">Processing</span>
                            <span class="num">{{$processing}}</span>
                        </a>
                    </li>
                    <li class="cancelled">
                        <a href="{{route('agent.salefilter','3')}}">
                            <span class="head">Company Signing</span>
                            <span class="num">{{$signing}}</span>
                        </a>
                    </li>
                </ul>
                <!-- Overview End -->
                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg> Sales </h2>
                <div class="notification-table-wrap">
                    <div class="stickyTable" style="overflow-x: unset;">                   
                        <table id="example2"  class="table outlet-table shortingTable sticky-enabled notifications-table no-padding video-list1">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>
                                        <span class="shortingLabel">Sale ID 
                                    </th>
                                    <th>
                                        <span class="shortingLabel">First Name 
                                    </th>
                                    <th>
                                        <span class="shortingLabel">Last Name 
                                    </th>
                                    
                                    <th>
                                        <span class="shortingLabel">Amount 
                                    </th>

                                    <th>
                                        <span class="shortingLabel">Sale Type 
                                    </th>
                                    <th >
                                        <span class="shortingLabel">Status 
                                    </th>
                                    <th >
                                        <span class="shortingLabel">Data Created </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($businessdata as $data)
                                @if($data->amount != '')

                                <tr>
                                    <td style="display: none;"></td>
                                    <td><a href="{{url('agent/sales_detail/'.$data->id)}}" class="cname">{{$data->id}}</a></td>
                                    <td>{{$data->client->name}}</td>
                                    <td>{{$data->client->lastname}}</td>
                                    <td>$ {{number_format(preg_replace("/[^0-9,.]/", "", $data->amount),2)}}</td>
                                    <td>{{$data->type}}</td>
                                    <td>@if($data->status == '0')
                                    <span class="status-sec pending">Processing</span>
                                    @elseif($data->status == '1')
                                    <span class="status-sec pending">Waiting on Funds</span>
                                    @elseif($data->status == '2')
                                    <span class="status-sec ac-required">Action Required</span>
                                    @elseif($data->status == '3')
                                    <span class="status-sec cancelled">Company Signing</span>
                                    @elseif($data->status == '4')
                                    <span class="status-sec cancelled">Cancelled</span>
                                    @elseif($data->status == '5')
                                    <span class="status-sec closed">Pending Fee Payment</span>
                                    @elseif($data->status == '6')
                                    <span class="status-sec closed">Completed</span>
                                    @endif</td>
                                    <td><span class="date">{{date('m/d/Y, h:m a' , strtotime($data->created_at))}}</span></td>
                                </tr>
                                @endif
                                @endforeach                                
                            </tbody>
                        </table>                     
                    </div>
                </div>
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@section('js')
<script src="{{URL::asset('/theme/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{URL::asset('/theme/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- <script src="{{URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> -->

<script>

  $(function () {

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': true,

      'searching'   : true,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : true

    })

  })

</script>
@endsection
@endsection