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

function alertAlreadyAnswered(){
    Swal.fire({
        title: "Erreur",
        text: "Vous avez déjà répondu à ce formulaire",
        icon: 'error',
        background: 'white',
        });
}

function alertValidAddedUser(){
    Swal.fire({
        title: "Succès",
        text: "Invitation envoyée",
        icon: 'success',
        background: 'white',
        });
}

function alertErrorAddedUser(){
    Swal.fire({
        title: "Erreur",
        text: "Impossible d'ajouter cet utilisateur à l'équipe, il en fait déjà partie",
        icon: 'error',
        background: 'white',
        });
}

function alertValidCreatedUser(){
    Swal.fire({
        title: "Succès",
        text: "Compte créé avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertErrorCreatedUser(){
    Swal.fire({
        title: "Erreur",
        text: "Ce username est déjà utilisé",
        icon: 'error',
        background: 'white',
        });
}

function alertErrorName(){
    Swal.fire({
        title: "Erreur",
        text: "Un projet avec un tel nom existe déjà",
        icon: 'error',
        background: 'white',
        });
}

function alertErrorTime(){
    Swal.fire({
        title: "Erreur",
        text: "Veuillez vérifier vos dates",
        icon: 'error',
        background: 'white',
        });
}

function alertErrorCreationEquipe(){
    Swal.fire({
        title: "Erreur",
        text: "Vous faites déjà partie d'une équipe inscrite dans ce data challenge",
        icon: 'error',
        background: 'white',
        });
}

function alertValidForm(){
    Swal.fire({
        title: "Succès",
        text: "Questionnaire envoyé avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertErrorQuestion(){
    Swal.fire({
        title: "Erreur",
        text: "Veuillez rentrer au minimum une question",
        icon: 'error',
        background: 'white',
        });
}

function alertValidModifForm(){
    Swal.fire({
        title: "Succès",
        text: "Data challenge modifié avec succès",
        icon: 'success',
        background: 'white',
        });
}