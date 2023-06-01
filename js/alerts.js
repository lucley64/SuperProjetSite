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
        text: "Ce formulaire n'est plus ou pas encore disponible",
        icon: 'error',
        background: 'white',
        });
}

function alertAlreadyAnswered(){
    Swal.fire({
        title: "Erreur",
        text: "Vous avez déjà répondu à ce questionnaire",
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
        text: "Ce nom existe déjà",
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

function alertValidModifChallenge(){
    Swal.fire({
        title: "Succès",
        text: "Data challenge modifié avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertValidCreateProject(){
    Swal.fire({
        title: "Succès",
        text: "Project data créé avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertValidModifProject(){
    Swal.fire({
        title: "Succès",
        text: "Project data modifié avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertValidAddRessources(){
    Swal.fire({
        title: "Succès",
        text: "Ressource ajoutée avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertErrorAddRessources(){
    Swal.fire({
        title: "Erreur",
        text: "Cette ressource existe déjà",
        icon: 'error',
        background: 'white',
        });
}

function alertValidModifUser(){
    Swal.fire({
        title: "Succès",
        text: "Informations modifiées avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertValidAnswer(){
    Swal.fire({
        title: "Succès",
        text: "Réponse au questionnaire envoyée avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertErrorRights(){
    Swal.fire({
        title: "Erreur",
        text: "Vous n'avez pas les droits",
        icon: 'error',
        background: 'white',
        });
}

function alertValidDeleteUser(){
    Swal.fire({
        title: "Succès",
        text: "Utilisateur supprimé avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertValidTeamDelete(){
    Swal.fire({
        title: "Succès",
        text: "L'équipe a été supprimée avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertValidQuitTeam(){
    Swal.fire({
        title: "Succès",
        text: "Vous avez quitté cette équipe avec succès",
        icon: 'success',
        background: 'white',
        });
}

function alertErrorMessage(){
    Swal.fire({
        title: "Erreur",
        text: "Ce destinataire n'existe pas",
        icon: 'error',
        background: 'white',
        });
}

function alertErrorTooManyUsers(){
    Swal.fire({
        title: "Erreur",
        text: "Il y déjà 8 membres dans l'équipe",
        icon: 'error',
        background: 'white',
        });
}