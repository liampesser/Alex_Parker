<?php
/*
  ./app/controleurs/postsControleur.php
*/

namespace App\Controleurs\PostsControleur;
use \App\Modeles\PostsModele;


/**
 * [indexAction description]
 * @param  PDO    $connexion [description]
 * @return [type]            [description]
 */
function indexAction(\PDO $connexion) {
  // Je mets dans $posts la liste des 10 derniers posts que je demande au modèle
  include_once "../app/modeles/postsModele.php";
  $posts = PostsModele\findAll($connexion);

  // Je charge la vue posts/index dans $content
  GLOBAL $title, $content;
  $title = TITRE_LISTE_POSTS;
  ob_start();
    include '../app/vues/posts/index.php';
  $content = ob_get_clean();
}

/**
 * [showAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function showAction(\PDO $connexion, int $id) {
  // Je mets dans $post les infos du post que je demande au modèle
  include_once "../app/modeles/postsModele.php";
  $post = PostsModele\findOneById($connexion, $id);

  // Je mets dans $category le nom de la catégorie du post que je demande au modèle
  include_once "../app/modeles/categoriesModele.php";
  $category = \App\Modeles\CategoriesModele\findOneById($connexion, $post['category_id']);

  // Je charge la vue show dans $content
  GLOBAL $content, $title;
  $title = "Alex Parker - " . $post['title'];
  ob_start();
    include '../app/vues/posts/show.php';
  $content = ob_get_clean();
}
