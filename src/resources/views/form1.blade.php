@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="message-box">
        <p>事務局が設定したメッセージ</p>
        <p>郵送で出品申込書を提出される場合は、こちらのフォームは手続き不要です。</p>
    </div>
    <form action="form2" method="POST" onsubmit="return validateForm1()">        
        @csrf
        <div class="question">
            <div class="category">
                <span class="category-label">住所</span>
                <span class="required-label">必須</span>
            </div>
            <div>
                <label>郵便番号(3桁と4桁)</label>
                <input type="number" name="zip21" maxlength="3" placeholder="123" class="wi20" value="{{ old('zip21') ?: session('zip21') }}" > - <input type="number" name="zip22" maxlength="4" placeholder="4567" class="wi20"  value="{{ old('zip22') ?: session('zip22') }}" >
                <button type="button" onclick="searchAddress()">検索</button>
            </div>
            <div>
                <label>都道府県</label>
                <input type="text" class="form-control" name="pref21" placeholder="東京都"  value="{{ old('pref21') ?: session('pref21') }}" >
            </div> 
            <div>
                <label>市区町村</label>
                <input type="text" class="form-control" name="addr21" placeholder="中央区"  value="{{ old('addr21') ?: session('addr21') }}" >
                <label>番地・号</label>
                <input type="text" class="form-control" name="strt21" placeholder="○○"  value="{{ old('strt21') ?: session('strt21') }}" >
            </div>
            <div>
                <label>建物名・部屋番号</label>
                <input type="text" class="form-control" name="strt22" placeholder="○○" value="{{ old('strt22') ?: session('strt22') }}" >
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
                    <option value="システム" {{ (old('Department') ?: session('Department')) == 'システム' ? 'selected' : '' }}>システム</option>
                    <option value="デザイン" {{ (old('Department') ?: session('Department')) == 'デザイン' ? 'selected' : '' }}>デザイン</option>
                    <option value="染織" {{ (old('Department') ?: session('Department')) == '染織' ? 'selected' : '' }}>染織</option>
                </select>
            </div>
        </div>
        <button type="submit" class="custom-button" >次へ</button>
        <button type="button" onclick="resetFormValues()">リセット</button>
    </form>

    <script>

        // window.onbeforeunload = function() {
        //     saveFormValues();
        // };

        // ページがロードされたらセッションに入ってる値を入れ込む
        window.onload = function() {
            restoreFormValues();
        };

        // フォームが送信される前に入力値を保存する
        function validateForm1() {
            saveFormValues();
            return true;
        }

        // 入力した値をセッションに保存
        function saveFormValues() {
            var form = document.querySelector('form');
            for (var i = 0; i < form.elements.length; i++) {
                var element = form.elements[i];
                if (element.name && (element.type === 'text' || element.type === 'number' || element.type === 'select-one')) {
                    sessionStorage.setItem(element.name, element.value);
                }
            }
        }

        // 入力した値をセッションにいれたものを入れ込む
        function restoreFormValues() {
            var form = document.querySelector('form');
            for (var i = 0; i < form.elements.length; i++) {
                var element = form.elements[i];
                if (element.name && (element.type === 'text' || element.type === 'number' || element.type === 'select-one')) {
                    var savedValue = sessionStorage.getItem(element.name);
                    if (savedValue !== null) {
                        element.value = savedValue;
                    }
                }
            }
        }

        // 入力値をリセットする
        function resetFormValues() {
            var form = document.querySelector('form');
            form.reset();
            sessionStorage.clear();
        }
    </script>
@endsection
