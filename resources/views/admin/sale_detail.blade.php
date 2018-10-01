@extends('admin.layout.app')
@section('css')
<style>
.changesale-status-select .dropdown-toggle.selectpicker {
    background: #edf5ff;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 2px;
}
.changesale-status-select .filter-option.pull-left {
    font-weight: 600;
    color: #4990e2;
}
.changesale-status-select .dropdown-toggle.selectpicker .caret {
    right: 10px;
    top: 18px;
}
.bootstrap-select.btn-group .btn .caret {
    position: absolute;
    padding: 3px;
    margin-top: -3px;
    border: solid #4e9efd !important;
    border-width: 2px 2px 0 0 !important;
}

.changesale-status-select .dropdown-menu.inner.selectpicker li a{
    font-weight: bold!important;
}
.agent-breadcrumb .breadcrumb .breadcrumb-item1:before{
    content:none;

}
</style>
@endsection
@section('content')   
     <div class="center-wrapper">
            <div class="center-inner clearfix">
                <nav class="agent-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.sales')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> Sales</a>
                        </li>
                        <li class="breadcrumb-item current" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg> View Sales</li>
                        <li class="breadcrumb-item"><a href="javascript:history.go(-1)" class="back"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></li>
                        <li  class="breadcrumb-item1" style="float: right;content: none !important;font-size: 24px;font-weight: 600;margin: 0 25px 0 0;position: relative;padding: 0 0 0 35px;"><a href="{{route('admin.edit_sale',$businessdata->id)}}"><button class="btn custom-btn pull-right fill editsale">Edit Sale</button></a></li>
                    </ol>
                </nav>

                <div class="agent-sales-view-tab clearfix">
                    <ul class="sales-view-tab-navi clearfix">
                        <li><a href="#clientinfo" class="active">Client and Sale information</a></li>
                        <li><a href="#uploaddoc">Uploaded Documents</a></li>
                    </ul>
                    <div class="sales-view-tab-container" id="clientinfo" style="display:block;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <div class="details-heads clearfix">
                                    <span class="name">{{ucfirst($businessdata->client->name)}}</span>
                                    @if($businessdata->status == '0')
                                    <span class="status-sec pending">Processing</span>
                                    @elseif($businessdata->status == '1')
                                    <span class="status-sec pending">Waiting on Funds</span>
                                    @elseif($businessdata->status == '2')
                                    <span class="status-sec ac-required">Action Required</span>
                                    @elseif($businessdata->status == '3')
                                    <span class="status-sec cancelled">Company Signing</span>
                                    @elseif($businessdata->status == '4')
                                    <span class="status-sec cancelled">Cancelled</span>
                                    @elseif($businessdata->status == '5')
                                    <span class="status-sec closed">Pending Fee Payment</span>
                                    @elseif($businessdata->status == '6')
                                    <span class="status-sec closed">Completed</span>
                                    @endif
                                    <button type="button" class="btn custom-btn pull-right fill editsale" data-toggle="modal" data-target="#changesale-status">Change Status</button>
                                </div>
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Social Security: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">XXX-XX-{{substr($businessdata->client->social,-4)}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Phone:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->client->phone}}</span>
                                    </div>
                                    @if($businessdata->client->phone1 != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Alternate Phone:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->client->phone1}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->client->email}}</span>
                                    </div>
                                    @if($businessdata->client->email1 != '')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Alternate Email:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->client->email1}}</span>
                                    </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Birthday:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->client->birthday}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->client->address}} </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <hr class="fline">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="headblc">Sales Information</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Sales Amount: </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">$ {{number_format(preg_replace("/[^0-9,.]/", "", $businessdata->amount),2)}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Sales Type:  </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">{{$businessdata->type}}</span>
                                    </div>
                                    @if($businessdata->type == 'Qualified' && $businessdata->custodian > '0')
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Custodian Name:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        @if($businessdata->custodian =='1')
                                        <span class="text">IRA Services Trust Company</span>
                                        @elseif($businessdata->custodian =='2')
                                        <span class="text">Mainstar Trust Group</span>
                                        @elseif($businessdata->custodian =='3')
                                        <span class="text">Provident Trust</span>
                                        @endif
                                    </div>
                                    @endif
                                    @if($businessdata->type == 'Qualified' && $businessdata->account_type > '0')
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Account Type:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        @if($businessdata->account_type =='1')
                                        <span class="text">Traditional IRA</span>
                                        @elseif($businessdata->account_type =='2')
                                        <span class="text">Roth IRA</span>
                                        @elseif($businessdata->account_type =='3')
                                        <span class="text">Inherited IRA</span>
                                        @elseif($businessdata->account_type =='4')
                                        <span class="text">401K</span>
                                        @endif
                                    </div>
                                    @endif

                                    @if($businessdata->type == 'Non-Qualified' && $businessdata->funding > '0')
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Funding Method:</label>
                                    </div>
                                    @if($businessdata->funding =='1')
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">Check</span>
                                        </div>
                                        @elseif($businessdata->funding =='2')
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">Wire</span>
                                        </div>
                                        @endif
                                    @endif
