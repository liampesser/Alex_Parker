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
  $title = TITLE_LIST_POSTS;
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



/**
 * [addFormAction description]
 * @param PDO $connexion [description]
 */
function addFormAction(\PDO $connexion) {
  // Je vais chercher les catégories
  include_once '../app/modeles/categoriesModele.php';
  $categories = \App\Modeles\CategoriesModele\findAll($connexion);

  // Je charge la vue addForm dans $content
  GLOBAL $content, $title;
  $title = TITLE_POST_ADDFORM;
  ob_start();
    include '../app/vues/posts/addForm.php';
    $content = ob_get_clean();
}



/**
 * [addInsertAction description]
 * @param PDO   $connexion [description]
 * @param array $data      [description]
 */
function addInsertAction(\PDO $connexion, array $data) {
  // Je demande au modèle d'ajouter le post
    include_once '../app/modeles/postsModele.php';
    $id = PostsModele\insertOne($connexion, $data);

  // Je redirige vers la liste des posts
    header('location:' . BASE_URL_PUBLIC . 'posts');
}


function deleteAction(\PDO $connexion, int $id) {
  // Je demande au modèle de supprimer le post
    include_once '../app/modeles/postsModele.php';
    $return = PostsModele\deleteOneById($connexion, $id);

  // Je redirige vers la liste des posts
    header('location:' . BASE_URL_PUBLIC . 'posts');
}



/**
 * [editFormAction description]
 * @param  PDO    $connexion [description]
 * @param  int    $id        [description]
 * @return [type]            [description]
 */
function editFormAction(\PDO $connexion, int $id) {
  // Je vais chercher les catégories
  include_once '../app/modeles/categoriesModele.php';
  $categories = \App\Modeles\CategoriesModele\findAll($connexion);

  // Je demande au modèle d'afficher le post à afficher dans le formulaire
  include_once '../app/modeles/postsModele.php';
  $post = \App\Modeles\PostsModele\findOneById($connexion, $id);

  // Je charge la vue addForm dans $content
  GLOBAL $content, $title;
  $title = TITLE_POST_EDITFORM;
  ob_start();
    include '../app/vues/posts/editForm.php';
    $content = ob_get_clean();
}



/**
 * [editUpdateAction description]
 * @param  PDO    $connexion [description]
 * @param  array  $data      [description]
 * @return [type]            [description]
 */
function editUpdateAction(\PDO $connexion, array $data) {
  // Je demande au modèle de modifier le post
  include_once '../app/modeles/postsModele.php';
  $return1 = PostsModele\updateOneById($connexion, $data);

  // Je demande au modèle d'ajouter les catégories correspondantes
  foreach ($_POST['categories'] as $categorieID) {
    $return2 = PostsModele\insertCategorieById($connexion, [
      'postID' => $id,
      'categorieID' => $categorieID
    ]);
  }

  // Je redirige vers la liste des posts
    header('location:' . BASE_URL_PUBLIC . 'posts');
}
