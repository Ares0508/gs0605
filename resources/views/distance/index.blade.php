@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        {{ $mode }}
    </div>
    <div class="container-fluid">
        @include('distance.distance')
    </div>
</main>

@endsection
