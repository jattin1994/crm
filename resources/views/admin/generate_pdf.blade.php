<html>
<head>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('theme/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Style Core CSS -->
    <link href="{{URL::asset('theme/assets/css/style.css')}}" rel="stylesheet">
    <!-- Animate Core CSS -->
    <link href="{{URL::asset('theme/assets/css/animate.css')}}" rel="stylesheet">
    <!-- Hover Core CSS -->
    <link href="{{URL::asset('theme/assets/css/hover.css')}}" rel="stylesheet">
    <!-- Bootstrap Select Picker -->
    <link href="{{URL::asset('theme/assets/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Date Picker -->
    <link href="{{URL::asset('theme/assets/css/datepicker.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{URL::asset('theme/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom checkbox for this template -->
    <link href="{{URL::asset('theme/assets/css/pretty-checkbox.css')}}" rel="stylesheet" type="text/css" />
    <!-- layout css -->
    <link href="{{URL::asset('theme/assets/css/dashboard.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('theme/assets/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <!-- layout css -->
    <link href="{!! asset('theme/assets/css/jquery.toast.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('theme/assets/css/responsive.css') !!}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{URL::asset('theme/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
</head>
<body>
        <div class="center-wrapper">
            <div class="center-inner clearfix">
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
                                            <span class="shortingLabel">Socail ID </span>
                                        </th>
                                        <th>
                                            <span class="shortingLabel">Phone </span>
                                        </th>
                                        <th class="alignright">
                                            <span class="shortingLabel">Birthday </span>
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
            </div>
        </div>

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

        });
</script>
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
</body>
</html>