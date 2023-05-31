

@extends('layouts.app')

@section('content')
    <h1>最終確認</h1>

    <h2>フォーム1の値</h2>
    <p>郵便番号: {{ $form1Values['zip21'] }} - {{ $form1Values['zip22'] }}</p>
    <p>都道府県: {{ $form1Values['pref21'] }}</p>
    <p>市区町村: {{ $form1Values['addr21'] }}</p>
    <p>番地・号: {{ $form1Values['strt21'] }}</p>

    <h2>フォーム2の値</h2>
    @if (!empty($form2Values['oku']) && !empty($form2Values['haba']) && !empty($form2Values['takasa']))
        <p>奥: {{ $form2Values['oku'] }} cm</p>
        <p>幅: {{ $form2Values['haba'] }} cm</p>
        <p>高さ: {{ $form2Values['takasa'] }} cm</p>
    @else
        <p>フォーム2の値がありません。</p>
    @endif
    <form action="{{ route('sendEmail') }}" method="POST">
        @csrf
        <button type="submit">送信</button>
    </form>
    <!-- 最終確認や送信ボタンなどのコンテンツを追加 -->

@endsection
