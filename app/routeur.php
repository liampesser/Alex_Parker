<?php
/*
  ./app/routeur.php
  ROUTEUR PRINCIPAL
  HYDRATE LES ZONES DYNAMIQUES
 */


 // ROUTE DES SINGLE POSTS
 if (isset($_GET['postID'])):
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\showAction($connexion, $_GET['postID']);
    
 // ROUTE PAR DEFAUT: liste des posts
 // PATTERN: /
 // CTRL: postsControleur
 // ACTION: index
  else:
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\indexAction($connexion);
  endif;
