# Projet_Ega_Manager

Application web PhP de gestion des dépenses perso suivie de la visualisation des dépenses quotidiennes


1. Introduction


1.1 Contexte
De nombreux étudiants et jeunes adultes ont des difficultés à suivre et
contrôler leurs dépenses quotidiennes. Les solutions existantes sont souvent
trop complexes ou en anglais comme YNAB et autres. Notre application Ega_Manager permettra à un utilisateur de suivre
facilement ses dépenses, définir des budgets et visualiser ses habitudes
de consommation en quelques clics. 1.2 Objectif du projet
Développer une application web simple et intuitive permettant à un
utilisateur d’enregistrer ses dépenses, de les catégoriser, de définir un budget
mensuel et de visualiser un résumé clair de sa situation financière. 1.3 Portée du projet  Application monopage principale avec tableau de bord
 Interface en français, épurée et responsive
 Un seul profil : Utilisateur standard
 Pas de gestion multi-comptes ou de partage de données
 Données privées et sécurisées par compte utilisateur


2. Public cible
2.1 Utilisateurs finaux
 Étudiants souhaitant suivre leurs dépenses
 Toute personne souhaitant gérer un budget personnel simple
3
2.2 Compétences techniques attendues
 Navigation web basique
 Saisie de données simples (montant, description, date)  Compréhension de notions budgétaires basiques


3. Fonctionnalités attendues
3.1 Fonctionnalités générales
 Page d’accueil avec présentation
 Système d’authentification (inscription/connexion)  Interface responsive (mobile + desktop)  Déconnexion sécurisée
3.2 Gestion des dépenses
 Ajouter une dépense :
o Formulaire : montant, date, catégorie, description (optionnelle)
o Saisie rapide (date pré-remplie avec aujourd’hui)  Lister les dépenses :
o Tableau avec toutes les dépenses de l’utilisateur
o Tri par date (récent → ancien)
o Filtre par catégorie ou par mois
 Modifier une dépense (correction d’un montant, catégorie, etc.)  Supprimer une dépense (avec confirmation)
3.3 Gestion des catégories
 Catégories prédéfinies : Nourriture, Transport, Logement, Loisirs, Santé, Autres
 Possibilité d’ajouter une catégorie personnalisée (optionnel)  Couleur associée à chaque catégorie (pour les graphiques)
3.4 Gestion du budget  Définir un budget mensuel par catégorie (ou budget global)  Visualiser l’état du budget :

o Barre de progression (dépenses / budget)
o Affichage du reste à dépenser  Alerte visuelle si dépassement (couleur rouge)
3.5 Tableau de bord et rapports
 Résumé du mois en cours :
o Total dépensé
o Dépense moyenne par jour
o Catégorie la plus dépensée
 Graphiques simples (optionnel) :
o Camembert : répartition par catégorie
o Barres : dépenses mensuelles