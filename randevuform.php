<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Formu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="randevuform.css">
</head>

    <?php
    include "config.php";
    $msg = "";
    if (!(isset($_SESSION['email']))) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Randevu almak için giriş yapmalısınız!");'; 
        echo 'window.location.href = "anasayfa.php";';
        echo '</script>';
    }
    $sql2 = "SELECT adsoyad,cinsiyet,tel,dogumtarih FROM userinfo WHERE eposta = '".$_SESSION['email']."'";
    $result = $con->query($sql2);
    $row=$result->fetch_row();

if(isset($_POST['submit']))
{
	$adsoyad = $row[0];
    $cinsiyet = $row[1];
    $eposta = $_SESSION['email'];
    $dogumtarih = $row[3];
    $tckn = $_POST['tckn'];
    $tel = $row[2];
    $poliklinik = $_POST['poliklinik'];
    $randevutarih = $_POST['randevutarih'];
    
    $sql = "SELECT poliklinik, randevutarih FROM randevu WHERE poliklinik='".$poliklinik."' and randevutarih='".$randevutarih."' ";
    $rs = mysqli_query($con,$sql);
    $sonuc = mysqli_fetch_assoc($rs);
    
	
	if($rs->num_rows==1)
	{
        echo '<script>alert("Girdiğiniz poliklinik ve randevu tarihte kayıt bulunuyor, lütfen farklı poliklinik veya randevu tarihi giriniz.");</script>';
	}
	else{
		$sql1 = "INSERT INTO randevu (adsoyad,cinsiyet,eposta,dogumtarih,tckn,tel,poliklinik,randevutarih) VALUES ('".$adsoyad."','".$cinsiyet."', '".$_SESSION['email']."','".$dogumtarih."','".$tckn."','".$tel."','".$poliklinik."','".$randevutarih."')";
        $result = mysqli_query($con,$sql1);
        if($result){
            //$_SESSION['eposta'] = $eposta;
            echo '<script type="text/javascript">'; 
            echo 'alert("Başarıyla Kaydoldu");'; 
            echo 'window.location.href = "anasayfa.php";';
            echo '</script>';
        }
	}
    
}
?>
    
<body>
    <div id="randevu">
        <div class="container">
            <div id="randevu-row" class="row justify-content-center align-items-center">
                <div id="randevu-column" class="col-md-6">
                    <div id="randevu-box" class="col-md-12">
                        
                        
                        
                        <form id="randevu-form" class="needs-validation" method="post" form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <img src="img/randevuheader.jpg" class="calonfoto">
                            <p>İhtiyacınız olan randevu tipini belirleyecek olan asağıdaki formu doldurun. Gelişmelerle ilgili tarafınıza geri dönüş yapılacaktır.</p>
                            <div class="form-group">
                                
                                <label for="adsoyad">Adı ve Soyadı</label>
                                <input type=”text” class="form-control" name=”adsoyad” id="adsoyad" placeholder="Adı Soyadı" value="<?=$row[0];?>" disabled>
                                
                            </div>
                
                            <div class="form-group">
                                <label for="inlineFormCustomSelect">Cinsiyet</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="cinsiyet" required disabled>
                                    <option><?=$row[1];?></option>
                                </select>
                            </div>
                                    
                            <div class="form-group">
                                <label for="inlineFormCustomSelect">Doğum Tarihi</label>
                                        <input type="date" class="form-control" name="dogumtarih" value="<?=$row[3]; ?>" required disabled>
                                
                            </div>
                            <div class="form-group">
                                <label for="email">Ikamet No</label>
                                <input placeholder="Ikamet No" name= "tckn" id="tckn" class="form-control" required>
                                <div class="invalid-feedback">Lütfen Ikamet numaranız yazınız</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="telefon">Telefon Numarası</label>
                                <input type="text" name="tel" id="tel" placeholder="Telefon Numarası"
                                    class="form-control" value="<?=$row[2]; ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormCustomSelect">Poliklinik Adı</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="poliklinik" required>
                                    <option selected>Seç...</option>
                                    <option value="PSİKOLOG">PSİKOLOG</option>
                                    <option value="EMG">EMG</option>
                                    <option value="NÖROLOJİ">NÖROLOJİ</option>
                                    <option value="PSİKİYATRİ">PSİKİYATRİ</option>
                                    <option value="DAHİLİYE">DAHİLİYE</option>
                                    <option value="KARDİYOLOJİ">KARDİYOLOJİ</option>
                                    <option value="ÇOCUKGELİŞ.PSİKOLOG">ÇOCUKGELİŞ.PSİKOLOG</option>
                                    <option value="GASTROENTOROLOJİ">GASTROENTOROLOJİ</option>
                                    <option value="NEFROLOJİ">NEFROLOJİ</option>
                                    <option value="SOSYAL ÇALIŞMACI">SOSYAL ÇALIŞMACI</option>
                                    <option value="KADIN HAST.VE DOĞUM">KADIN HAST.VE DOĞUM</option>
                                    <option value="RADYOLOJİ">RADYOLOJİ</option>
                                    <option value="ORTOPEDİ">ORTOPEDİ</option>
                                    <option value="AMATEM-PSİKOLOG">AMATEM-PSİKOLOG</option>
                                    <option value="FİZİK TEDAVİ UZMANI">FİZİK TEDAVİ UZMANI</option>
                                    <option value="CİLDİYE">CİLDİYE</option>
                                    <option value="ONKOLOJİ">ONKOLOJİ</option>
                                    <option value="KALP DAMAR CERRAHİ">KALP DAMAR CERRAHİ</option>
                                    <option value="GÖZ">GÖZ</option>
                                    <option value="GÖĞÜS CERRAHİ">GÖĞÜS CERRAHİ</option>
                                    <option value="BEYİN CERRAHİ">BEYİN CERRAHİ</option>
                                    <option value="GENEL CERRAHİ">GENEL CERRAHİ</option>
                                    <option value="ÜROLOJİ">ÜROLOJİ</option>
                                    <option value="PLASTİK CERRAHİ">PLASTİK CERRAHİ</option>
                                    <option value="ÇOCUK CERRAHİ">ÇOCUK CERRAHİ</option>
                                    <option value="DİYETİSYEN">DİYETİSYEN</option>
                                    <option value="HAKAN ÇİFTÇİ(COVİD YBÜ 6 NÖBET)">HAKAN ÇİFTÇİ(COVİD YBÜ 6 NÖBET)</option>
                                    <option value="PATOLOJİ">PATOLOJİ</option>
                                    <option value="YENİDOGAN İŞİTME">YENİDOGAN İŞİTME</option>   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormCustomSelect">İstenilen Randevu Tarihi</label>
                                        <input type="date" class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="randevutarih" required>
                            </div>
                            <div class="form-group">
                                <!-- <span><input id="remember-me" name="remember-me" type="checkbox"></span>
                                <label for="remember-me">Beni Hatırla</label> -->
                                <button type="submit" name="submit" class="btn btn-block">Formu Gönder</button>
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