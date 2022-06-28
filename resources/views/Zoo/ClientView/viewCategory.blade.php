@extends('masters.clientMaster')

@section('main')

    <div class="container thumbs">
        @foreach($categories as $c)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="margin-top: 50%">
                    <a class="home-product-item" href="{{route('clientView.showcategorydetail', ['id' => $c->id])}}">
                        <img src="{{asset('image/'. $c->image)}}" alt="" class="img-circle">
                        <div class="caption">
                            <h3 class="text-center">{{$c->name}}</h3>
{{--                            <h3 class="text-center">{{$c->description}}</h3>--}}
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div><!-- End Thumbnails -->

@endsection

@section('script')
@endsection
