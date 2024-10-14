<?php 
   include "php/connect.php";
   $id=1;
   $sorgu=$veritabani->prepare("SELECT * FROM about WHERE id=?");
   $sorgu->execute(array($id));
   foreach($sorgu as $satir)
   {       
       $name=$satir["name"];  
       $content=$satir["content"]; 
       $skills=$satir["skills"];                   
   }
   $blogs=$veritabani->prepare("SELECT * FROM blogs");
   $blogs->execute();
   $bloglar=$blogs->fetchAll(PDO::FETCH_OBJ);
  include "layouts/header.php";
?>
<main class="main">
<?php 
  include "pages/home.php";
?>
<div class="col-md-12 text-center">
  <h1 class="mb-3 fw-bold"> BENİM GÜZEL BLOG YAZILARIM </h1>
  <hr>
  <?php foreach($bloglar as $blog) { ?>
  <div class="col-md-6 offset-md-3 card mb-3 mt-3">
  <img src="<?php echo $blog->imageurl ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title"><?php echo $blog->header ?></h2>    
    <p class="card-text"><small class="text-body-secondary"><?php echo $blog->date ?></small></p>
  </div>
</div>
<?php } ?>  
</div>
</main>
<?php 
  include "layouts/footer.php";
?>