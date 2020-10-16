<?php
/*
  ./noyau/init.php
  CHARGE LES ZONES DYNAMIQUES ET SE CONNECTE A LA BASE DE DONNEES
 */
session_start(); // en cas d'utilisation de variables de session

 require_once '../app/config/parametres.php';
 require_once '../noyau/connexion.php';
 require_once '../noyau/constantes.php';
 require_once '../noyau/fonctions.php';
