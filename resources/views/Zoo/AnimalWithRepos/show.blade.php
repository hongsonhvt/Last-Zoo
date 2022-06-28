@extends('masters.zooMaster')

@section('main')


    <div class="container">
        <h1 class="display-4 edit-col-ad" style="color: yellow; text-align: center">Animal Details</h1>
        @include('Zoo.AnimalWithRepos.animalDetails')

    </div>
@endsection
