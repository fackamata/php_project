let radio = document.querySelectorAll("input[name='type_compte']");
radio.forEach(element => {element.addEventListener('change', () => php_connex(element.value))});

function php_connex(value){
    console.log("php_connex");
    const FORM = document.getElementById("connexion");
    if (value == "artiste"){
        FORM.action = './Artistes/artiste_account.php';
    }
    else if (value == "client"){
        FORM.action = './Clients/client_account.php';
    }
}