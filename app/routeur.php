<?php
/*
  ./app/routeur.php
  ROUTEUR PRINCIPAL
  HYDRATE LES ZONES DYNAMIQUES
 */

 if (isset($_GET['posts'])):
   include_once '../app/routeurs/postsRouteur.php';

 // ROUTE DES SINGLE POSTS
 elseif (isset($_GET['postID'])):
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
