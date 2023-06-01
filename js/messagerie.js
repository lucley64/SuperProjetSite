async function NvMessages() {
  try {
    const response = await fetch('messagerie/messagesrecus.php');
    const data = await response.text();
    //console.log(data);
    document.getElementById("ContenuMessages").innerHTML = data;
    setTimeout(NvMessages, 500);
  } catch (error) {
    console.error('Erreur lors de la récupération des nouveaux messages:', error);
  }
}

NvMessages();


async function MessagesEnvoyes() {
  try {
    const response = await fetch('messagerie/messagesEnvoyes.php');
    const data = await response.text();
    //console.log(data);
    document.getElementById("ContenuMessagesEnvoyes").innerHTML = data;
    setTimeout(MessagesEnvoyes, 500);
  } catch (error) {
    console.error('Erreur lors de la récupération des messages envoyés:', error);
  }
}

MessagesEnvoyes();

function afficher(elt) {
  var vals = document.getElementsByClassName("elt");
  /*on cache tout*/
  for (let i = 0; i < vals.length; i++) {
    vals[i].style.display = "none";
  }
  let classe = elt.className;
  document.getElementById(classe).style.display = "block";
}


async function VoirTousLesMessages() {
  try {
    const response = await fetch('messagerie/voirtouslesmessages.php');
    const data = await response.text();
    console.log(data);
    document.getElementById("ContenuVoirMessages").innerHTML = data;
    setTimeout(VoirTousLesMessages, 500);
  } catch (error) {
    console.error('Erreur lors de la récupération des messages envoyés:', error);
  }
}
VoirTousLesMessages();


function ajouterUseraequipe(elt) {

  var val = elt.parentNode.parentNode.parentNode.id;
  console.log(val);
  var idmessage = parseInt(val.slice(7));;//l'id du message est appelé messageX avec X le numero du message
  const formdata = new FormData();
  formdata.append("idmessage", idmessage);
  fetch("/php/ajouterUseraEquipe.php", {
    method: "POST",
    body: formdata
  }).then(res => res.text()).then(res => console.log(res))
}

function NePasajouterUseraequipe(elt){
  var val = elt.parentNode.parentNode.parentNode.id;
  var idmessage = parseInt(val.slice(7));
  console.log(idmessage);
  const formdata = new FormData();
  formdata.append("idmessage", idmessage);
  fetch("/php/nepasajouterUseraEquipe.php", {
    method: "POST",
    body: formdata
  }).then(res => res.text()).then(res => console.log(res))
}