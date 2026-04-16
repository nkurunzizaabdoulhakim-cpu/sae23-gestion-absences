const btnMessage = document.getElementById("btnMessage");
const messageCache = document.getElementById("messageCache");

btnMessage.addEventListener("click", function () {
    if (messageCache.style.display === "none") {
        messageCache.style.display = "block";
    } else {
        messageCache.style.display = "none";
    }
});

const tacheInput = document.getElementById("tacheInput");
const btnAjouter = document.getElementById("btnAjouter");
const listeTaches = document.getElementById("listeTaches");
const erreurTache = document.getElementById("erreurTache");

btnAjouter.addEventListener("click", function () {
    const texte = tacheInput.value.trim();

    if (texte === "") {
        erreurTache.textContent = "Veuillez saisir une tâche.";
        return;
    }

    erreurTache.textContent = "";

    const li = document.createElement("li");
    li.className = "item-tache";

    const span = document.createElement("span");
    span.textContent = texte;

    span.addEventListener("click", function () {
        span.classList.toggle("terminee");
    });

    const btnSupprimer = document.createElement("button");
    btnSupprimer.textContent = "Supprimer";
    btnSupprimer.className = "btn-delete";

    btnSupprimer.addEventListener("click", function () {
        li.remove();
    });

    li.appendChild(span);
    li.appendChild(btnSupprimer);
    listeTaches.appendChild(li);

    tacheInput.value = "";
});

const filtreTache = document.getElementById("filtreTache");

filtreTache.addEventListener("input", function () {
    const valeur = filtreTache.value.toLowerCase();
    const items = document.querySelectorAll("#listeTaches li");

    items.forEach(function (item) {
        const texte = item.querySelector("span").textContent.toLowerCase();

        if (texte.includes(valeur)) {
            item.style.display = "flex";
        } else {
            item.style.display = "none";
        }
    });
});