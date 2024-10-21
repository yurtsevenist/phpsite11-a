<?php
   try {
    include "connect.php";
    $header=$_POST['header'];  
    $content=$_POST['content'];
    if (isset($_FILES['blogimage']))
    {
        $hata = $_FILES['blogimage']['error']; //resim inputundan gönderilen hatayı aldık.
        if ($hata != 0) { // hata kontrolü gerçekleştirdik.
            echo "<script>
            alert('Resim dosyası alınırken bir hata gerçekleşti.');
            window.location.href='../blogcreate.php';
            </script>";
          
        } else {
            $resimBoyutu = $_FILES['blogimage']['size']; // resim boyutunu öğrendik
            if ($resimBoyutu > (1024 * 1024 * 6)) {
                //buradaki işlem aslında bayt, kilobayt ve mb formülüdür.
                //2 rakamını mb olarak görün ve kaç yaparsanız o mb anlamına gelir.
                //Örn: (1024 * 1024 * 3) => 3MB / (1024 * 1024 * 4) => 4MB
                echo "<script>
                alert('Resim 6 MB den büyük olamaz.');
                window.location.href='../blogcreate.php';
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
                    if (move_uploaded_file($_FILES["blogimage"]["tmp_name"], $resimklasor)) {                 
                        $kayit=$veritabani->prepare("INSERT INTO blogs SET header=?, content=?, imageurl=?");
                        $kayit->execute(array($header,$content,$resimyol));
                        echo "<script>
                        alert('Blog kaydı tamamlanmıştır.');
                        window.location.href='../blogcreate.php';
                        </script>";
                        
                    } else 
                    {
                        echo "<script>
                        alert('Resim yüklenirken bir hata meydana geldi');
                        window.location.href='../blogcreate.php';
                        </script>";
                    }
            }
        else 
        {
            echo "<script>
            alert('Resim dosyası uzantısı .png,.jpg,.jpeg, bmp, giff olmalıdır!');
            window.location.href='../blogcreate.php';
            </script>";
        }
        }
    }
}
}catch  (Exception $e) {
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi, Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../blogcreate.php';
    </script>";  
}    
    
    



?>