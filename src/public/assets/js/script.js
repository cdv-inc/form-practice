var maxTextBoxes = 5; // 最大のテキストボックス数
var currentTextBoxes = 1; // 現在のテキストボックス数

var addTextBoxButton = document.getElementById('addTextBoxButton');
var textBoxContainer = document.getElementById('textBoxContainer');

addTextBoxButton.addEventListener('click', function () {
    if (currentTextBoxes < maxTextBoxes) {
        currentTextBoxes++;

        var newTextBox = document.createElement('div');
        newTextBox.classList.add('mb-3');
        newTextBox.innerHTML = '<label for="exampleFormControlInput' + currentTextBoxes + '" class="form-label"></label>' +
            '<input type="text" class="form-control" id="exampleFormControlInput' + currentTextBoxes + '">';

        textBoxContainer.appendChild(newTextBox);
    }
});
