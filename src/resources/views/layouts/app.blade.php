<!DOCTYPE html>
<html>
    <head>
        <title>伝統工芸展</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css?version=10">
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <script>
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
