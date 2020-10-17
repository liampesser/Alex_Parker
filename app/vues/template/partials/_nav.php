<?php
/*
  ./app/vues/template/partials/_nav.php
*/
?>

<a href="BASE_URL_PUBLIC"><img src="assets/images/pic/my-pic.png" alt=""></a>
 <nav id="menu">
   <ul class="menu-link">
       <li><a href="BASE_URL_PUBLIC">My blog</a></li>
    </ul>
 </nav>
 <ul class="menu-link">
   <?php include_once '../app/modeles/categoriesModele.php';
      $categories = \App\Modeles\CategoriesModele\findAll($connexion);
      foreach ($categories as $category) :?>
     <li><a href="BASE_URL_PUBLIC"><?php echo $category['name']; ?></a></li>
   <?php endforeach; ?>
  </ul>
