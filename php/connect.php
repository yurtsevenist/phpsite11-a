<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
  $veritabani = new PDO("mysql:host=$servername;dbname=myportfolyo;charset=utf8", $username, $password);
  $veritabani->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
    echo "<script>
    alert('Veri Tabanı Bağlantı Hatası');
    window.location.href='index.php';
    </script>"; 
}
?>