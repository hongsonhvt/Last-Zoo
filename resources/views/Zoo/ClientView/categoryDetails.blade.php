<div class="single-product-tab-area mg-t-0 mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-product-pr">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div id="myTabContent1" class="tab-content">
                                <div class="product-tab-list tab-pane fade active in" id="single-tab1">
                                    <img src="{{asset('image/'. $categories->image)}}" alt="image" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <div class="detail-Class">
                                    <h3 class="title-hbar edit-col-ad">Name:</h3>
                                    <p class="infor-p edit-col-ad" style="color:black;"> {{ $categories->name }}
                                    </p>
                                </div>
                                <div class="detail-Class">
                                    <h3 class="title-hbar edit-col-ad" >Description:</h3>
                                    <p class="infor-p edit-col-ad" style="color:black;"> {{ $categories->description }}
                                    </p>
                                </div>

                            <a href="{{route('clientView.index')}}">
                                <button style="background-color: #5aff21; float: right;border: blanchedalmond; margin-top: 24%">
                                    <h3 style="text-align: center"> Back to Home </h3>
                                </button>
                            </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
