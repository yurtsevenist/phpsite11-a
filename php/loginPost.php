<?php
    try {
        include "connect.php";
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sorgu=$veritabani->query("SELECT * FROM users where email='$email'",PDO::FETCH_ASSOC);
        if($sorgu->rowCount()==0)
        {
            echo "<script>
            alert('E-Posta adresiniz sistemde kayıtılı değil');
            window.location.href='../register.php';
            </script>";
        }
        else
        {
            foreach($sorgu as $sor)
            {
                $id=$sor["id"];
                $name=$sor["name"];
                $pass=$sor["password"];
                $email=$sor["email"];
                $imageurl=$sor["imageurl"];
                $who=$sor["who"];
                $date=$sor["date"];
            }
            if (password_verify($password, $pass))
            {
                session_start();
                $_SESSION["id"]=$id;
                $_SESSION["name"]=$name;
                $_SESSION["email"]=$email;
                $_SESSION["who"]=$who;
                $_SESSION["date"]=$date;
                $_SESSION["imageurl"]=$imageurl;
                $_SESSION["access_key"]="abcd1234";    
                echo "<script>
                alert('Hoşgeldiniz');
                window.location.href='../dashboard.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Şifreniz Hatalı');
                window.location.href='../login.php';
                </script>";
            }
        }
    
    } catch  (Exception $e) {
        echo "<script>
        alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
        window.location.href='../login.php';
        </script>";    
    }


?>