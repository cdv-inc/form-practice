@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<p>受付期間: 2024/1/1 ~ 2024/3/1</p>
<div class="container">
    <h2>ありがとうございました。</h2>

</div>

@endsection
