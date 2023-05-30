function ajouterQuestion() {
    event.preventDefault();
    let questionNumber = parseInt(document.getElementById('questionNumber').value) + 1;
    const newText = document.getElementById("questions");
    const label = document.createElement("label");
    label.textContent = "Question n°" + questionNumber;
    const input = document.createElement("input");

    input.setAttribute("type", "text");
    input.setAttribute("id", "question" + questionNumber);
    input.setAttribute("name", "question" + questionNumber);
    input.setAttribute("placeholder", "Entrez votre question");

    label.appendChild(input);
    newText.appendChild(label);

    document.getElementById('questionNumber').value = questionNumber;
}