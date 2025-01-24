const FIRST = document.getElementById('motdepasse');
const SECOND = document.getElementById('motdepasseclient');
const VALIDATE = document.getElementById('validate');
const BTN_VALIDATE = document.getElementById('submit');
const PSEUDOCONFIRMCLIENT = document.getElementById('pseudoconfirm');

// console.log("on est dans client check en js");

function check_passwd_form(){
    console.log("on des dans check password");

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

function pseudoexiste(){
    pseudo.some((item) => {
        MSGBOX = document.getElementById('msgconfirmpseudo');
        if (item['pseudoclient'] == PSEUDOCONFIRM.value){
            console.log("Non");
            MSGBOX.innerHTML = "Pseudo déjà utilisé";
            BTN_VALIDATE.disabled = true;
            return true;
        }
        else{
            console.log('Oui');
            MSGBOX.innerHTML = "Pseudo valide";
            BTN_VALIDATE.disabled = false;
        }
    })
};

FIRST.addEventListener('input', check_passwd_form);
SECOND.addEventListener('input', check_passwd_form);
PSEUDOCONFIRMCLIENT.addEventListener('input', pseudoexiste);