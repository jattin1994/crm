                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Compensation %:</span></div>
                                <div class="col-xs-12 col-sm-2">
                                    <div class="input-wrap with-percent">
                                        <input type="text" name="compensation" value="{{$compensation}}" id="compensation" class="input-class" onchange="myFunction()">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="para" style="margin-left: 15px;font-weight: normal;">Compensation is how much your referred agent will be paid on a sale that they make.</p>
                            </div>
                            @if($override >= 0)
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Override %:</span></div>
                                <div class="col-xs-12 col-sm-2">
                                    <div class="input-wrap with-percent">
                                        <input type="text"  name="override" readonly="readonly" id="override" value="{{$override}}" class="input-class">
                                        <input type="hidden" name="username" value="{{Auth::guard('agent')->user()->id}}">
                                        <input type="hidden" name="usertype" value="agent">
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                            <div class="col-xs-12 col-sm-3"> <span class="element-name">
                                Override %:</span></div>
                                <div class="col-xs-12 col-sm-2">
                                    <div class="input-wrap with-percent">
                                        <input type="text"  name="override" readonly="readonly" id="override" class="input-class">
                                    </div>
                                </div>
                            </div>
                            <span style="color:red;margin-left: 15px;">The compensation you give to your new referral must be lower than the compensation you receive yourself</span>
                            @endif
                            <div class="form-group">
                                <p class="para" style="margin-left: 15px;font-weight: normal;">Override is what you be paid when your referred agent makes a sale. This percentage is calculated based on the compensation you give to your referred agent. Whatever percentage you do not give to your referred agent is kept as profit for yourself.</p>
                            </div>