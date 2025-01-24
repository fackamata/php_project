const ADD_BTN = document.getElementById('incremente');
const PRIX = document.getElementById('prixtotal');
const PRIX_OBJ = document.getElementById('prix-object');
const QUANTITE = document.getElementById('idquantitebuy');

console.log('le js pour acheter');

ADD_BTN.addEventListener("click", (event) => {

    let prix_obj = parseFloat(PRIX_OBJ.innerText);

    let qte = parseInt(QUANTITE.value) + 1;
    
    total = prix_obj * qte


    console.log(total)
    
    PRIX.value = total + " €";
    // PRIX.value = toString(total) + " €";
    QUANTITE.value = qte
    
})

