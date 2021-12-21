// function SetElements() {
//     let card = document.querySelector('.container')
//     for (let i = 0; i < 18; i++) {
//         let title = document.createElement('div')
//         title.className = 'card'
//         title.innerHTML = '<p class="def">User поделился </p><img src="img/file.ico" class="file_img" alt=""> '
//         card.appendChild(title);

//     }
// }
// SetElements();
let darkLayer = document.createElement('div');
var elements = document.getElementsByTagName('p');
console.log(elements[1].innerHTML);
// for (var i = 0; i < elements.length; i++) {
//     alert(elements[i].nodeValue);
// }

function showEnter() {

    darkLayer.id = 'shadow';
    document.body.appendChild(darkLayer);

    let modalWin = document.getElementById('form1');
    modalWin.style.display = 'block';

    let value = document.getElementById('enter');
    value.onclick = function() {
        darkLayer.parentNode.removeChild(darkLayer);
        modalWin.style.display = 'none';
        let x = document.querySelectorAll('.input-form');
        console.log(x);
        return false;
    };
    let exit = document.getElementById('exit');
    exit.onclick = function() {
        darkLayer.parentNode.removeChild(darkLayer);
        modalWin.style.display = 'none';
        return false;
    };
}

function regulate() {

    let name_input = document.getElementById("name-input");
    name_input.addEventListener('keydown', function(e) {
        if (e.key.match(/[0-9]/)) return e.preventDefault();
        if (e.key.match(/[" "]/)) return e.preventDefault();
    });
    // let surname_input = document.getElementById("surname-input");
    // surname_input.addEventListener('keydown', function(e) {
    //     if (e.key.match(/[0-9]/)) return e.preventDefault();
    //     if (e.key.match(/[" "]/)) return e.preventDefault();
    // });

}

function showRegistr() {
    regulate();
    let modalWin = document.getElementById('form2');
    modalWin.style.display = 'block';
    let value = document.getElementById('reg');
    let style_input = document.getElementById('tel-input');
    const reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    value.onclick = function() {
        let arr = [];
        let check = 0;
        let charIndex = 0;
        let name = document.getElementsByName("Name")[0].value;
        arr.push(name);
        let email = document.getElementsByName("Email")[0].value;
        let address = email;
        if (reg.test(address) == false) {
            alert('Введите корректный e-mail');
            return false;
        }
        arr.push(email);
        let telephone = document.getElementsByName("Tel")[0].value;
        while (charIndex < 18) {

            if (telephone.charAt(charIndex) == '_') {

                style_input.style.border = '2px solid red';
                check = 1;
            } else {
                style_input.style.border = '2px solid white';
                check = 0;
            }
            charIndex++;
        }
        arr.push(telephone);
        let password = document.getElementsByName("Password")[0].value;
        arr.push(password);
        for (let elem = 0; elem < arr.length; elem++) {
            if (!arr[elem] || x == 0) {
                alert("Заполните все элементы правильно!");
                check = 1;
                break;
            }
        }
        let passwordSecond = document.getElementsByName("PasswordSecond")[0].value;
        if (password != passwordSecond) {
            alert("Пароль не прошел проверку!");
            check = 1;
        }

        if (check == 0) {
            modalWin.style.display = 'none';
            console.log(arr);
            let registerForm = new FormData(document.getElementById('form2'));
            fetch('/register.php', {
                    method: 'POST',
                    body: form2
                })
                .then(response => response.json())
                .then((result) => {
                    if (result.errors) {
                        //вывод ошибок валидации на форму
                    } else {
                        //успешная регистрация, обновляем страницу
                    }
                })
                .catch(error => console.log(error));
            document.getElementById("pw1").value = "";
            document.getElementById("pw2").value = "";
            let ptr = document.getElementsByClassName("test");
            for (let i = 0; i < 4; i++) {
                document.getElementsByClassName("test")[i].value = null;
            }



        }

        return false;
    };

    let exit_reg = document.getElementById('exit_reg');
    let CloseWin = document.getElementById('form1');
    exit_reg.onclick = function() {
        modalWin.style.display = 'none';
        CloseWin.style.display = 'none';
        darkLayer.parentNode.removeChild(darkLayer);
        return false;
    }

}
let TelValid = document.querySelectorAll('input[type = "tel"]');
let im = new Inputmask('+7 (999) 999-99-99');
im.mask(TelValid);

function validateEmail(form_id, email) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = document.forms[form_id].elements[email].value;
    if (reg.test(address) == false) {
        alert('Введите корректный e-mail');
        return false;
    }
}
let x = 0;
checkBtn.onclick = function() {
    let checkPoint = document.getElementById('Icheck');
    if (x == 1) {

        checkPoint.style.display = "none";

        return x = 0;
    } else {

        checkPoint.style.display = "inline-block";
        return x = 1;
    }


}