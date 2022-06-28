<input type="hidden" name="c_id" value="{{old('c_id')?? $customer->c_id}}">
<div class="all-content-wrapper">
    <!-- Single pro tab start-->
    <div class="single-product-tab-area mg-b-30">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row-edit">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">

                                {{--                                <li><a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Pictures</a></li>--}}
                                {{--                                <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Review</a></li>--}}
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row-edit pad-bot-35">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon" >Name:<i class="fa-solid fa-paw"></i></span>
                                                    <input type="text" class="form-control" id="c_fullname" name="c_fullname" min="0" value="{{old('c_fullname')?? $customer->c_fullname}}">
                                                </div>

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon" >Date of Birth:<i class="fa-solid fa-paw"></i></span>
                                                    <input type="date" class="form-control" id="c_dob" name="c_dob" value="{{old('c_dob')?? $customer->c_dob}}">
                                                </div>



                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon" >Gender:<i class="fa-solid fa-paw"></i></span>
{{--                                                    <input type="text" class="form-control" id="c_gender" name="c_gender" value="{{old('c_gender')?? $customer->c_gender}}">--}}
                                                    <select class="form-control" id="c_gender" name="c_gender" value="{{old('c_gender')?? $customer->c_gender}}">
                                                        <option>Female</option>
                                                        <option>Male</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon" for="quantity">Email:<i class="fa-solid fa-pen"></i></span>
                                                    <input type="email" class="form-control" id="c_email" name="c_email" value="{{old('c_email')?? $customer->c_email}}">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Address:<i class="fa-solid fa-money-bill-1-wave"></i></span>
                                                    <input type="text" class="form-control" id="c_address" name="c_address" value="{{old('c_address')?? $customer->c_address}}">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Phone:<i class="fa-solid fa-pen-to-square"></i></span>
                                                    <input type="text" class="form-control" id="c_phone" name="c_phone" value="{{old('c_phone')?? $customer->c_phone}}">
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="row-edit">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button  type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                                </button>
                                                <button type="button" onclick="location.href='{{route('clientView.index')}}';" class="btn btn-ctl-bt waves-effect waves-light">Discard
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{--many-to-many relationship--}}