<!--                                     <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Effective Date:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">06/06/2018</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Maturity Date:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">06/06/2018</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <label>Interest Amount:</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <span class="text">$5000 </span>
                                    </div> --> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sales-view-tab-container" id="uploaddoc">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                                 <div class="sed-heading">Uploaded Documents</div>
                                <a href="{{route('admin.sales_material', $businessdata->id)}}"><button type="button" class="btn custom-btn pull-right editsale">Upload Files</button></a>
                                <ul class="sale-pdf-list">
                                    @foreach($businessdata->file as $filedata)
                                    <li>
                                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#deletesalefile{{$filedata->id}}"  class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn normal">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                        </svg>                                        
                                         Delete</a>

<!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="deletesalefile{{$filedata->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> My Sale </h2>
                 
                 <h6>You want to delete the sale file.</h6>
                       <form class="login_modal forgot_password" action="{{url('/admin/sale_filedelete')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                            <input type="hidden" name="saleid" value="{{$filedata->id}}">
                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">close</button>
                              <button type="submit" class="custom-btn mr15">Submit</button>
                          </div>

                      </form>
            </div>

      <div class="clearfix"></div><hr class="fline"><p style="text-align: center;"><a class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;" >Back to sale page</a></p>
        </div>
    </div>
</div><!--End picture modal -->


                                        <a href="
                                        {{route('admin.salenote',$filedata->id)}}" class="pdfvew"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                            <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM18 14H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                        </svg> Notes
                                        </a>
                                        <a href="{{URL::asset('file/'.$filedata->image)}}" class="pdfvew" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg> View</a>
                                        <div class="pdf-file">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/>
                                                </svg>
                                            <span class="head">{{$filedata->image}}</span>
                                            <span class="upcname"><i>Uploaded by:</i> {{$filedata->username($filedata->usertype,$filedata->userid)}}</span>
                                            <span class="upcdate"><i>Uploaded on:</i> {{date('h:i a, dM',strtotime($filedata->created_at))}}</span>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div id="changesale-status" class="modal fade modal-common-box" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content clearfix" >
                <div class="modal-body clearfix" >
                    <div class="close-modal" data-dismiss="modal" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg></div>
                    <span class="heads" >Change Sale Status</span>
                <form action="{{route('admin.changestatus')}}" method="post">
                    {{csrf_field()}}
                    <div class="changesale-status-select">
                        <select name="status" class="selectpicker" >
                                <option value="0" @if($businessdata->status == '0') selected @endif> Processing </option>
                                <option value="1" @if($businessdata->status == '1') selected @endif >Waiting on Funds</option>
                                <option value="2" @if($businessdata->status == '2') selected @endif> Action Required </option>
                                <option value="3" @if($businessdata->status == '3') selected @endif> Company Signing </option>
                                <option value="4" @if($businessdata->status == '4') selected @endif> Cancelled </option>
                                <option value="5" @if($businessdata->status == '5') selected @endif> Pending Fee Payment </option>
                                <option value="6" @if($businessdata->status == '6') selected @endif> Completed</option>
                            </select>
                    </div>
                    <input type="hidden" name="saleid" value="{{Request::segment('3')}}">
                    <div class="btn-wrap align-center" >
                        <button type="button" class="custom-btn mr15">Cancel</button>
                        <button type="submit" class="custom-btn fill">Save</button>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>

            <!--  center-inner -->
@section('js')
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
            $(".sales-view-tab-navi li a").on("click", function(event) {
                event.preventDefault();
                var hashidn = $(this).attr('href');
                $(".sales-view-tab-navi li a").removeClass("active");
                $(".sales-view-tab-container").hide();
                $(this).addClass("active");
                $(hashidn + ".sales-view-tab-container").show();
            });
        });
    </script>  
@endsection
@endsection