@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="message-box">
        <p>事務局が設定したメッセージ</p>
        <p>郵送で出品申込書を提出される場合は、こちらのフォームは手続き不要です。</p>
    </div>
    <div class="question">
        <div class="category">
            <span cla枠を出すcategory-label"> 作家手取価格(税抜)</span>
            <span class="required-label">必須</span>
        </div>
        保険金額の算出に使用します。
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="number" class="form-control" id="exampleFormControlInput1" required>円
        </div>
    </div>
    
    

    <div class="question">
        <div class="category">
            <span class="category-label">寸法</span>
            <span class="required-label">必須</span>
        </div>
        <div class="myname">
            <label for="first-name">奥行(径):</label>
            <input type="number" id="first-name" name="first-name" placeholder="1" required>cm
        </div>
        <div class="myname">
            <label for="last-name">幅:</label>
            <input type="number" id="last-name" name="last-name" placeholder="2" required>cm
        </div>
        <div class="myname">
            <label for="last-name">高:</label>
            <input type="number" id="last-name" name="last-name" placeholder="3" required>cm
        </div>
    </div>
    <a href="form3" class="custom-button">次へ</a>
@endsection