@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="container">
        <form action="form4" method="POST" id="upload-form"> 
            @csrf
            <div class="question">
                <h1>画像のアップロード</h1>
                <div class="mb-3">
                    <label for="image" class="form-label">画像を選択してください</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
             </div>
            <button type="submit" class="custom-button">最終画面へ</button>
        </form>
    </div>
    <!-- ここに表示させたい変数を埋め込む -->
    <p>form_data: {{ print_r($form_data, true) }}</p>
    <p>form_data2: {{ print_r($form_data2, true) }}</p>
    <script>
        document.getElementById('upload-form').addEventListener('submit', function(e) {
            var imageInput = document.getElementById('image');
            
            if (!imageInput.files || imageInput.files.length === 0) {
                e.preventDefault(); // フォーム送信をキャンセル
                alert('画像を選択してください');
            }
        });
    </script>
@endsection
