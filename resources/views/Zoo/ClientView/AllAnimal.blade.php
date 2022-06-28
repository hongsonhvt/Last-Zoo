@extends('masters.clientMaster')

@section('main')

        <div class="container mt-5">
            <div>
                @foreach($animal as $a)
                    <div class="grid">
                        <div class="g-col-4"> <a href="{{route('animal.show', ['id' =>$a->id])}}">
                                <img src="{{asset('image/'. $a->image)}}" alt="" >
                                <div>
                                    <div class="g-col-4"> {{$a->name}}</div>
                                    <div class="g-col-4">{{$a->quantity}}</div>
                                    <div class="g-col-4"> {{$a->categoriesName}}</div>
                                    <a type="button" class="btn btn-primary btn-sm"
                                       href="{{route('animal.show', ['id' => $a->id])}}"
                                    >Details</a>
                                @endforeach
                                    <div class="container mt-5">
        <div>
            @foreach($animal as $a)
                <div>
                    <td>{{$a->name}}</td>
                    {{--                    <td>{{$a->image}}</td>--}}
                    <td>
                        <a href="{{route('animal.show', ['id' =>$a->id])}}">
                            <img src="{{asset('image/'. $a->image)}}" alt="" >
                        </a>
                    </td>

                    <td>{{$a->quantity}}</td>
                    <td>{{$a->categoriesName}}</td>
                </div>
            @endforeach
        </div>
@endsection

@section('script')
@endsection
