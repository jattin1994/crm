<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="notification-table-wrap">
                    <div class="stickyTable" style="overflow-x: unset;">
                        <table  id="example1" class="table outlet-table shortingTable sticky-enabled notifications-table  table-responsive no-padding video-list1">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="shortingLabel">First Name </span>
                                        </th>
                                        <th>
                                            <span class="shortingLabel">Last Name </span>
                                        </th>
                                        <th>
                                            <span class="shortingLabel">Social ID</span>
                                        </th>
                                        <th>
                                            <span class="shortingLabel">Phone</span>
                                        </th>
                                        <th class="alignright">
                                            <span class="shortingLabel">Birthday</span>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td><a href="#" class="cname">{{$d->name}}</a></td>
                                        <td style="text-transform: uppercase;">{{$d->lastname}}</td>
                                        <td>{{$d->social}}</td>
                                        <td>{{$d->phone}}</td>

                                        <td class="alignright"><span class="date"></span>{{$d->birthday}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="btn-wrap align-center">
                        <a href="{{route('admin.download_report',$url)}}" class="custom-btn fill">Download Report</a>
                    </div>
                </div>
<script src="{{URL::asset('/theme/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{URL::asset('/theme/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

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
