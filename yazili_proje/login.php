<?php
include ("baglanti.php");
if (isset($_POST["giris"])) {
    
    $email = $_POST["email"];
    
    $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);


    if (isset($email) && isset($parola)) {

        $secim = " SELECT *  FROM kullanicilar WHERE email= '$email'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);
       if ($kayitsayisi > 0) {

            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashlisifre= $ilgilikayit["parola"];
           

            if ((password_verify($password,$hashlisifre)) ) {

                session_start();

                $_SESSION["email"] = $ilgilikayit["email"];
                $_SESSION["parola"] = $ilgilikayit["parola"];
                header("location:trendses.html");
            } 
            else 
                {

                 echo '<div class="alert alert-danger" role="alert">
                  HATALI PAROLA:( .
                 </div>';
            
                } 
            }
        else 
           {
            echo '<div class="alert alert-danger" role="alert">
             EMAİL KAYITLI DEGİL.
             </div>';
            }

        

        

          
        mysqli_close($baglanti);
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÜYE GİRİŞİ</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #FFCDEA;
        }
    </style>
</head>

<body>
    <form action="login.php" method="POST">
        <h2>GİRİŞ YAP</h2>
        <div class="outer-box">
            <div class="login-box">

                <center>
                    <h4 class="login-text">Giriş</h4>
                    <input type="email" name="email" placeholder="email" id=""><br>
                    <input name="parola" placeholder="Şifre"><br>

                    <button id="btn-login" name="giris">GİRİŞ YAP</button>

                </center>
            </div>
        </div>

    </form>
</body>

</html>