<?php
/*
  ./app/vues/template/index.php
  TEMPLATE PRINCIPAL
  AFFICHE LES ZONES DYNAMIQUES
 */
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../app/vues/template/partials/_head.php'; ?>
  </head>

  <body>
 	 <!-- Preloader Start -->
      <?php include '../app/vues/template/partials/_preloader.php'; ?>
   <!-- Preloader End -->

     <div id="main">
         <div class="container">
             <div class="row">
               <?php include '../app/vues/template/partials/_main.php'; ?>
             </div>
          </div>
       </div>

     <!-- Back to Top Start -->
     <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
     <!-- Back to Top End -->

     <?php include '../app/vues/template/partials/_scripts.php'; ?>

  </body>
</html>
