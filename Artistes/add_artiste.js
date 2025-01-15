const FIRST = document.getElementById('firstpass');
const SECOND = document.getElementById('secondpass');
const VALIDATE = document.getElementById('validate');
const BUTTONPASS = document.getElementById('submit');

function samepass(){
    if (FIRST.value != SECOND.value){
        VALIDATE.innerText="Mot de passe différents";
        BUTTONPASS.disabled = true;
    }
    else if (FIRST.value && SECOND.value){
        VALIDATE.innerText="Mot de passe identiques";
        BUTTONPASS.disabled = false;
    }
    else{
        VALIDATE.style.display = 'none';
        BUTTONPASS.disabled = true;
    }
}

function pseudoexiste(){};

FIRST.addEventListener('input', samepass);
SECOND.addEventListener('input', samepass);