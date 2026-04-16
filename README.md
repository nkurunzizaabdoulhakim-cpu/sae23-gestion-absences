---

## Travail en groupe (GitHub)

Le projet est géré avec GitHub pour permettre le travail collaboratif entre les membres du groupe.

### Organisation

- Le code est partagé via GitHub
- Chaque membre travaille sur son propre PC (localhost)
- La base de données est synchronisée via le fichier :
  `database/sae23.sql`

---

### Règles importantes

Avant de commencer à travailler :

git pull origin main

Après modification :

git add .
git commit -m "description des modifications"
git push

---

### Gestion de la base de données

- Une seule personne modifie la base de données
- Après modification, elle exporte la base via phpMyAdmin
- Le fichier `database/sae23.sql` est mis à jour
- Puis envoyé sur GitHub

Ensuite, chaque membre doit :

1. Faire un `git pull`
2. Importer le fichier `database/sae23.sql` dans phpMyAdmin

---

### Important

- Ne pas modifier les mêmes fichiers en même temps
- Toujours faire un `git pull` avant de commencer
- Vérifier que la base de données est à jour

# SAE23 - Gestion des absences

## Installation

1. Cloner le projet dans :
C:\xampp\htdocs\sae23

2. Démarrer Apache + MySQL (XAMPP)

3. Créer la base :
sae23

4. Importer :
database/sae23.sql

5. Copier :
config/config.example.php → config/config.php

6. Ouvrir :
http://localhost/sae23

---

## Git (équipe)

Avant de travailler :
git pull origin main

Après modification :
git add .
git commit -m "message"
git push
