@extends('admin.layout.app')
@section('css')
<style>
</style>
  <link rel="stylesheet" href="{{URL::asset('/dist/datepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('theme/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
        <div class="center-wrapper">
            <div class="center-inner clearfix">
                <h2 class="heading withicon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                            <path d="M5 9.2h3V19H5zM10.6 5h2.8v14h-2.8zm5.6 8H19v6h-2.8z"/>
                            <path fill="none" d="M0 0h24v24H0z"/>
                        </svg> Reports </h2>
                <!-- Overview -->
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3"> <span class="element-name">Reports of :</span></div>
                    <div class="col-xs-12 col-sm-5">
                        <div class="inputfield-wrap radio-btn">
                            <label class="radio-inline"><input type="radio" value="Agent and Downline Pay" name="optradio">Agent and Downline Pay</label>
                            <label class="radio-inline"><input type="radio" value="Client Pay" name="optradio">Client Pay</label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <hr class="fline">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 sales-view-details">
                    <label class="headblc">Select Time Period</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="choose-rep-mm">
                        <label class="radio-inline">
                            <input type="radio" id="period" value="1" name="period" checked=""></label>
                        <select name="periodvalue" id="periodvalue" class="selectpicker">
                                <option value="0"> Last Week </option>
                                <option value="1"> Last Month </option>
                                <option value="2"> Year to Date </option>
                                <option value="4"> Last Year </option>                              
                            </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 specific-period">
                    <div class="specific-period-heads">
                        <label class="radio-inline"><input type="radio" id="period1" value="2" name="period"></label>
                        <label class="heads">Specific Period:</label>
                    </div>
                    <div class="from-to-wrap clearfix">
                    <form id="myform">
                        <div class="from-section">
                            <div class="inputfield-wrap">
                                <input type="text" name="reg_start_date" value="" class="form-control" id="reg-start-date" placeholder="From" data-toggle="datepicker">
                                <label class="ficon ficon-right" for="reg-start-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                </svg>
                                </label>
                            </div>
                            <span class="error-msg"></span>
                        </div>
                        <div class="to-section">
                            <div class="inputfield-wrap">
                                <input type="text" name="reg_end_date" value="" class="form-control" id="reg-end-date" data-toggle="datepicker" placeholder="To">
                                <label class="ficon ficon-right" for="reg-end-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                </svg>
                                </label>
                            </div>
                            <span class="error-msg"></span>
                        </div>
                    </div>
                
                </div>
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="btn-wrap align-center">
                        <button type="button" class="custom-btn fill"  onclick="myFunction()">Generate Report</button>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <hr class="fline">
                </div>
                <div id="loading" style="display: none;">
                    <div class="col-lg-12" style="justify-content: center;display: flex;">
                        <img id="loading-image" src="{{URL::asset('search_loader.gif')}}" style="width:250px;height:250px;"  alt="Loading..." />
                    </div>
                </div>

                    <div id="ajax">

                    </div>
                
            </div>
            <!--  center-inner -->
        </div>
        <!--  center-wrapper -->
@section('js')
<script>
$('#reg-start-date').keyup(function(){
var reg_start_date=$(this).val($(this).val().replace(/(\d{2})\/?(\d{2})\/?(\d{4})/,'$1/$2/$3'));
});
$.validator.addMethod("custom_birthday", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\/]+$/) && value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
}, "Please enter a valid date");

$('#reg-end-date').keyup(function(){
var reg_end_date=$(this).val($(this).val().replace(/(\d{2})\/?(\d{2})\/?(\d{4})/,'$1/$2/$3'));
});
$.validator.addMethod("custom_birthday", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,\/]+$/) && value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
}, "Please enter a valid date");

</script>
<script>
$(document).ready(function () {

    $('#myform').validate({
        rules: {
            reg_start_date: {
                custom_birthday:true,
                required: true,
            },
            reg_end_date: {
                custom_birthday:true,
                required: true,
            }
        },
        submitHandler: function (form) { // for demo
            alert('valid form');
            return false;
        }
        
    });
    });
</script>
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
<script>
function myFunction() {
            $('#loading').show();
            
            if (document.getElementById('period').checked) {
            var period  =  document.getElementById("period").value;
            }
            if (document.getElementById('period1').checked) {
            var period  =  document.getElementById("period1").value;
            }
            var periodvalue = document.getElementById("periodvalue").value;
            var regenddate  =  document.getElementById("reg-end-date").value;
            var regstartdate  =  document.getElementById("reg-start-date").value;
                
        var path={!! json_encode(url('/')) !!};
        $.ajax({
          url:path+"/admin/generate_report",
          method:"POST",
          data:{"_token":"{{ csrf_token() }}","period":period,"periodvalue":periodvalue,"regenddate":regenddate,"regstartdate":regstartdate},
          beforeSend: function() {
                        $("#loading").show();
                    },
          success:function(data){
            $('#loading').hide();
            $("#ajax").html(data);
          }
        });
}

</script>
<script src="{{URL::asset('/dist/datepicker.js')}}"></script>
  <script>
    $(function() {
      $('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
      });
    });
  </script>

@endsection
@endsection