async function NvMessages() {
  try {
    const response = await fetch('messagerie/messagesrecus.php');
    const data = await response.text();
    //console.log(data);
    document.getElementById("ContenuMessages").innerHTML = data;
    setTimeout(NvMessages, 5000);
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
    setTimeout(MessagesEnvoyes, 5000);
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
    //console.log(data);
    document.getElementById("voirMessages").innerHTML = data;
    setTimeout(MessagesEnvoyes, 5000);
  } catch (error) {
    console.error('Erreur lors de la récupération des messages envoyés:', error);
  }
}
VoirTousLesMessages();


function ajouterUseraequipe(elt) {
  //elt.style.display="none";
  var val = elt.parentNode.innerHTML;
  var idmessage = val[0];
  console.log(idmessage);

  const formdata = new FormData();
  formdata.append("idmessage", idmessage);
  fetch("/php/ajouterUseraEquipe.php", {
    method: "POST",
    body: formdata
  }).then(res => res.text()).then(res => console.log(res))
}