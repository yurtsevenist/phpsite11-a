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
  include "pages/about.php";
  include "pages/portfolio.php";
  include "pages/services.php";
  include "pages/skills.php";
  include "pages/contact.php";
?>
</main>
<?php 
  include "layouts/footer.php";
?>