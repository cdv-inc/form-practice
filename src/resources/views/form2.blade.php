@extends('layouts.app')

@section('content')
    <p>受付期間: 2024/1/1 ~ 2024/3/1</p>
    <div class="message-box">
        <p>事務局が設定したメッセージ</p>
        <p>郵送で出品申込書を提出される場合は、こちらのフォームは手続き不要です。</p>
    </div>
    <p>選択された部門: <?php echo session('selectedDepartment'); ?></p>
    <?php $selectedDepartment = session('selectedDepartment'); ?>
    <form action="form3" method="POST" onsubmit="return validateForm3()">        
        @csrf   
        <div class="question">
            <div class="category">
                <span class="category-label">寸法</span>
                @if ($selectedDepartment === '染織')
                    <span class="required-label">必須</span>
                @endif
            </div>
                <div class="myname">
                    <label for="oku">奥行(径):</label>
                    <input type="number" id="oku" name="oku" placeholder="1" value="{{ old('oku', session('oku')) }}">cm
                </div>
                <div class="myname">
                    <label for="haba">幅:</label>
                    <input type="number" id="haba" name="haba" placeholder="2" value="{{ old('haba', session('haba')) }}">cm
                </div>
                <div class="myname">
                    <label for="takasa">高:</label>
                    <input type="number" id="takasa" name="takasa" placeholder="3" value="{{ old('takasa', session('takasa')) }}">cm
                </div>
        </div>
        <button type="submit" class="custom-button">次へ</button>
        <button type="button" onclick="resetFormValues()">リセット</button>
    </form>
    <script>

        // window.onbeforeunload = function() {
        //     saveFormValues();
        // };
        // ページがロードされたときに入力値を復元する
        window.onload = function() {
            restoreFormValues();
        };

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

        var department = "<?php echo $selectedDepartment; ?>";
        //var department = "<?php echo session('selectedDepartment'); ?>"

        
        var inputs = {
            oku: document.getElementById('oku'),
            haba: document.getElementById('haba'),
            takasa: document.getElementById('takasa')
        };
        //foreachで全て無効化
        if (department !== '染織') {
            Object.values(inputs).forEach(function(input) {
                input.disabled = true;
                input.style.backgroundColor = '#f1f1f1';
            });
        }

        //データが空ならアラートを出す
        function validateForm3() {
            saveFormValues();
            var department = "<?php echo $selectedDepartment; ?>"; 
            var okuInput = document.getElementById('oku');
            var habaInput = document.getElementById('haba');
            var takasaInput = document.getElementById('takasa');

            if (department === '染織') {
                if (okuInput.value === '' || habaInput.value === '' || takasaInput.value === '') {
                    alert('寸法を入力してください');
                    return false;
                }
            }

            return true;
        }

        /*
        var input1 = document.getElementById('oku');
        var input2 = document.getElementById('haba');
        var input3 = document.getElementById('takasa');

        if (department !== '染織') {
            input1.disabled = true;
            input1.style.backgroundColor = '#f1f1f1';
            input2.disabled = true;
            input2.style.backgroundColor = '#f1f1f1';
            input3.disabled = true;
            input3.style.backgroundColor = '#f1f1f1';
        }
        */
    </script>
@endsection