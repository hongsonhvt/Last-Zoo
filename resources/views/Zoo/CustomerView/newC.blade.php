@extends('masters.customerMaster')

@section('main')
    <div class="container">
        <div style="color: red; text-align: center; padding-top: 7%">
            @include('Zoo.CustomerView.sessionmessage')
        </div>
        @include('partials.errors')

        <form action="{{route('customer.storeC')}}" method="post">
            @csrf
            @include('Zoo.CustomerView.customerFields')

        </form>
    </div>
@endsection
