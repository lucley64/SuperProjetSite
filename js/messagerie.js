async function NvMessages() {
    try {
      const response = await fetch('messagerie/messagesrecus.php');
      const data = await response.text();
      console.log(data);
      document.getElementById("ContenuMessages").innerHTML=data;
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
      console.log(data);
      document.getElementById("ContenuMessagesEnvoyes").innerHTML=data;
      setTimeout(MessagesEnvoyes, 5000);
    } catch (error) {
      console.error('Erreur lors de la récupération des nouveaux messages:', error);
    }
  }

MessagesEnvoyes();