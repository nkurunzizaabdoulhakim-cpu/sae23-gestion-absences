const casesAbsence = document.querySelectorAll(".case-absence");

casesAbsence.forEach(function (caseAbsence) {
    caseAbsence.addEventListener("click", function () {
        let typeActuel = this.dataset.type;

        if (typeActuel === "AUCUNE") {
            this.dataset.type = "ABI";
            this.textContent = "ABI";
            this.className = "case-absence abi";
        } else if (typeActuel === "ABI") {
            this.dataset.type = "ABJ";
            this.textContent = "ABJ";
            this.className = "case-absence abj";
        } else if (typeActuel === "ABJ") {
            this.dataset.type = "ABI";
            this.textContent = "ABI";
            this.className = "case-absence abi";
        }

        mettreAJourInput(this);
    });

    caseAbsence.addEventListener("dblclick", function () {
        this.dataset.type = "AUCUNE";
        this.textContent = "-";
        this.className = "case-absence";
        mettreAJourInput(this);
    });
});

function mettreAJourInput(element) {
    const etudiantId = element.dataset.etudiant;
    const creneau = element.dataset.creneau;
    const type = element.dataset.type;

    const input = document.querySelector(
        `input[name="absences[${etudiantId}][${creneau}]"]`
    );

    if (input) {
        input.value = type;
    }
}