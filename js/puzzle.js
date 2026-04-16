let cases = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, ""];
let coups = 0;

function afficherGrille() {
    const grille = document.getElementById("grille");
    grille.innerHTML = "";

    cases.forEach(function (valeur, index) {
        const bouton = document.createElement("button");
        bouton.className = "case-puzzle";

        if (valeur === "") {
            bouton.classList.add("vide");
            bouton.textContent = "";
        } else {
            bouton.textContent = valeur;
            bouton.addEventListener("click", function () {
                deplacerCase(index);
            });
        }

        grille.appendChild(bouton);
    });

    document.getElementById("compteur").textContent = coups;
}

function deplacerCase(index) {
    const indexVide = cases.indexOf("");
    const ligneCase = Math.floor(index / 4);
    const colCase = index % 4;
    const ligneVide = Math.floor(indexVide / 4);
    const colVide = indexVide % 4;

    const mouvementValide =
        (ligneCase === ligneVide && Math.abs(colCase - colVide) === 1) ||
        (colCase === colVide && Math.abs(ligneCase - ligneVide) === 1);

    if (mouvementValide) {
        [cases[index], cases[indexVide]] = [cases[indexVide], cases[index]];
        coups++;
        afficherGrille();
        verifierVictoire();
    }
}

function trouverVoisins(indexVide) {
    let voisins = [];
    const ligne = Math.floor(indexVide / 4);
    const col = indexVide % 4;

    if (ligne > 0) voisins.push(indexVide - 4);
    if (ligne < 3) voisins.push(indexVide + 4);
    if (col > 0) voisins.push(indexVide - 1);
    if (col < 3) voisins.push(indexVide + 1);

    return voisins;
}

function melanger() {
    for (let i = 0; i < 100; i++) {
        const indexVide = cases.indexOf("");
        const voisins = trouverVoisins(indexVide);
        const choix = voisins[Math.floor(Math.random() * voisins.length)];
        [cases[indexVide], cases[choix]] = [cases[choix], cases[indexVide]];
    }

    coups = 0;
    afficherGrille();
}

function verifierVictoire() {
    const solution = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, ""];
    let gagne = true;

    for (let i = 0; i < cases.length; i++) {
        if (cases[i] !== solution[i]) {
            gagne = false;
            break;
        }
    }

    if (gagne) {
        alert("Bravo, puzzle terminé !");
    }
}

afficherGrille();