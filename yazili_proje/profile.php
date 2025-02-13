<?php
session_start();
if (isset($_SESSION["email"])) {
    echo "HOSGELDİN";
    echo "<a href='cikis.php' style ='color:red; background-color:yellow,border:1px solid red;paddin:5px 5px;'> ÇIKIŞ YAP</a>";
}
else{
    echo"Bu Sayfayı Görüntüleyemezsiniz";
}