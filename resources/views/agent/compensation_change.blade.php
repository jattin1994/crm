@extends('agent.layout.app')

@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> {{ucfirst($data->name)}} Profile </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                <!-- Login form start here -->
                <form action="{{route('agent.update_compensation')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Name:</span></div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="input-wrap">
                            <input type="text" name="name" id="name" class="input-class"  maxlength="70" readonly="readonly" value="{{$data->name}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Last Name:</span></div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="input-wrap">
                            <input type="text" name="lastname" id="lastname" class="input-class" readonly="readonly" value="{{$data->lastname}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Email:</span></div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="input-wrap">
                            <input type="text" name="email" id="email" class="input-class" maxlength="70" readonly="readonly" value="{{$data->email}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-3"> <span class="element-name">No. of Sales:</span></div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="input-wrap">
                            <input type="text" name="sales" class="input-class" id="sales"  maxlength="70" readonly="readonly" value="{{count($data->sales)}}"}}" />
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Compensation:</span></div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="input-wrap">
                            <input type="text" name="compensation" class="input-class" id="compensation" required="required" maxlength="70" value="{{$data->compensation}}" />
                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-3">
                                <a href="{{URL::previous()}}"><button type="button" class="custom-btn mr15">Cancel</button></a>
                                <button type="submit" class="custom-btn fill">Submit</button>
                            </div>
                </form>

                                
                    </div>
                <!-- Login form end here -->
            </div>
        </div>
    </div>

@section('js')
    <script>
        $(document).ready(function() {
            $(".anim-label input").keyup(function() {
                var $this = $(this);
                if ($this.val().length >= 1) {
                    $this.parent().addClass("active");
                } else {
                    $this.parent().removeClass("active");
                }
            });
        });
    </script>

@endsection
@endsection