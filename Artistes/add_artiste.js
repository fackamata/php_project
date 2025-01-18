const FIRST = document.getElementById('firstpass');
const SECOND = document.getElementById('secondpass');
const VALIDATE = document.getElementById('validate');
const BUTTONPASS = document.getElementById('submit');
const PSEUDOCONFIRM = document.getElementById('pseudoconfirm');

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

console.log(pseudo);
function pseudoexiste(){
    pseudo.some((item) => {
        MSGBOX = document.getElementById('msgconfirmpseudo');
        if (item['pseudoartiste'] == PSEUDOCONFIRM.value){
            console.log("Non");
            MSGBOX.innerHTML = "Pseudo déjà utilisé";
            BUTTONPASS.disabled = true;
            return true;
        }
        else{
            console.log('Oui');
            MSGBOX.innerHTML = "Pseudo valide";
            BUTTONPASS.disabled = false;
        }
    })
};

FIRST.addEventListener('input', samepass);
SECOND.addEventListener('input', samepass);
PSEUDOCONFIRM.addEventListener('input', pseudoexiste);