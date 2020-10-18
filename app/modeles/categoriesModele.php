<?php
/*
  .app/modeles/postsModele.php
*/

namespace App\Modeles\CategoriesModele;

/**
 * [findOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */
function findOneById(\PDO $connexion, int $id) :array {
  $sql = "SELECT *
          FROM categories
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}



/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
function findAll(\PDO $connexion) :array {
  $sql = "SELECT *
          FROM categories
          ORDER BY name ASC;";
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}



/**
 * [findAllAndCountById description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
function findAllAndCountById(\PDO $connexion) :array {
  $sql = "SELECT *, c.id, c.name, COUNT(c.id) AS nombrePosts
          FROM categories c
          JOIN posts p ON c.id = p.category_id
          GROUP BY p.category_id
          ORDER BY name ASC;";
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
