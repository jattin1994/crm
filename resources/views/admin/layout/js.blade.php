<script src="{{URL::asset('theme/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/bootstrap-select.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/datepicker.min.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/sticky-table.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/custom.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/date-validation.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/dropzone.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('theme/assets/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{URL::asset('theme/assets/js/pignose.calendar.full.min.js')}}"></script>
    <script type="text/javascript" src="{!! asset('theme/assets/js/jquery.toast.min.js') !!}"></script>

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
@if (session('success'))
    <script type="text/javascript">
        $.toast({
            heading: 'Success',
            text: '{{ session('success') }}',
            showHideTransition: 'slide',
            position: 'bottom-right',
            stack: 2,
            icon: 'success'
        });
    </script>
    @php
        session()->forget('success');
    @endphp
@endif

@if (session('error'))
    <script type="text/javascript">
        $.toast({
            heading: 'Error',
            text: '{{ session('error') }}',
            position: 'bottom-right',
            stack: 2,
            icon: 'error',
            loader: true,        // Change it to false to disable loader
            loaderBg: '#9EC600'  // To change the background
        })
    </script>
    @php
        session()->forget('error');
    @endphp
@endif
