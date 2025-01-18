const FIRST = document.getElementById('firstpass');
const SECOND = document.getElementById('secondpass');
const VALIDATE = document.getElementById('validate');
const BUTTONPASS = document.getElementById('changepass');
const BUTTONSUPPRCOMPTE = document.getElementById('btnsupprcompte');
BUTTONSUPPRCOMPTE.addEventListener('click', supprcompte);
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

FIRST.addEventListener('input', samepass);
SECOND.addEventListener('input', samepass);


const PSEUDO = document.getElementById('list');

function pseudoexiste(){
    $currentpseudoindex = pseudo.IndexOf($currentpseudo)
    delete pseudo[$currentpseudoindex];
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

PSEUDOCONFIRM.addEventListener('input', pseudoexiste);

function supprcompte(){
    let supprcomptediv = document.getElementById('supprcompte');
    supprcomptediv.style.display = 'block';
    console.log(supprcomptediv);
}