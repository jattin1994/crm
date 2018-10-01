Header -->
        <header class="admin-header">
            <a href="javascript:void(0)" class="toggle-btn"><span></span><span></span><span></span></a>
            <div class="logo"><img src="{{URL::asset('theme/assets/images/logo_horizontal.png')}}" alt="" style="width: 15%;"></div>
            <ul class="right-sec">
<!--                 <li class="dropdown">
                    <a href="javascript:void(0)" class="notify-wrap dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::asset('theme/assets/images/notification.svg')}}" alt="">
                    </a>
                    <ul class="dropdown-menu notification-nav">
                        <div class="clear-notification">
                            <span></span><span></span><span></span>
                        </div>
                        @php
                        $user=Auth::guard('agent')->user();
                        $i=1;
                        @endphp

                        @foreach($user->notification as $notify)
                        @if( $i < '3')
                        @if($notify->status != '0')
                        <li class="read">
                            <a href="#">
                                @if($notify->title  ==  'Sales Material')
                                <span class="name" style="color:#f8a724;">S</span>
                                @else
                                <span class="name" style="color: #4990e2;">A</span>
                                @endif
                                <span class="para">{{ucfirst($notify->title)}}
                                    <span class="noti-close"><i class="fa fa-times"></i></span>
                                </span>
                            </a>
                        </li>
                        @endif
                        @php
                        $i++;
                        @endphp
                        @endif
                        @endforeach
                          <li class="viewall">
                            <a href="{{route('agent.notification')}}">View All Notifications</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="profile-wrap dropdown-toggle" data-toggle="dropdown">
                        <figure class="pp-images imgshow" style="background-image: none!important;">
                            @if((Auth::guard('agent')->user()->image) == '')
                                        <img class="img" src="{{URL::asset('theme/assets/images/avtar-img.png')}}" id="image_upload_preview1" />
                                        @else
                                        <img class="img" src="{{URL::asset('agentimage/'.(Auth::guard('agent')->user()->image))}}" id="image_upload_preview1" />
                            @endif
                        </figure>
                        <span>{{ucfirst(Auth::guard('agent')->user()->name)}}</span>
                    </a>
                    <ul class="dropdown-menu setting-nav">
                        <li><a href="{{route('agent.profile')}}"><i class="fa fa-user"></i> My Profile</a></li>
                        <li><a href="{{route('agent.logout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- Header End