<?php
/*
  ./app/vues/posts/addForm.php
  Variables disponibles:
    - $posts: ARRAY(postID, title, text, quote,categoryID)
    - $categories: ARRAY(ARRAY(id, name))
 */
 ?>
<!-- Post Headline Start -->
<div class="post-title">
    <h1>Add a post Form</h1>
   </div>
   <!-- Post Headline End -->

<!-- Form Start -->
  <form action="posts/add/insert" method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Enter your title here" />
    </div>
    <div class="form-group">
      <label for="text">Text</label>
      <textarea id="text" name="text" class="form-control" rows="5" placeholder="Enter your text here"></textarea>
    </div>
    <div class="form-group">
      <label for="text">Quote</label>
      <textarea id="quote" name="quote" class="form-control" rows="5" placeholder="Enter your quote here"></textarea>
    </div>
    <div class="form-group">
      <label for="text">Category</label>
      <select id="category" name="category_id" class="form-control">
        <option disabled selected>Select your category</option>
          <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
          <?php endforeach; ?>
      </select>
    </div>
    <div>
      <input class="btn btn-primary" type="submit" value="submit" />
      <input class="btn btn-secondary" type="reset" value="reset" />
    </div>
  </form>
<!-- Form End -->
