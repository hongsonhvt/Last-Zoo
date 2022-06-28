@extends('masters.clientMaster')

@section('main')

        <div class="container pad-top-200">
            <h1 class="display-4 edit-col-ad" style="color: black; text-align: center">Customer Details</h1>
            <div class="row">
                <div class="col-md-6">
                    <div id="slider" class="owl-carousel product-slider">
                        <div class="item">
                            <img src="{{asset('image/'. $animal->image)}}" alt="" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-dtl">
                        <div class="product-info">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <div class="single-product-details res-pro-tb">
                                    <h1 class="title-hone edit-col-ad"> {{ $animal->name }}</h1>
                                    <span class="single-pro-star">
											<i class="fa fa-star col-yel"></i>
											<i class="fa fa-star col-yel"></i>
											<i class="fa fa-star col-yel"></i>
											<i class="fa fa-star col-yel"></i>
											<i class="fa fa-star col-yel"></i>
										</span>
                                    <div class="detail-Class">
                                        <h3 class="title-hbar edit-col-ad">Animal Quantity:{{ $animal->quantity }}</h3>
                                        <p class="infor-p edit-col-ad">
                                        </p>
                                    </div>
                                    <div class="detail-Class">
                                        <h3 class="title-hbar edit-col-ad">Animal Habitat:{{$animal->habitat }}</h3>
                                        <p class="infor-p edit-col-ad">
                                        </p>
                                    </div>
                                    <div class="detail-Class">
                                        <h3 class="title-hbar edit-col-ad">Animal Description:{{$animal->description }}</h3>
                                        <p class="infor-p edit-col-ad">
                                        </p>
                                    </div>
                                    <div class="detail-Class">
                                        <h3 class="title-hbar edit-col-ad">Animal Categories:{{$categories->name }}</h3>
                                        <p class="infor-p edit-col-ad">
                                        </p>
                                    </div>
                                    <a href="{{route('clientView.index')}}">
                                        <button style="background-color: #5aff21; float: right;border: blanchedalmond">
                                            <h3 style="text-align: center"> Back to Home </h3>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="pb-4 mb-4 font-italic">
                    Zoo map
                </h1>
                <img src="https://www.colchester-zoo.com/wp-content/uploads/2019/02/app-map-02-1024x632.png">
            </div>
        </div>
@endsection
