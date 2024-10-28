<?php
 try{
    include "connect.php";
    $id=$_POST['mid'];

    $kayit=$veritabani->prepare('DELETE FROM blogs WHERE id = ?');
    $kayit->execute(array($id));

    echo "<script>
    alert('Mesaj Silinmiştir');
    window.location.href='../myblogs.php';
    </script>";
   

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../myblogs.php';
    </script>"; 
 }

?>