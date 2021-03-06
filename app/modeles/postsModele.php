<?php
/*
  .app/modeles/postsModele.php
*/

namespace App\Modeles\PostsModele;

/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */
 function findAll(\PDO $connexion) :array {
   $sql = "SELECT *, p.id AS postID, p.created_at AS postCreatedAt, c.name AS categoryName
           FROM posts p
           JOIN categories c ON p.category_id = c.id
           ORDER BY postCreatedAt DESC
           LIMIT 10;";
   $rs = $connexion->query($sql);
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
 }



/**
 * [findOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */
function findOneById(\PDO $connexion, int $id) :array {
  $sql = "SELECT *
          FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}



/**
 * [insertOne description]
 * @param  PDO   $connexion [description]
 * @param  array $data      [description]
 * @return int              [description]
 */
function insertOne(\PDO $connexion, array $data) :int {
  $sql = "INSERT INTO posts
          SET title   = :title,
              text    = :text,
              quote   = :quote,
              category_id = :category_id,
              created_at  = NOW();";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':title', $data['title'], \PDO::PARAM_STR);
  $rs->bindValue(':text', $data['text'], \PDO::PARAM_STR);
  $rs->bindValue(':quote', $data['quote'], \PDO::PARAM_STR);
  $rs->bindValue(':category_id', $data['category_id'], \PDO::PARAM_INT);
  $rs->execute();
  return $connexion->lastInsertId();
}



/**
 * [deleteOneById description]
 * @param  PDO  $connexion [description]
 * @param  int  $id        [description]
 * @return bool            [description]
 */
function deleteOneById(\PDO $connexion, int $id) :bool {
  $sql = "DELETE FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  return intval($rs->execute());
}



/**
 * [updateOneById description]
 * @param  PDO  $connexion [description]
 * @param  int  $id        [description]
 * @return bool            [description]
 */
function updateOneById(\PDO $connexion, array $data) :bool {
  $sql = "UPDATE posts
          SET title   = :title,
              text    = :text,
              quote   = :quote,
              category_id = :category_id
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
  $rs->bindValue(':title', $data['title'], \PDO::PARAM_STR);
  $rs->bindValue(':text', $data['text'], \PDO::PARAM_STR);
  $rs->bindValue(':quote', $data['quote'], \PDO::PARAM_STR);
  $rs->bindValue(':category_id', $data['category_id'], \PDO::PARAM_INT);
  return intval($rs->execute());
}
