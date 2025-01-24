
var PSEUDO_CONFIRM = document.getElementById('pseudoconfirm');
var BTN_ISUBMIT = document.getElementById('submit');

console.log("on est dans check pseudo");

function pseudoexiste(){
    pseudo.some((item) => {
        MSGBOX = document.getElementById('msgconfirmpseudo');
        if (item['pseudoclient'] == PSEUDO_CONFIRM.value){
            console.log("Non");
            MSGBOX.innerHTML = "Pseudo déjà utilisé";
            BTN_ISUBMIT.disabled = true;
            return true;
        }
        else{
            console.log('Oui');
            MSGBOX.innerHTML = "Pseudo valide";
            BTN_ISUBMIT.disabled = false;
        }
    })
};

PSEUDO_CONFIRM.addEventListener('input', pseudoexiste);