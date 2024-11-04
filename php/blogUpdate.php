<?php
   try {
    include "connect.php";
    $header=$_POST['header'];  
    $content=$_POST['content'];
    $author=$_POST['author'];
    $id=$_POST['id'];

    if ($_FILES['blogimage']['name']!=null) 
    {
        //eğer blog resmi güncellenecek ise buradaki kodlar işletilir
        $hata = $_FILES['blogimage']['error']; //resim inputundan gönderilen hatayı aldık.
        if ($hata != 0) { // hata kontrolü gerçekleştirdik.
            echo "<script>
            alert('Resim dosyası alınırken bir hata gerçekleşti.');
            window.location.href='../myblogs';
            </script>";
          
        } else {
            $resimBoyutu = $_FILES['blogimage']['size']; // resim boyutunu öğrendik
            if ($resimBoyutu > (1024 * 1024 * 6)) {
                //buradaki işlem aslında bayt, kilobayt ve mb formülüdür.
                //2 rakamını mb olarak görün ve kaç yaparsanız o mb anlamına gelir.
                //Örn: (1024 * 1024 * 3) => 3MB / (1024 * 1024 * 4) => 4MB
                echo "<script>
                alert('Resim 6 MB den büyük olamaz.');
                window.location.href='../myblogs';
                </script>";
              
            } else {
                $tip = $_FILES['blogimage']['type']; //resim tipini öğrendik.
                $resimAdi = $_FILES['blogimage']['name']; //resmin adını öğrendik.                                    
                $uzantisi = explode('.', $resimAdi); // uzantısını öğrenmek için . işaretinden parçaladık.
                $uzantisi = $uzantisi[count($uzantisi) - 1]; // ve daha sonra 1 den fazla nokta olma ihtimaline karşı en son noktadan sonrasını al dedik.
                $imagename=time() . "." . $uzantisi;
                $resimklasor = "../blog_images/" .$imagename; // resime yeni isim vereceğimiz için zamana göre yeni bir isim oluşturduk ve yüklemesi gerektiği yeride belirttik.
                $resimyol = "blog_images/" . $imagename; // resime yeni isim vereceğimiz için zamana göre yeni bir isim oluşturduk ve yüklemesi gerektiği yeride belirttik.
                if ($tip == 'image/jpeg' || $tip == 'image/png' || $tip=='image/bmp' || $tip=='image/gif' ) { //uzantısnın kontrolünü sağladık. sadece .jpg ve .png yükleyebilmesi için.
                $sorgu=$veritabani->query("SELECT * FROM blogs where id='$id' ",PDO::FETCH_ASSOC);
                    if($sorgu->rowCount()>0)
                    {
                        foreach($sorgu as $sor)
                        {           
                            
                            $eskiurl=$sor["imageurl"];//resim yolu
                                    
                        }
                    }
                    $eskiresim="../".$eskiurl;
                    if (move_uploaded_file($_FILES["blogimage"]["tmp_name"], $resimklasor)) { 
                        unlink($eskiresim);
                        $kayit=$veritabani->prepare("UPDATE blogs SET header=?, content=?,author=?, imageurl=? WHERE id = ?");
                        $kayit->execute(array($header,$content,$author,$resimyol,$id));
                        echo "<script>
                        alert('Blog kaydı güncellenmiştir.');
                        window.location.href='../myblogs';
                        </script>";
                        
                    } else 
                    {
                        echo "<script>
                        alert('Resim yüklenirken bir hata meydana geldi');
                        window.location.href='../myblogs';
                        </script>";
                    }
            }
        else 
        {
            echo "<script>
            alert('Resim dosyası uzantısı .png,.jpg,.jpeg, bmp, giff olmalıdır!');
            window.location.href='../myblogs';
            </script>";
        }
        }
    }
    
}
        else
        {
            //eğer blog resmi değişmeyecek ise buradaki kodlar işletilir
            $kayit=$veritabani->prepare("UPDATE blogs SET header=?, content=?,author=? WHERE id = ?");
                                $kayit->execute(array($header,$content,$author,$id));
                                echo "<script>
                                alert('Blog kaydı tgüncellemiştir.');
                                window.location.href='../myblogs';
                                </script>";
        }
}catch  (Exception $e) {
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi, Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../myblogs';
    </script>";  
}    
    
    



?>