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

function alertSuccessDeleteDataChallenge() {
    Swal.fire({
        title: "Succès",
        text: "Data Challenge supprimé avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertSuccessDeleteProjectData() {
    Swal.fire({
        title: "Succès",
        text: "Project Data supprimé avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertOutOfTime(){
    Swal.fire({
        title: "Erreur",
        text: "Ce formulaire n'est plus disponible",
        icon: 'error',
        background: 'white',
        });
}