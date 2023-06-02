@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    @php
        $zip_code = $form_data['zip21'] . '-' . $form_data['zip22'];
    @endphp

<li>トークン: {{ $form_data['_token'] }}</li>
<li>トークン2: {{ $form_data2['_token'] }}</li>

    
    <!-- ここに表示させたい変数を埋め込む -->
    <p>最終確認画面</p>
    <p>form_data1:</p>
    <ul>
        <li>郵便番号: {{ $zip_code }}</li>
        <li>都道府県: {{ $form_data['pref21'] }}</li>
        <li>区: {{ $form_data['addr21'] }}</li>
        <li>番地: {{ $form_data['strt21'] }}</li>
        <li>号: {{ $form_data['strt22'] }}</li>
        <li>部門: {{ $form_data['Department'] }}</li>
    </ul>
        
    <p>form_data2:</p>
    <ul>
        @if(isset($form_data2['oku']))
            <li>奥行き: {{ $form_data2['oku'] }}</li>
        @endif
    
        @if(isset($form_data2['haba']))
            <li>幅: {{ $form_data2['haba'] }}</li>
        @endif
    
        @if(isset($form_data2['takasa']))
            <li>高さ: {{ $form_data2['takasa'] }}</li>
        @endif
    </ul>

    <form action="{{ route('save') }}" method="POST">
        @csrf
        <input type="hidden" name="zip_code" value="{{ $zip_code }}">
        <input type="hidden" name="prefecture" value="{{ $form_data['pref21'] }}">
        <input type="hidden" name="ward" value="{{ $form_data['addr21'] }}">
        <input type="hidden" name="street_number" value="{{ $form_data['strt21'] }}">
        <input type="hidden" name="building_number" value="{{ $form_data['strt22'] }}">
        <input type="hidden" name="department" value="{{ $form_data['Department'] }}">
        <input type="hidden" name="depth" value="{{ isset($form_data2['oku']) ? $form_data2['oku'] : '' }}">
        <input type="hidden" name="width" value="{{ isset($form_data2['haba']) ? $form_data2['haba'] : '' }}">
        <input type="hidden" name="height" value="{{ isset($form_data2['takasa']) ? $form_data2['takasa'] : '' }}">
        <button type="submit">保存</button>
    </form>
@endsection
