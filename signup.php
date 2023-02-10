<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    
    <?php
include "config.php";
$msg = "";

if(isset($_POST['submit']))
{
	$adsoyad = $_POST['adsoyad'];
    $cinsiyet = $_POST['cinsiyet'];
    $eposta = $_POST['email'];
    $telefonNo = $_POST['telefon'];
    $password = $_POST['password'];
    $dt = $_POST['dogumtarih'];
    
    $sql = "SELECT eposta FROM userinfo WHERE eposta='".$eposta."'";
    $rs = mysqli_query($con,$sql);
    $sonuc = mysqli_fetch_assoc($rs);
    
	
	if($rs->num_rows==1)
	{
        echo '<script>alert("Girdiğiniz eposta kayıt bulunuyor, lütfen farklı eposta giriniz.");</script>';
	}
	else{
		$sql1 = "INSERT INTO userinfo (adsoyad,eposta,sifre,cinsiyet,tel,dogumtarih) VALUES ('".$adsoyad."','".$eposta."','".hash("sha512",$password)."','".$cinsiyet."','".$telefonNo."','".$dt."')";
        $result = mysqli_query($con,$sql1);
        if($result){
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $eposta;
            echo '<script type="text/javascript">'; 
            echo 'alert("Başarıyla Kaydoldu");'; 
            echo 'window.location.href = "anasayfa.php";';
            echo '</script>';
            
            //header('Location: anasayfa.php');
        }
	}
    
}
?>
    
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="needs-validation" method="post" form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <img src="img/headerLogin.jpg" class="calonfoto">
                            <div class="form-group">
                                <label for="adsoyad">Adı ve Soyadı</label>
                                <input type="text" name="adsoyad" id="adsoyad" placeholder="Adı Soyadı"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormCustomSelect">Cinsiyet</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="cinsiyet" required>
                                    <option selected>Seç...</option>
                                    <option value="Erkek">Erkek</option>
                                    <option value="Kadın">Kadın</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Posta Adresi</label>
                                <input type="email" name="email" id="email" placeholder="E-Posta Adresi"
                                    class="form-control" required>
                                <div class="invalid-feedback">Lütfen geçerli bir e-posta yazınız</div>
                            </div>
                            <div class="form-group">
                                <label for="telefon">Telefon Numarası</label>
                                <input type="tel" name="telefon" id="telefon" placeholder="Telefon Numarası"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="dogumtarih">Doğum Tarihi</label>
                                <input type="date" name="dogumtarih" id="dogumtarih" placeholder="Doğum Tarihi"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre</label>
                                <input type="password" name="password" id="password" placeholder="Şifre"
                                    class="form-control" required>
                                <span><?php echo $msg; ?></span>
                                <div class="invalid-feedback">Lütfen geçerli bir şifre yazınız</div>
                            </div>
                            <div class="form-group">
                                <!-- <span><input id="remember-me" name="remember-me" type="checkbox"></span>
                                <label for="remember-me">Beni Hatırla</label> -->
                                <button type="submit" name="submit" class="btn btn-block">Üye Ol</button>
                            </div>
                            <div class="form-group">
                                <a href="anasayfa.php" class="form-text">Anasayfaya Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>