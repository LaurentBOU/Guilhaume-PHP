<?php
session_start();

// Si l'utilisateur n'est pas connecté, il n'a pas accès à cette fonctionnalité et est redirigé
if (empty($_SESSION['user'])) {
    header('location: connexion.php');
}

// session_destroy() détruit toutes les sessions existante
session_destroy();

// Puis je redirige vers connexion.php
header('location: connexion.php');


// Si il n'y a que du php sur une page, nous ne sommes pas obligés de fermer la balise <?php 
