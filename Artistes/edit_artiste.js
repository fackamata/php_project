const FIRST = document.getElementById('firstpass');
const SECOND = document.getElementById('secondpass');
const VALIDATE = document.getElementById('validate');
const BUTTONPASS = document.getElementById('changepass');

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

FIRST.addEventListener('input', samepass);
SECOND.addEventListener('input', samepass);


const PSEUDO = document.getElementById('list');

function checkpseudo(){
    if(PSEUDO.value in PSEUDO){}
}
PSEUDO.addEventListener('input', checkpseudo);