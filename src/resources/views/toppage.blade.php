@extends('layouts.app')

@section('content')



@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="container">
        <h1>トップページです</h1>
    </div>


@endsection
