<?php
/*
  ./app/routeurs.postsRouteurs.php
 */

include '../app/controleurs/postsControleur.php';
use \App\Controleurs\PostsControleur;

switch ($_GET['posts']):
  case 'addForm':
    // AJOUT POST: FORMULAIRE
    // PATTERN: index.php?posts=addForm
    // CTRL: postsControleur
    // ACTION: addForm
      PostsControleur\addFormAction($connexion);
      break;
      case 'addInsert':
      // AJOUT POST: INSERT
      // PATTERN: index.php?posts=addInsert
      // CTRL: postsControleur
      // ACTION: addInsert
        PostsControleur\addInsertAction($connexion, [
          'title'       => $_POST['title'],
          'text'        => $_POST['text'],
          'quote'       => $_POST['quote'],
          'category_id' => $_POST['category_id']
        ]);
        break;

endswitch;
