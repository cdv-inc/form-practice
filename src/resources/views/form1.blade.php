@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="message-box">
        <p>事務局が設定したメッセージ</p>
        <p>郵送で出品申込書を提出される場合は、こちらのフォームは手続き不要です。</p>
    </div>
    @if (!empty($form_data))
        @foreach($form_data as $key => $value)
            @if ($value)
                <p>{{ $key }}の値: {{ $value }}</p>
            @endif
        @endforeach
    @endif
    <form action="post-form-1" method="POST">        
        @csrf
        <div class="question">
            <div class="category">
                <span class="category-label">住所</span>
                <span class="required-label">必須</span>
            </div>
            <div>
                <label>郵便番号(3桁と4桁)</label>
                <input type="number" name="zip21" maxlength="3" placeholder="123" class="wi20" value="{{ old('zip21') ?: session('form_data.zip21') }}" > - <input type="number" name="zip22" maxlength="4" placeholder="4567" class="wi20"  value="{{ old('zip22') ?: session('form_data.zip22') }}" >
                <button type="button" onclick="searchAddress()">検索</button>
            </div>
            <div>
                <label>都道府県</label>
                <input type="text" class="form-control" id="pref21" name="pref21" placeholder="東京都"  value="{{ old('pref21') ?: session('form_data.pref21') }}" >
            </div> 
            <div>
                <label>市区町村</label>
                <input type="text" class="form-control" id="addr21" name="addr21" placeholder="中央区"  value="{{ old('addr21') ?: session('form_data.addr21') }}" >
                <label>番地・号</label>
                <input type="text" class="form-control" id="strt21" name="strt21" placeholder="○○"  value="{{ old('strt21') ?: session('form_data.strt21') }}" >
            </div>
            <div>
                <label>建物名・部屋番号</label>
                <input type="text" class="form-control" id="strt22" name="strt22" placeholder="○○" value="{{ old('strt22') ?: session('form_data.strt22') }}" >
            </div>
        </div>
        <div class="question">
            <div class="category">
                <span class="category-label">部門</span>
                <span class="required-label">必須</span>
            </div>
            <div class="myname">
                <select id="Department" name="Department" >
                    <option>-部門を選択 -</option>
                    <option value="システム" {{ (old('Department') ?: session('form_data.Department')) == 'システム' ? 'selected' : '' }}>システム</option>
                    <option value="デザイン" {{ (old('Department') ?: session('form_data.Department')) == 'デザイン' ? 'selected' : '' }}>デザイン</option>
                    <option value="染織" {{ (old('Department') ?: session('form_data.Department')) == '染織' ? 'selected' : '' }}>染織</option>
                </select>
            </div>
        </div>
        <button type="submit" class="custom-button" >次へ</button>
    </form>

    <script>

    </script>
@endsection
