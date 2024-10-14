<?php
 try {
    include "connect.php";
     $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $password_confirmation=$_POST['password_confirmation'];
     $accept=$_POST["accept"];     
     //şifre 4 karakterden küçükmü kontrol ediyoruz
     if(strlen($password)<4 or strlen($password)>8)
     {
      
      echo "<script>
      alert('Şifreniz en az 4 en fazla 8 karakterden oluşmalıdır!');
      window.location.href='../register.php';
      </script>";
     }
     else
     {
        //şifre ve şifre doğrulama alanları aynımı
        if($password!=$password_confirmation)
        {
            echo "<script>
            alert('Şifre ve şifre tekrar alanları uyuşmuyor');
            window.location.href='../register.php';
            </script>";
        }
        else
        {
 //bu email daha önce kayıt olmuşmu
 $sorgu=$veritabani->query("SELECT * FROM users where email='$email' ",PDO::FETCH_ASSOC);
 if($sorgu->rowCount()>0)
 {
  echo "<script>
  alert('Bu eposta daha önce kullanılmıştır');
  window.location.href='../forget.php';
  </script>";
 }
 else
 {
    //üyeyi kaydet
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $kayit=$veritabani->prepare("INSERT INTO users SET name=?, email=?, password=?");
    $kayit->execute(array($name,$email,$hashpass));
    echo "<script>
    alert('Kayıdınız Tamamlanmıştır E-Posta ve Şifreniz ile giriş yapabilirsiniz');
    window.location.href='../login.php';
    </script>";
 }
        }
     }

    
    
 }
 catch (Exception $e) {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../register.php';
    </script>";    
 }



?>