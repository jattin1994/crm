@extends('agent.layout.app')
@section('content')
        <div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"> <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg> Notifications <button type="button" class="btn custom-btn pull-right editsale notific-close-all">Dismiss All</button></h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <ul class="notification-list-sec clearfix">
                        @foreach($data as $d)
                        <li class="read">
                            <a href="#">
                                @if($d->title=='Sales Material')
                                <span class="name" style="color:#f8a724;">S</span>
                                @else
                                <span class="name" style="color: #4990e2;">A</span>
                                @endif
                                <span class="noti-details">
                                        <span class="head">{{$d->title}}</span>
                                <span class="pr">{{$d->message}} </span>
                                </span>
                                <span class="date">{{
                                    date('h:i a, d M',strtotime($d->created_at))}}
                                    <input type="hidden" name="id" value="{{$d->id}}" id="notificationid">
                                        <span class="notific-close" >
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                 <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                                                 <path d="M0 0h24v24H0z" fill="none"/>
                                             </svg>                                        
                                        </span>
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- tabs _ 2-->
                </div>
                <!--  form-wrapper -->
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@section('js')
    <script>
        $(document).ready(function() {
            $(".notific-close").click(function() {
                $(this).parents('li').remove();
            });
        });
    </script>
    <script>
    $(".notific-close").click(function() {
        var id= document.getElementById("notificationid").value;
        console.log(id);
            $.ajax({
                type: "POST",
                url: "delete_notification",
                data: {notificationid:id,_token: '{{csrf_token()}}' },
                success: function(data) {
        }
    });
            });
</script>
<script>
    $(".notific-close-all").click(function() {
            $.ajax({
                type: "POST",
                url: "all_delete",
                data: {_token: '{{csrf_token()}}' },
                success: function(data) {
                    window.location.reload();
        }
    });
            });
</script>
@endsection
@endsection