@extends('masters.clientMaster')

@section('main')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Sorry, This function is in the process of being updated, please come back later!</h1>
            <p class="lead">Thanks you so much!</p>
            <img src="/image/camon.png" alt="Thanksyou">
            <a href="{{route('clientView.index')}}" >
                <button style="background-color: yellow; float: right; margin-top: 2%">
                    Back to Home
                </button>
            </a>
        </div>
    </div>
@endsection

@section('script')
@endsection

