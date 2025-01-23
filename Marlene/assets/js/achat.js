const ADD_BTN = document.getElementById('incremente');
const PRIX = document.getElementById('prixtotal');
const PRIX_OBJ = document.getElementById('prix-object');
const NBR_OBJ = document.getElementById('idquantitebuy');
const QUANTITE = document.getElementById('idquantitebuy');

console.log('le js pour acheter');

ADD_BTN.addEventListener("click", (event) => {

    let prix_obj = parseFloat(PRIX_OBJ.innerText);

    let qte = parseInt(QUANTITE.value) + 1;
    
    // console.log(prix_obj)
    // console.log(typeof(prix_obj))
    // console.log(qte)
    // console.log(typeof(qte))
    total = prix_obj * qte

    console.log(total)
    
    PRIX.value = total;
    QUANTITE.value = qte
    
})

