document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("btnYodaSimple");
    const resultat = document.getElementById("resultatYoda");

    const mots = [
        "Sassai", "eaux-de-vie", "cessaient", "acerbité", "eaux", "sceau",
        "tiendra", "hasard", "acéphale", "auxiliairement", "vesce",
        "eurafricaine", "hâtai", "saignant", "entachassent", "alentie",
        "césar", "vieillerie", "messéant", "taillable", "ives", "testacé",
        "dracéna", "ardentes", "ensablant", "blessas", "entachasses", "ioniens",
        "antarctique", "sessiles", "ineffaçables", "quercitrine", "besace",
        "lessivasses", "acerbes", "descellaient", "entachas", "lessive", "gestation",
        "lessivâtes", "antécédentes", "énamourâmes", "antécédent", "entachât", "inefficace", "testacelles",
        "sarabandes", "entachant", "rieur", "itérâmes", "antécédences", "messages",
        "sesquioxydes", "testacés"
    ];

    function normaliser(mot) {
        return mot.toLowerCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "");
    }

    function debut(mot) {
        return normaliser(mot).substring(0, 3);
    }

    function fin(mot) {
        let m = normaliser(mot);
        return m.substring(m.length - 3);
    }

    btn.addEventListener("click", function () {

        let resultats = [];

        for (let i = 0; i < mots.length; i++) {
            for (let j = 0; j < mots.length; j++) {

                if (i !== j && fin(mots[i]) === debut(mots[j])) {
                    resultats.push(`"${mots[i]}" → "${mots[j]}"`);
                }

            }
        }

        if (resultats.length > 0) {
            resultat.innerHTML =
                "<strong>Enchaînements trouvés :</strong><br><br>" +
                resultats.join("<br>");
        } else {
            resultat.innerHTML = "Aucun enchaînement trouvé.";
        }

    });
});