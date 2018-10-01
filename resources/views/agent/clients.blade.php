@extends('agent.layout.app')
@section('css')
<link rel="stylesheet" href="{{URL::asset('theme/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
        <div class="center-wrapper">
            <div class="center-inner clearfix">
                <h2 class="heading withicon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg> Clients Overview </h2>
                <!-- Overview -->
                <ul class="overview-list centeralign clearfix">
                    <li class="total">
                        <a href="#">
                            <span class="head">Total</span>
                            <span class="num">{{count($data)}}</span>
                        </a>
                    </li>
                    <!-- <li class="completed">
                        <a href="#">
                            <span class="head">Pending</span>
                            <span class="num"></span>
                        </a>
                    </li>
                    <li class="pending">
                        <a href="#">
                            <span class="head">Completed</span>
                            <span class="num"></span>
                        </a>
                    </li> -->
                </ul>
                <!-- Overview End -->
                <h2 class="heading withicon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg> Clients </h2>
                
                <div class="notification-table-wrap">
                    <div class="stickyTable" style="overflow-x: unset!important;">
                        <table id="example1"  class="table outlet-table shortingTable sticky-enabled notifications-table table-responsive no-padding video-list1">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="shortingLabel">First Name </span>
                                    </th>
                                    <th>
                                        <span class="shortingLabel">Last Name </span>
                                    </th>
                                    <th >
                                        <span class="shortingLabel">Phone </span>
                                    </th>
                                    <th >
                                        <span class="shortingLabel">Email </span>
                                    </th>
                                    <th >
                                        <span class="shortingLabel">Birthday </span>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td><a href="{{route('agent.client_overview',$d->id)}}" class="cname">{{ucfirst($d->name)}}</a></td>
                                    <td>{{ucfirst($d->lastname)}}</td>
                                    <td>{{$d->phone}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->birthday}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
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

      'lengthChange': false,

      'searching'   : true,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  })

</script>
@endsection
@endsection
