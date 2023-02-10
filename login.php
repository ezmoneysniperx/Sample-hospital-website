<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    
</head>

<body>
    
    <?php
include "config.php";
$hatamesaj = "";
//if(CRYPT_SHA512 == 1){
    //$siffreli = crypt('benimSifrem','$6$rounds=5000$buradabirsaltdegerivar$');
//}
if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from userinfo where eposta='".$uname."' and sifre='".hash("sha512",$password)."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION["loggedin"] = true;
            $_SESSION['email'] = $uname;
            header('Location: anasayfa.php');
        }else{
            $hatamesaj = "E-Posta ya da Sifre Hatali, Lutfen tekrar kontrol edin";
        }

    }

}

 
?>
    
    
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="needs-validation" form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <img src="img/headerLogin.jpg" class="calonfoto">
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="E-Posta Adresi"
                                    class="form-control" required>
                                <div class="invalid-feedback">Lütfen geçerli bir e-posta yazınız</div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Şifre"
                                    class="form-control" required>
                                <div class="invalid-feedback">Lütfen geçerli bir şifre yazınız</div>
                            </div>
                            <span><?php echo $hatamesaj; ?></span>
                            <div class="form-group">
                                <span><input id="remember-me" name="remember-me" type="checkbox"></span>
                                <label for="remember-me">Beni Hatırla</label>
                                <button type="submit" class="btn btn-block" value="submit" name="submit">Giriş Yap</button>
                            </div>
                            <div class="form-group uye-ol">
                                <a href="signup.php" class="form-text">Üye Ol</a>
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