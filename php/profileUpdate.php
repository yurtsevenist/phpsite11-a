<?php
   try {
    include "connect.php";
   $name=$_POST['name'];
   $id=$_POST['id'];
   $email=$_POST['email'];
   $oldpassword=$_POST["old_password"];
   $password=$_POST['password'];
   $password_confirmation=$_POST['password_confirmation']; 
   $sorgu=$veritabani->query("SELECT * FROM users where id='$id' ",PDO::FETCH_ASSOC);
   if($sorgu->rowCount()>0)
   {
    foreach($sorgu as $sor)
    {           
        $id=$sor["id"];
        $name=$sor["name"];
        $pass=$sor["password"];
        $emailu=$sor["email"];
        $imageurl=$sor["imageurl"];
        $who=$sor["who"];          
    }
    if (!password_verify($oldpassword, $pass))
        {
            echo "<script>
            alert('Eski şifrenizi yanlış girdiniz!');
            window.location.href='../profile.php';
            </script>";
        }
        else
        {
            if(strlen($password)<4 or strlen($password)>8 )
            {
             
                echo "<script>
                alert('Şifreniz en az 4 en fazla 8  Karakterden oluşmak zorundadır!');
                window.location.href='../profile.php';
                </script>";
            }
            else
            {
                 //şifre ve şifre doğrulama alanları aynımı
                if($password!=$password_confirmation)
                {
                    echo "<script>
                    alert('Şifre ve şifre tekrar alanları uyuşmuyor');
                    window.location.href='../profile.php';
                    </script>";
                }
                else
                {
                    if($emailu!=$email)
                    {
                        echo "<script>
                        alert('E-Posta adresi değiştirilemez');
                        window.location.href='../profile.php';
                        </script>"; 
                    }
                    else
                    {
                        if (password_verify($password, $pass))
                        {
                            echo "<script>
                            alert('Şifreniz bir önceki şifrenizden farklı olmalıdır');
                            window.location.href='../profile.php';
                            </script>";
                        }
                        else
                        {
                            
                            if ($_FILES['imageurl']['name']!=null) 
                            {
                                //resim yüklenecek ise
                                $hata = $_FILES['resim']['error']; //resim inputundan gönderilen hatayı aldık.
                            if ($hata != 0) { // hata kontrolü gerçekleştirdik.
                                echo "<script>
                                alert('Profil resim dosyası alınırken bir hata gerçekleşti.');
                                window.location.href='../profile.php';
                                </script>";
                              
                            } else {
                                $resimBoyutu = $_FILES['imageurl']['size']; // resim boyutunu öğrendik
                                if ($resimBoyutu > (1024 * 1024 * 2)) {
                                    //buradaki işlem aslında bayt, kilobayt ve mb formülüdür.
                                    //2 rakamını mb olarak görün ve kaç yaparsanız o mb anlamına gelir.
                                    //Örn: (1024 * 1024 * 3) => 3MB / (1024 * 1024 * 4) => 4MB
                                    echo "<script>
                                    alert('Resim 2 MB den büyük olamaz.');
                                    window.location.href='../profile.php';
                                    </script>";
                                  
                                } else {
                                    $tip = $_FILES['imageurl']['type']; //resim tipini öğrendik.
                                    $resimAdi = $_FILES['imageurl']['name']; //resmin adını öğrendik.                                    
                                    $uzantisi = explode('.', $resimAdi); // uzantısını öğrenmek için . işaretinden parçaladık.
                                    $uzantisi = $uzantisi[count($uzantisi) - 1]; // ve daha sonra 1 den fazla nokta olma ihtimaline karşı en son noktadan sonrasını al dedik.
                                    $resimklasor = "../profile_images/" . time() . "." . $uzantisi; // resime yeni isim vereceğimiz için zamana göre yeni bir isim oluşturduk ve yüklemesi gerektiği yeride belirttik.
                                    $resimyol = "profile_images/" . time() . "." . $uzantisi; // resime yeni isim vereceğimiz için zamana göre yeni bir isim oluşturduk ve yüklemesi gerektiği yeride belirttik.
                                    $eskiresim="../".$imageurl;
                                    //yuklenecek_yer/resim_adi.uzantisi
                        
                                    if ($tip == 'image/jpeg' || $tip == 'image/png' || $tip=='image/bmp' || $tip=='image/gif' ) { //uzantısnın kontrolünü sağladık. sadece .jpg ve .png yükleyebilmesi için.
                                        if (move_uploaded_file($_FILES["imageurl"]["tmp_name"], $resimklasor)) {
                                            unlink($eskiresim);
                                            $hashpass = password_hash($password, PASSWORD_DEFAULT);
                                            $kayit=$veritabani->prepare('UPDATE users SET password = ?,name=?,imageurl = ? WHERE id = ?');
                                            $kayit->execute(array($hashpass,$name,$resimyol,$id));
                                             echo "<script>
                                            alert('Bilgileriniz Güncellendi');
                                            window.location.href='../profile.php';
                                            </script>";
                                        } else 
                                        {
                                            echo "<script>
                                            alert('Profil resmi yüklenirken bir hata meydana geldi');
                                            window.location.href='../profile.php';
                                            </script>";
                                        }
                                    } else 
                                    {
                                        echo "<script>
                                        alert('Resim dosyası uzantısı .png,.jpg,.jpeg olmalıdır!');
                                        window.location.href='../profile.php';
                                        </script>";
                                    }
                                }
                            }

                            }
                            else
                            {
                                //resim yüklenmeyecek ise
                                $hashpass = password_hash($password, PASSWORD_DEFAULT);
                                $kayit=$veritabani->prepare('UPDATE users SET password = ?,name=? WHERE id = ?');
                                $kayit->execute(array($hashpass,$name,$email));
                                $sorgu=$veritabani->query("SELECT * FROM users where id='$id' ",PDO::FETCH_ASSOC);
                                echo "<script>
                                alert('Bilgileriniz Güncellendi');
                                window.location.href='../profile.php';
                                </script>";
                            }

                            
                        }
                    }
                }
            }
        }  
   }
   else
   {
      echo "<script>
      alert('Kullanıcı bulunamadı');
      window.location.href='../profile.php';
      </script>";
   }
}catch  (Exception $e) {
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi, Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../profile.php';
    </script>";  
}
?>