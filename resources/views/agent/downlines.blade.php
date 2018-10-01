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
                        </svg> Downlines </h2>

                <div class="notification-table-wrap">
                    <div class="stickyTable" style="overflow-x: unset;">
                        <table id="example2"  class="table outlet-table shortingTable sticky-enabled notifications-table table-responsive no-padding video-list1">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="shortingLabel">Agent Name </span>
                                    </th>
                                    <th width="20%">
                                        <span class="shortingLabel">Agent ID </span>
                                    </th>
                                    <th width="25%">
                                        <span class="shortingLabel">Compensation % </span>
                                    </th>
                                    <th width="25%">
                                        <span class="shortingLabel">No of Sales </span>
                                    </th>
<!--                                     <th width="120px">
                                        <span class="shortingLabel">Action </span>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td><a href="{{url('agent/downline_detail/'.$d->id)}}" class="cname">{{ucfirst($d->name)}}</a></td>
                                    <td style="text-transform: uppercase;">{{$d->agentid}}</td>
                                    <td>{{$d->compensation}}</td>
                                    <td><span class="date">{{count($d->sales)}}</span></td>
                                    <!-- <td>
                                        <a href="{{route('agent.compensation', $d->id)}}" class="edit">Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
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