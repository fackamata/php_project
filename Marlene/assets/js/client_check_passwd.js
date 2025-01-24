const FIRST = document.getElementById('firstpass');
const SECOND = document.getElementById('motdepasseclient');
const VALIDATE = document.getElementById('validate');
const BTN_VALIDATE = document.getElementById('submit');

console.log("on est dans passwd check");

function check_passwd_form(){
    // console.log("on des dans check password");

    if (FIRST.value != SECOND.value){
        VALIDATE.innerText="Les mot de passe sont différents";
        BTN_VALIDATE.disabled = true;
    }
    else if (FIRST.value && SECOND.value){
        VALIDATE.innerText="Mot de passe identiques";
        BTN_VALIDATE.disabled = false;
    }
    else{
        VALIDATE.style.display = 'none';
        BTN_VALIDATE.disabled = true;
    }
}


FIRST.addEventListener('input', check_passwd_form);
SECOND.addEventListener('input', check_passwd_form);