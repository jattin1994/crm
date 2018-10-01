<!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="delete_accountdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                 <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> Banking Details </h2>
                 
                 <h6>Are you sure you want to delete your banking information?</h6>
                       <form class="login_modal forgot_password" action="{{url('/agent/delete_bankdetail')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">Cancel</button>
                              <button type="submit" class="custom-btn mr15">Confirm</button>
                          </div>

                      </form>
            </div>

      <div class="clearfix">
        </div>
    </div>
</div><!--End picture modal -->










