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
  <h3 class="mb-3 mt-3 fw-bold text-primary">Şifremi Unuttum</h3>
     <hr>
  
</div>
 <div class="col-md-4 offset-md-4 mt-5 mb-5">
 <form action="php/loginPost.php" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">E-Posta Adresiniz</label>
    <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp">
    
  </div>
   <button type="submit" class="btn btn-primary">Gönder</button>
  <div class="mb-3 mt-3">
   <a class="text-primary pe-3" href="login.php">Giriş Sayfası</a>
    <a class="text-primary pe-3" href="register.php">Üye Ol</a>
   
  </div>
</form>
 </div>
</main>
<?php 
  include "layouts/footer.php";
?>