function alertWrongPassword() {
    Swal.fire({
        title: "Erreur",
        text: "Mauvais mot de passe saisi, veuillez recommencer",
        icon: 'error',
        background: 'white',
        });
}

function alertWrongIdentification() {
    Swal.fire({
        title: "Erreur",
        text: "Mauvais mot de passe ou identifiant saisi, veuillez recommencer",
        icon: 'error',
        background: 'white',
        });
}