const FIRST = document.getElementById('firstpass'); //Objet HTML Input du premier mot de passe
const SECOND = document.getElementById('secondpass');//Objet HTML Input du deuxième mot de passe
const VALIDATE = document.getElementById('validate');//Objet HTML de message du formulaire de mot de passe
const BUTTONPASS = document.getElementById('submit');//Objet HTML de validation du formulaire de mot de passe
const PSEUDOCONFIRM = document.getElementById('pseudoconfirm'); //Objet HTML de confirmation du pseudo

function samepass(){ //Fonction de vérification d'égalité des 2 mot de passes
    if (FIRST.value != SECOND.value){
        VALIDATE.innerText="Mot de passe différents"; //Affiche le msg dans le formulaire
        BUTTONPASS.disabled = true; //Désactive le bouton pour ne pas valider le formulaire
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
        MSGBOX = document.getElementById('msgconfirmpseudo'); //Objet HTML de message lié au pseudo unique ou non
        if (item['pseudoartiste'] == PSEUDOCONFIRM.value){
            MSGBOX.innerHTML = "Pseudo déjà utilisé";
            BUTTONPASS.disabled = true;
            return true;
        }
        else{
            MSGBOX.innerHTML = "Pseudo valide";
            BUTTONPASS.disabled = false;
        }
    })
};

FIRST.addEventListener('input', samepass); //Ajout de l'écoute d'évènement input sur l'objet HTML du premier mot de passe et lancement de la func samepass
SECOND.addEventListener('input', samepass);
PSEUDOCONFIRM.addEventListener('input', pseudoexiste);