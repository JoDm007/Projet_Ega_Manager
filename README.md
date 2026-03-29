# Projet_Ega_Manager Fr & ANG

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

============En ANG

Web application in PHP for managing personal expenses, including tracking and visualizing daily spending.

Introduction
1.1 Context
Many students and young adults struggle to track and control their daily expenses. Existing solutions are often too complex or in English, such as YNAB and others. Our Ega_Manager application will allow users to easily track their expenses, set budgets, and visualize their spending habits in just a few clicks.

1.2 Project Objective
To develop a simple and intuitive web application that allows users to record their expenses, categorize them, set a monthly budget, and visualize a clear summary of their financial situation.

1.3 Project Scope

Single-page main application with dashboard
Interface in French, clean and responsive
Single profile: Standard user
No multi-account management or data sharing
Private and secure data per user account
Target Audience
2.1 End Users

Students wishing to track their expenses
Anyone wishing to manage a simple personal budget
2.2 Expected Technical Skills

Basic web navigation
Simple data entry (amount, description, date)
Understanding of basic budgetary concepts
Expected Functionalities
3.1 General Functionalities

Homepage with presentation
Authentication system (registration/login)
Responsive interface (mobile + desktop)
Secure logout
3.2 Expense Management

Add an expense:
Form: amount, date, category, description (optional)
Quick entry (date pre-filled with today's date)
List expenses:
Table with all user's expenses
Sort by date (recent → old)
Filter by category or by month
Modify an expense (correction of amount, category, etc.)
Delete an expense (with confirmation)
3.3 Category Management

Predefined categories: Food, Transportation, Housing, Leisure, Health, Other
Possibility to add a custom category (optional)
Color associated with each category (for graphs)
3.4 Budget Management

Set a monthly budget per category (or overall budget)
Visualize budget status:
Progress bar (expenses / budget)
Display of remaining amount to spend
Visual alert if exceeded (red color)
3.5 Dashboard and Reports

Summary of the current month:
Total spent
Average spending per day
Most spent category
