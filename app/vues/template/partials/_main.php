<?php
/*
  ./app/vues/template/partials/_main.php
*/
?>

<!-- About Me (Left Sidebar) Start -->
<div class="col-md-3">
  <div class="about-fixed">
    <?php include '../app/vues/template/partials/_aside.php'; ?>
  </div>
</div>
<!-- About Me (Left Sidebar) End -->

<!-- Blog Post (Right Sidebar) Start -->
<div class="col-md-9">
  <div class="col-md-12 page-body">
    <div class="row">
      <div class="col-md-12 content-page">
        <?php echo $content; ?>
      </div>
    </div>
  </div>

  <!-- Footer Start -->
    <?php include '../app/vues/template/partials/_footer.php'; ?>
  <!-- Footer End -->

 </div>
 <!-- Blog Post (Right Sidebar) End -->
