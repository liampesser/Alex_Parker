<?php
/*
  ./app/vues/posts/index.php
  Variables disponibles :
    -$posts: ARRAY(ARRAY(id, title, text, created_at, quote, category_id, categoryName))
 */
 ?>

 <!-- ADD A POST -->
 <div>
   <a href="posts/add/form" type="button" class="btn btn-primary">Add a Post</a>
 </div>
 <!-- ADD A POST END -->

 <!-- Blog Post Start -->

   <div class="col-md-12 blog-post">
     <?php
        foreach ($posts as $post):
       ?>
         <div class="post-title">
           <a href="<?php echo BASE_URL_PUBLIC ?>posts/<?php echo $post['postID']; ?>/<?php echo Noyau\Fonctions\slugify($post['title']); ?>">
             <h1><?php echo $post['title']; ?></h1>
           </a>
         </div>
         <div class="post-info">
           <span><?php echo Noyau\Fonctions\formater_date($post['postCreatedAt'], 'Y-m-d'); ?></span> |
           <span><?php echo $post['categoryName']; ?></span>
         </div>
         <p><?php echo Noyau\Fonctions\tronquer($post['text'], 150); ?>...</p>
         <a href="<?php echo BASE_URL_PUBLIC ?>posts/<?php echo $post['postID']; ?>/<?php echo Noyau\Fonctions\slugify($post['title']); ?>" class="button button-style button-anim fa fa-long-arrow-right">
           <span>Read More</span>
         </a>
    <?php endforeach; ?>
  </div>


<!-- Blog Post End -->
