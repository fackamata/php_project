const ADD_BTN = document.getElementById('incremente');
const QUANTITE = document.getElementById('idquantitebuy');

// console.log('on est dans incrémente bouton')

ADD_BTN.addEventListener("click", (event) => {


    let qte = parseInt(QUANTITE.value) + 1;
    
    QUANTITE.value = qte
    
})
