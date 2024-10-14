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
  <h3 class="mb-3 mt-3 fw-bold text-primary">Oturum Aç</h3>
     <hr>
  
</div>
 <div class="col-md-4 offset-md-4 mt-5 mb-5">
 <form action="php/loginPost.php" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">E-Posta Adresiniz</label>
    <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">E-Posta adresinizi ve şifrenizi kimseyle paylaşmayın!</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Şifreniz</label>
    <input type="password" class="form-control" id="password" name="password" required >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Beni Hatırla</label>
  </div>
  <button type="submit" class="btn btn-primary">Giriş</button>
  <div class="mb-3 mt-3">
    <a class="text-primary pe-3" href="register.php">Üye Ol</a>
    <a class="text-primary pe-3" href="forget.php">Şifremi Unuttum</a>
  </div>
</form>
 </div>
</main>
<?php 
  include "layouts/footer.php";
?>