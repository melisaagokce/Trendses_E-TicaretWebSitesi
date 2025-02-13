<?php
include ("baglanti.php");

if (isset($_POST["kaydet"])) {
  $name = $_POST["kullaniciadi"];
  $email = $_POST["emaill"];
  $password = password_hash($_post["parolaa"], PASSWORD_DEFAULT);
  

  $ekle = "INSERT INTO kullanicilar (kullanici_adi,email,parola) VALUES('$name','$email','$password')";
  $calistirEkle = mysqli_query($baglanti, $ekle);

  if ($calistirEkle) {
    echo '<div class="alert alert-success" role="alert">
      Kayıt başarılı:) .
    </div>';
  } else {
    echo '<div class="alert alert-danger" role="alert">
        Kayıt başarısız:( .
    </div>';
  }
  mysqli_close($baglanti);


}
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KAYDOL</title>
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #FFCDEA;
    }
  </style>
</head>

<body>
  
    
        <form action="kayit.php" method="POST">
          <h2>KAYDOL</h2>
          <div class="outer-box">
            <div class="login-box">
              <h4 class="login-text">Giriş</h4>
              <center>
                <input type="text " name="kullaniciadi" placeholder="Kullanıcı Adı"><br>


                <input type="email" name="emaill" placeholder="email" id=""><br>
                
                <input name="parolaa" placeholder="Şifre"><br>

                <button id="btn-login" name="kaydet">KAYDOL</button>

              </center>
            </div>
          </div>

        </form>
 
    
</body>

</html>