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

# SAE23 - Gestion des absences

## 📥 Installation du projet

### 1. Récupérer le projet
Dans le terminal :

git clone https://github.com/nkurunzizaabdoulhakim-cpu/sae23-gestion-absences.git sae23

Puis :

cd sae23

---

### 2. Placer le projet
Le dossier doit être dans :

C:\xampp\htdocs\sae23

---

### 3. Lancer le serveur
Ouvrir XAMPP :
- démarrer Apache
- démarrer MySQL

---

### 4. Installer la base de données
1. Aller sur : http://localhost/phpmyadmin
2. Créer une base : sae23
3. Cliquer sur "Importer"
4. Sélectionner : database/sae23.sql
5. Exécuter

---

### 5. Configurer la connexion
Vérifier dans :

php/config.php ou php/connexion_bd.php

Paramètres :

host = 127.0.0.1  
dbname = sae23  
user = root  
password = (vide)

---

### 6. Lancer le site
Dans le navigateur :

http://localhost/sae23

---

## 🔐 Comptes de test

Enseignant :
admin / admin

Étudiant :
dupont / 1234

---

## 🔄 Travail en équipe (Git)

### Avant de travailler
git pull origin main

### Après modification
git add .
git commit -m "modification"
git push

---

## 💾 Base de données

Si modification :

1. Exporter la base via phpMyAdmin
2. Remplacer : database/sae23.sql

Puis :

git add database/sae23.sql
git commit -m "mise a jour base"
git push

---

## ⚠️ Important

- Toujours faire `git pull` avant de coder
- Ne pas modifier les mêmes fichiers en même temps
- Importer la base après chaque mise à jour
