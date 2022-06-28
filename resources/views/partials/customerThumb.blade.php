<div class="container thumbs">
    @foreach($animal as $a)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <a class="home-product-item" href="#">
                <img src="{{asset('image/'. $a->image)}}" alt="" class="img-circle">
                <div class="caption">
                    <h3 class="text-center">{{$a->name}}</h3>
                    <p>{{$a->description}}</p>
{{--                    <div class="btn-toolbar text-center">--}}
{{--                        <a href="#" role="button" class="btn btn-success">Details</a>--}}
{{--                    </div>--}}
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div><!-- End Thumbnails -->
