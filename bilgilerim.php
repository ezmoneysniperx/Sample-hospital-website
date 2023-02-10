

<!DOCTYPE html>
<html>
<html lang="en">

<?php
    include "config.php";
    if(isset($_POST['degistir'])){
        $email = mysqli_real_escape_string($con,$_POST['eposta']);
        $tel = mysqli_real_escape_string($con,$_POST['telefon']);
        $dt = mysqli_real_escape_string($con,$_POST['dogumtarihi']);

        $sql1 = "UPDATE userinfo SET eposta='".$email."', tel='".$tel."', dogumtarih='".$dt."' WHERE eposta='".$_SESSION['email']."' ";
        $result = mysqli_query($con,$sql1);

        if ($result){
            echo '<script type="text/javascript">'; 
            echo 'alert("Bilgi Güncelleme İşlemi Tamamlandı !");'; 
            echo '</script>';
        }
        else {
            echo '<script type="text/javascript">'; 
            echo 'alert("Hata Oluştu !");'; 
            echo '</script>';
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Özel Hastanesi - Bilgilerim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <link rel=”icon” href=”img/ozelhastanesilogo.png”>
</head>

<body>
    <div class="jumbotron mb-0">
        <a href="anasayfa.html"><img src="img/logo.png" alt=""></a>
    
    </div>
    <nav class="navbar navbar-expand-sm ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="anasayfa.php">ANASAYFA<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="makalelistesi.html">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="randevuform.php" target="_blank">RANDEVU YAP</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary  my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav><br>
    
    <div class="clearfix">
  <div class="column menu">
    <ul>
      <a class="letter" href="bilgilerim.php"><li><img src="img/profile.png" weight="40px" height="40px"> Bilgilerim</li></a>
      <li><a class="letter" href="oncekirandevularim.php"><img src="img/appointment.png" weight="40px" height="40px">Randevularım</a></li>
      <li><a class="letter" href="Mesajlarim.html"><img src="img/message.png" weight="40px" height="40px"> Mesajlarım</a></li>
      <li><a class="letter" href="ayarlar.html"><img src="img/clipart494368.png" weight="40px" height="40px"> Ayarlar</a></li>
      <li></li>
      <li></li>
    </ul>
  </div>

  <div>
    <a href="#"><img src="img/profile.png" weight="100px" height="100px"></a>
    <h1>Bilgilerim</h1>
    <div class="column2 menu2">

    <?php 
    $sql = "SELECT * FROM userinfo WHERE eposta = '".$_SESSION['email']."'";
    $result = $con->query($sql);
    $row=$result->fetch_row();
    ?>
   <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <ul>
        <div class="profile">Ad Soyad</div><li><input type=”text” name=”adsoyad” value="<?=$row[0]; ?>" disabled></li>
        <div class="profile">Cinsiyet</div><li>
            <select name="cinsiyet" required disabled>
            <option><?=$row[3];?></option>
            </select></li>
        <div class="profile">Doğum Tarihi</div><li><input type=”date” name="dogumtarihi" value="<?=$row[5]; ?>"></li>
        <div class="profile">E-Posta</div><li><input type=”text” name="eposta" value="<?=$row[1]; ?>"></li>
        <div class="profile">Telefon Numarası</div><li><input type="text" name="telefon" value="<?=$row[4]; ?>"></li>
    
    </ul>

    <br>
     <button class="btn btn-primary  my-2 my-sm-0" name="degistir" type="submit">Degistir</button>
     </form> 
  </div>
  </div>
</div>
    <div class="row footer">
        <div class="col-lg-6">
            <a href="mesajlarim.html"><img class="message" src="img/message.png" width="50px" height="50px"></a>
            <div class="review">
                <h3>Müşterilerimiz ne diyor?</h3>
                <div class="card-deck">
                    <div class="card">
                        <div class="card-header">
                            <img src="img/login logo.png" alt="">
                            <h6>Name</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"Bu hastanenin hizmet kalitesinden asla hayal kırıklığına uğramadım"</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="background-color: #199BD9;">
                            <img src="img/login logo.png" alt="">
                            <h6>Name</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"Kaliteli hizmet ve uygun fiyat, hizmetiniz için bir kez daha teşekkür ederiz"</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="img/login logo.png" alt="">
                            <h6>Name</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"Bu hastane gerçekten iyi bir sağlık hizmeti sağladı"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="contactinfo">
                <img src="img/adress logo.png" height="25px" width="25px" alt="">
                <h6>Adres</h6>
                <p>Kocahıdır Mah. Alptekn 2 Sk. No 14
                    Kırklarel Merkez, Kırklarel
                </p>
                <img src="img/contact logo.png" height="25px" width="25px" alt="">
                <h6>0288 123 45 67</h6>
                <img src="img/email logo.png" height="25px" width="25px" alt="">
                <h6>ozelhastanesi@gmail.com</h6>
                <img src="img/fb logo.png" height="25px" width="25px" alt="">
                <img src="img/twitter logo.png" height="25px" width="25px" alt="">
                <img src="img/ig logo.png" height="25px" width="25px" alt="">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="tabelwaktu">
                <img src="img/clock logo 2.png" height="35px" width="35px" style="margin-bottom: 20px;" alt="">
                <h6>Çalışma Saatlerimiz</h6>
                <table>
                    <tr>
                        <td>Pazartesi</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Salı</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Çarşamba</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Perşembe</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Cuma</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Cumartesi</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Pazar</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>