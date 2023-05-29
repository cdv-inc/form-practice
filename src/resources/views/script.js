document.getElementById('search').addEventListener('click', function() {
    var zip21 = document.getElementsByName('zip21')[0].value;
    var zip22 = document.getElementsByName('zip22')[0].value;
    var pref21 = document.getElementsByName('pref21')[0];
    var addr21 = document.getElementsByName('addr21')[0];
    var strt21 = document.getElementsByName('strt21')[0];
    
    AjaxZip3.zip2addr(zip21, zip22, pref21, addr21, strt21);
  });


  