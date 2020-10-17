<?php
/*
  ./app/vues/posts/index.php
  Variables disponibles :
    -$posts: ARRAY(ARRAY(id, title, text, created_at, quote, category_id))
 */
 ?>

 <!-- ADD A POST -->
 <div>
   <a href="form.html" type="button" class="btn btn-primary">Add a Post</a>
 </div>
 <!-- ADD A POST END -->

 <!-- Blog Post Start -->

   <div class="col-md-12 blog-post">
     <?php
        foreach ($posts as $post):
        $created_at = strtotime($post['created_at']);
       ?>
         <div class="post-title">
           <a href="posts/<?php echo $post['id']; ?>/<?php echo Noyau\Fonctions\slugify($post['title']); ?>">
             <h1><?php echo $post['title']; ?></h1>
           </a>
         </div>
         <div class="post-info">
           <span><?php echo Noyau\Fonctions\formater_date($post['created_at'], 'Y-m-d'); ?></span> |
           <span>Life style</span>
         </div>
         <p><?php echo $post['text']; ?></p>
         <a href="posts/<?php echo $post['id']; ?>/<?php echo Noyau\Fonctions\slugify($post['title']); ?>" class="button button-style button-anim fa fa-long-arrow-right">
           <span>Read More</span>
         </a>
    <?php endforeach; ?>
  </div>


<!-- Blog Post End -->
