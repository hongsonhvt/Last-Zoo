@extends('masters.clientMaster')

@section('main')
    <div class="container">
        <div style="color: red; text-align: center; padding-top: 7%">
            @include('Zoo.CustomerView.sessionmessage')
        </div>
        @include('partials.errors')

        <form action="{{route('clientView.storeC')}}" method="post">
            @csrf
            @include('Zoo.ClientView.customerFields')

        </form>
    </div>
@endsection
