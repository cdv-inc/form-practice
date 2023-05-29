@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="container">
        <h1>画像のアップロード</h1>
        <div class="mb-3">
            <label for="image" class="form-label">画像を選択してください</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">アップロード</button>
    </div>
    <a href="form3" class="custom-button">次へ</a>
@endsection
