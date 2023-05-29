@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="message-box">
        <p>事務局が設定したメッセージ</p>
        <p>郵送で出品申込書を提出される場合は、こちらのフォームは手続き不要です。</p>
    </div>
    <div class="category">
        <span class="category-label">会員区分</span>
        <span class="required-label">必須</span>
    </div>
    <div class="question">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '1' ? 'checked' : '' }}>
            正会員
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '2' ? 'checked' : '' }}>
            準会員
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '3' ? 'checked' : '' }}>
            研究会員
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '4' ? 'checked' : '' }}>
            一般(非会員)、日本伝統工芸展への出品歴あり
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '5' ? 'checked' : '' }}>
                一般(非会員)、日本伝統工芸展への出品歴なし
            </label>
        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">会員番号 (ID)</span>
            <span class="required-label">必須</span>
        </div>
        会員番号がわからない場合は日本工芸会HPよりお調べいただけます:確認方法
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">会員ID</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="会員ID">
        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">お名前</span>
            <span class="required-label">必須</span>
        </div>
        <div class="myname">
            <label for="first-name">性:</label>
            <input type="text" class="form-control" id="first-name" name="first-name" placeholder="山本">
        </div>
        <div class="myname">
            <label for="last-name">名:</label>
            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="太郎">
        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">お名前(フリガナ)</span>
            <span class="required-label">必須</span>
        </div>
        <div class="myname">
            <label for="first-name">性:</label>
            <input type="text" class="form-control" id="first-name" name="first-name" placeholder="ヤマモト">
        </div>
        <div class="myname">
            <label for="last-name">名:</label>
            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="タロウ">
        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">雅号の有無</span>
            <span class="required-label">必須</span>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '1' ? 'checked' : '' }}>
            有
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" {{ old('flexRadioDefault') == '2' ? 'checked' : '' }}>
            無
            </label>
            <p>有にした時だけ雅号の記入欄が出現</p>
        </div>
        <div>
            <div class="myname">
                <p>雅号</p>
                <label for="first-name">性:</label>
                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="山本">
            </div>
            <div class="myname">
                <label for="last-name">名:</label>
                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="太郎">
            </div>
        </div>
        <div>
            <div class="myname">
                <p>雅号(フリガナ)</p>
                <label for="first-name">性:</label>
                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="ヤマモト">
            </div>
            <div class="myname">
                <label for="last-name">名:</label>
                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="タロウ">
            </div>
        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">生年月日パターン1</span>
            <span class="required-label">必須</span>
        </div>
        <div class="myname">
            <label for="year">年:</label>
            <select id="year" name="year">
                <option>-年を選択 -</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
            </select>
        </div>
        <div class="myname">
            <label for="month">月:</label>
            <select id="month" name="month">
                <option>-月を選択 -</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <div class="myname">
            <label for="day">日:</label>
            <select id="day" name="day">
                <option>-日を選択 -</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">生年月日パターン2</span>
            <span class="required-label">必須</span>
        </div>
        <label for="year">年:</label>
        <select name="myname">
            <option>- 年を選択 -</option>
            <?php
              $startYear = 1930;
              $endYear = 2022;
              for ($year = $startYear; $year <= $endYear; $year++) {
                echo '<option value="' . $year . '">' . $year . '</option>';
              }
            ?>
        </select>
        <label for="year">月:</label>
        <select name="myname">
            <option>- 月を選択 -</option>
            <?php
              $startYear = 1;
              $endYear = 12;
              for ($year = $startYear; $year <= $endYear; $year++) {
                echo '<option value="' . $year . '">' . $year . '</option>';
              }
            ?>
        </select>
        <label for="year">日:</label>
        <select name="myname">
            <option>- 日を選択 -</option>
            <?php
              $startYear = 1;
              $endYear = 31;
              for ($year = $startYear; $year <= $endYear; $year++) {
                echo '<option value="' . $year . '">' . $year . '</option>';
              }
            ?>
        </select>

    </div>
   <div class="question">
        <div class="category">
            <span class="category-label">住所</span>
            <span class="required-label">必須</span>
        </div>
        <form>
            <div>
              <label>郵便番号(3桁と4桁)</label>
              <input type="number" name="zip21" maxlength="3" placeholder="123" class="wi20"> - <input type="number" name="zip22" maxlength="4" placeholder="4567" class="wi20">
              <button type="button" onclick="searchAddress()">検索</button>
            </div>
            </div>
            <div>
              <label>都道府県</label>
              <input type="text" class="form-control" name="pref21" placeholder="東京都">
            </div> 
            <div>
              <label>市区町村</label>
              <input type="text" class="form-control" name="addr21" placeholder="中央区">
              <label>番地・号</label>
              <input type="text" class="form-control" name="strt21" placeholder="○○">
            </div>
            <div>
                <label>建物名・部屋番号</label>
                <input type="text" class="form-control" name="strt22" placeholder="○○">
            </div>
        </form>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">電話番号(携帯電話可)</span>
            <span class="required-label">必須</span>
        </div>
        <div>
            <label>電話番号(3桁と4桁と4桁)</label>
            <input type="number" name="tel1" maxlength="3" placeholder="090" class="wi20"> - <input type="number" name="tel2" maxlength="4" placeholder="1234" class="wi20"> - <input type="number" name="tel3" maxlength="4" placeholder="5678" class="wi20">

        </div>
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">メールアドレス</span>
            <span class="required-label">必須</span>
        </div> 
        <div>
            <p>メールで受付確認のお知らせをお送りしますので、メールアドレスを入力してください。</p>
            <input type="email" class="form-control" name="email1" placeholder="example@example.com">
        </div>
        <div>
            <p>確認のため、コピーせず再度入力してください。</p>
            <input type="email" class="form-control" name="email2" placeholder="example@example.com">
        </div>    
    </div>
    <div class="question">
        <div class="category">
            <span class="category-label">部門</span>
            <span class="required-label">必須</span>
        </div>
        <div class="myname">
            <select id="year" name="year">
                <option>-部門を選択 -</option>
                <option value="システム">システム</option>
                <option value="デザイン">デザイン</option>
                <option vaalue="染織">染織</option>
            </select>
        </div>
    </div>
    <a href="form2" class="custom-button" onclick="return checkForm()">次へ</a>

@endsection