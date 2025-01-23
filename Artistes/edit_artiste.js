const FIRST = document.getElementById('firstpass');  //Objet HTML Input du premier mot de passe
const SECOND = document.getElementById('secondpass');//Objet HTML Input du deuxième mot de passe
const VALIDATE = document.getElementById('validate');//Objet HTML de message du formulaire de mot de passe
const BUTTONPASS = document.getElementById('changepass');//Objet HTML de validation de changement de mot de passe
const BUTTONSUPPRCOMPTE = document.getElementById('btnsupprcompte');//Objet HTML de suppression de compte
BUTTONSUPPRCOMPTE.addEventListener('click', supprcompte); //Objet HTML de validation de suppression de compte
const PSEUDOCONFIRM = document.getElementById('pseudoconfirm'); //Objet HTML de confirmation du pseudo
const BUTTONEDITARTISTE = document.getElementById('submit');//Objet HTML de validation du formulaire de modification d'artiste

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

FIRST.addEventListener('input', samepass); //Ajout de l'écoute d'évènement input sur l'objet HTML du premier mot de passe et lancement de la func samepass
SECOND.addEventListener('input', samepass);


const PSEUDO = document.getElementById('list');

console.log(pseudo);
function pseudoexiste(){
    pseudo.some((item) => {
        MSGBOX = document.getElementById('msgconfirmpseudo'); //Objet HTML de message lié au pseudo unique ou non
        if (item['pseudoartiste'] == PSEUDOCONFIRM.value && item['pseudoartiste'] != currentpseudo){ //Condition d'unicité du pseudo
            MSGBOX.innerHTML = "Pseudo déjà utilisé";
            BUTTONEDITARTISTE.disabled = true;
            return true;
        }
        else{
            MSGBOX.innerHTML = "Pseudo valide";
            BUTTONEDITARTISTE.disabled = false;
        }
    })
};

PSEUDOCONFIRM.addEventListener('input', pseudoexiste); //Ajout de l'écoute d'évènement input sur l'objet HTML de verification de pseudo

function supprcompte(){ //Fonction de suppresion du compte affiche la div de suppression
    let supprcomptediv = document.getElementById('supprcompte');
    supprcomptediv.style.display = 'block';
    console.log(supprcomptediv);
}