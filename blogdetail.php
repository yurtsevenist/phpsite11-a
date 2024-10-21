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
   $id=$_GET['id'];
   $blog=$veritabani->prepare("SELECT * FROM blogs WHERE id=?");
   $blog->execute(array($id));
   foreach($blog as $satir)
   {       
      
       $header=$satir["header"]; 
       $content=$satir["content"];
       $imageurl=$satir["imageurl"];
       $hit=$satir["hit"];
       $date=$satir["date"];
       $like=$satir["like"];
       $dislike=$satir["dislike"];
       $author=$satir["author"];
                      
   }
  include "layouts/header.php";
?>
<main class="main">
<?php 
  include "pages/home.php";
?>
<div class="col-md-12 text-center">
  <h1 class="mb-3 fw-bold"><?php echo $header ?></h1>
  <hr>
 
  <div class="col-md-8 offset-md-2 card mb-3 mt-3">
  <img src="<?php echo $imageurl ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title"><?php echo $header ?></h2>  
     <p>
        <?php echo $content ?>
     </p>  
    <p class="card-text"><small class="text-body-secondary"><?php echo $date ?></small></p>
  </div>
</div>
 
</div>
</main>
<?php 
  include "layouts/footer.php";
?>