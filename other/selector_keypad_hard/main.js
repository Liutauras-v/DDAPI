let todoF = document.getElementById('todo');
let inputF = document.getElementById('input');
let btns = document.querySelectorAll('#keypad *');

function newTodo() {
    let number = '';
    for (let i = 0; i < 5; i++) {
        number += Math.floor(Math.random() * 10);
    }
    todoF.value = number;
    inputF.value = '';
}

function checkNumericAttr(e) {
    for (let i = 0; i < 10; i++) {
        if (e.target.getAttribute(i) != null) {
            return i;
        }
    }
    return null;
}

document.getElementById('submit').addEventListener('click', e => {
    let out = document.getElementById('output');
    if (inputF.value == todoF.value) {
        out.innerHTML = "<p id='msg'>Correct!</p>"
    }
    else {
        out.innerHTML = "<p style='color:red' id='msg'>Incorrect</p>"
    }
    newTodo();
});


btns.forEach(e1 => {
    e1.addEventListener('click', e2 => {

        let numAttr = checkNumericAttr(e2);
        if (e2.target.innerHTML == 'del' || e2.target.innerHTML == '#') {
            if (e2.target.innerHTML == 'del') {
                try {
                    inputF.value = inputF.value.substring(0, inputF.value.length - 1);
                } catch (error) {
                    //skip
                }
            }
        }
        else if (e2.target.attributes.class != null) {
            inputF.value += e2.target.attributes.class.value;
        }
        else if (e2.target.attributes.id != null) {
            inputF.value += e2.target.attributes.id.value;
        }
        else if (e2.target.attributes.key != null) {
            inputF.value += e2.target.attributes.key.value;
        }
        else if (e2.target.attributes.name != null) {
            inputF.value += e2.target.attributes.name.value;
        }
        else if (numAttr != null) {
            inputF.value += numAttr;
        }
        else if (e2.target.innerHTML != '') {
            inputF.value += e2.target.innerHTML;
        }
    });
});





newTodo();