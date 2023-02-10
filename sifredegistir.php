<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Değiştir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="sifredegistir.css">
    
</head>

<body>
    
<?php
    include "config.php";
    $msg = "";
    if(isset($_POST['submit'])){
        $es = mysqli_real_escape_string($con,$_POST['eskisifre']);
        $ys = mysqli_real_escape_string($con,$_POST['yenisifre']);
        $yst = mysqli_real_escape_string($con,$_POST['yenisifretekrar']);
        $eposta = $_SESSION['email'];

        if (!empty($es) and !empty($ys) and !empty($yst)) {
            if($ys == $yst){
                $sql1 = "select eposta from userinfo where eposta='".$eposta."' and sifre='".hash("sha512",$es)."' ";
                $rs = mysqli_query($con,$sql1);
                $sonuc= mysqli_fetch_assoc($rs);

                if($rs->num_rows == 1){
                    $sql = "UPDATE userinfo SET sifre='".hash("sha512",$ys)."' WHERE eposta='".$eposta."' ";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Şifre Değiştirme İşlemini Başarılı !");'; 
                        echo 'window.location.href = "ayarlar.html";';
                        echo '</script>';
                    }else{
                        $msg = "Hata Oluştu !";
                    }
                }
            }else{
                $msg = "Şifreler Aynı Değil ! ";
            }
        }else{
            $msg = "Tüm Alanları Dolu Olmalıdır !";
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
                                <label for="eskisifre">Eski Sifre</label>
                            <input type="password" name="eskisifre" id="password" placeholder="Şifre"
                                    class="form-control" >
                                
                            </div>
                            <div class="form-group">
                            <label for="yenisifre">Yeni Sifre</label>
                                <input type="password" name="yenisifre" id="password" placeholder="Şifre"
                                    class="form-control" >
                                
                            </div>
                            <div class="form-group">
                            <label for="yenisifretekrar">Yeni Sifre (Tekrar)</label>
                            <input type="password" name="yenisifretekrar" id="password" placeholder="Şifre"
                                    class="form-control" >
                                
                            </div>
                            <span><?php echo $msg; ?></span>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block" value="submit" name="submit">Şifre Değiştir</button>
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