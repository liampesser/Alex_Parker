<?php
/*
  ./app/vues/template/partials/_main.php
*/
?>

<div id="main">
    <div class="container">
        <div class="row">

            <!-- About Me (Left Sidebar) Start -->
            <div class="col-md-3">
              <?php include '../app/vues/template/partials/_aside.php'; ?>
            </div>
            <!-- About Me (Left Sidebar) End -->

            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
              <div class="col-md-12 page-body">
                <div class="row">
                  <?php echo $content; ?>
                </div>
              </div>
                <?php include '../app/vues/template/partials/_footer.php'; ?>
              </div>
              <!-- Blog Post (Right Sidebar) End -->

        </div>
     </div>
  </div>
