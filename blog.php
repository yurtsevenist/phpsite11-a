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
  include "layouts/header.php";
?>
<main class="main">
<?php 
  include "pages/home.php";
?>
<div class="col-md-12 text-center">
    <h1>BENİM GÜZEL BLOG YAZILARIM</h1>
</div>
</main>
<?php 
  include "layouts/footer.php";
?>