@extends('masters.clientMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 edit-col-ad" style="color: rebeccapurple; text-align: center; margin-top: 10%">Categories Details</h1>
        @include('Zoo.ClientView.categoryDetails')
    </div>
@endsection
