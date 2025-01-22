const FIRST = document.getElementById('firstpass');
const SECOND = document.getElementById('secondpass');
const VALIDATE = document.getElementById('validate');
const BUTTONPASS = document.getElementById('changepass');
const BUTTONSUPPRCOMPTE = document.getElementById('btnsupprcompte');
BUTTONSUPPRCOMPTE.addEventListener('click', supprcompte);
const PSEUDOCONFIRM = document.getElementById('pseudoconfirm');
const BUTTONEDITARTISTE = document.getElementById('submit');

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

console.log(pseudo);
function pseudoexiste(){
    pseudo.some((item) => {
        MSGBOX = document.getElementById('msgconfirmpseudo');
        if (item['pseudoartiste'] == PSEUDOCONFIRM.value && item['pseudoartiste'] != currentpseudo){
            console.log("Non");
            MSGBOX.innerHTML = "Pseudo déjà utilisé";
            BUTTONEDITARTISTE.disabled = true;
            return true;
        }
        else{
            console.log('Oui');
            MSGBOX.innerHTML = "Pseudo valide";
            BUTTONEDITARTISTE.disabled = false;
        }
    })
};

PSEUDOCONFIRM.addEventListener('input', pseudoexiste);

function supprcompte(){
    let supprcomptediv = document.getElementById('supprcompte');
    supprcomptediv.style.display = 'block';
    console.log(supprcomptediv);
}