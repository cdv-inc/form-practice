<!DOCTYPE html>
<html>
    <head>
        <title>伝統工芸展</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css?version=10">
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <script>
            function validateForm1() {
                var zip21 = document.getElementsByName('zip21')[0].value;
                var zip22 = document.getElementsByName('zip22')[0].value;
                var pref21 = document.getElementsByName('pref21')[0].value;
                var addr21 = document.getElementsByName('addr21')[0].value;
                var strt21 = document.getElementsByName('strt21')[0].value;
                var strt22 = document.getElementsByName('strt22')[0].value;
                var year = document.getElementsByName('year')[0].value;
                
                var selectedDepartment = document.getElementById('year').value;
                localStorage.setItem('selectedDepartment', selectedDepartment);

                if (zip21 === '' || zip22 === '' || pref21 === '' || addr21 === '' || strt21 === '' || year === '') {
                    alert('全ての情報を入力してください');
                    return false; // フォーム送信をキャンセル
                }

                var validDepartments = ['システム', 'デザイン', '染織'];
                if (!validDepartments.includes(year)) {
                    alert('有効な部門を選択してください');
                    return false; // フォーム送信をキャンセル
                }

                return true; // フォーム送信を許可
            }
            function searchAddress() {
                var zipCode = document.getElementsByName('zip21')[0].value + document.getElementsByName('zip22')[0].value;
                AjaxZip3.zip2addr('zip21', 'zip22', 'pref21', 'addr21');
            }
            
            function checkForm() {
                var inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
                var isValid = true;

                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].value === '') {
                        isValid = false;
                        break;
                    }
                }

                if (!isValid) {
                    alert('全てのフォームを入力してください');
                }

                return isValid;
        }
 
        </script>
    </head>
<body>
    <header>
        <h1>第99回 日本伝統工芸展 出品申込フォーム</h1>
    </header>
    <!-- 共通のコードや要素をここに記述 -->
    @yield('content') <!-- コンテンツの部分を表示するためのプレースホルダ -->
</body>
</html>
