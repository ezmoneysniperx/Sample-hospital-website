<html lang="en">
<?php
include "config.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="anasayfa.css">
</head>

<body>
    <div class="jumbotron mb-0">
        <a href="anasayfa.html"><img src="img/logo.png" alt=""></a>
       
    </div>
    <nav class="navbar navbar-dark navbar-expand-sm ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <?php
            if (!isset($_SESSION['email']) || $_SESSION["loggedin"] !== true){
            ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="anasayfa.php">ANASAYFA<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="makalelistesi.html">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" >GIRIS YAP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php" target="_blank">UYE OL</a>
                </li>
            </ul>
            <?php
            }
            else{
            ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="anasayfa.php">ANASAYFA<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="makalelistesi.html">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="randevuform.php" target="_blank">RANDEVU YAP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bilgilerim.php" target="_blank">BILGILERIM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">CIKIS</a>
                </li>
            </ul>
            <?php
            }
            ?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary  my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-lg-block" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/bg.jpg" class="d-block w-100" style="height: 650px;" alt="...">
            </div>
        </div>
    </div>


    <div class="row mx-3 pt-0">
        <div class="col-lg-9 mt-3">
            <div class="card-deck" style="margin-bottom: 20px;">
                <div class="card " id="card">
                    <img class="card-img-top;" src="img/clock logo.png" height="40px" width="40px"
                        style="margin-top: 20px;" alt="">
                    <div class="card-body">
                        <h5>24 saat Hizmetinizdeyiz</h5>
                        <p class="card-text">Acil bir durumunuz varsa 24 saat size yard??mc?? olmaya haz??r??z</p>
                    </div>
                </div>

                <div class="card" id="card">
                    <img class="card-img-top;" src="img/microscope logo.png" height="40px" width="40px"
                        style="margin-top: 20px;" alt="">
                    <div class="card-body">
                        <h5>Laboratuvar</h5>
                        <p>Hastanemiz, laboratuar gerektiren bir durumda bize yard??mc?? olabilecek y??ksek kaliteli laboratuvarlarla donat??lm????t??r.</p>
                    </div>
                </div>

                <div class="card" id="card">
                    <img class="card-img-top;" src="img/doctor logo.png" height="40px" width="40px"
                        style="margin-top: 20px;" alt="">
                    <div class="card-body">
                        <h5>Nitelikli Doktorlar</h5>
                        <p>doktorlar??m??z, sa??l??k hizmetlerinde m??mk??n olan her durumu ele alma konusunda deneyimli ki??ilerdir.</p>
                    </div>
                </div>

                <div class="card" id="card">
                    <img class="card-img-top;" src="img/ambulance logo.png" height="30px" width="40px"
                        style="margin-top: 30px;" alt="">
                    <div class="card-body">
                        <h5>Acil Yard??m</h5>
                        <p>Kaza ge??iren, acil durum ya??ayan vb. ki??ilere acil yard??m sa??lamaya haz??r??z.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7" style="padding-right: 0px;">
                    <a href="randevuform.php" target="_blank"><img src="img/randevu yap.jpg" height="270px"
                            width="270px" alt=""></a>
                    <a href="daftardokter.html"><img src="img/doktorlarimiz.jpg" height="270px" width="270px"
                            alt=""></a>
                    <a href="mesajlarim.html"><img src="img/cevrimici konsultasyon.jpg" height="270px" width="270px"
                            alt=""></a>
                    <a href="makalelistesi.html"><img src="img/bloglarimiz.jpg" height="270px" width="270px" alt=""></a>
                </div>
                <div class="col-lg-5" style="padding-left: 0px;">
                    <h1 class="display-4">??zel Hastanesi</h1>
                    <p id="MainParagraph">
                        K??rklareli'de bulunan ??zel bir hastaneyiz, sa??l??k sekt??r??nde uzun y??llara dayanan deneyime
                        sahibiz ve t??m yerli ve yabanc?? hastalara kaliteli sa??l??k hizmeti ve de??erli deneyim sunmas??yla
                        tan??n??yoruz. Sa??l??k hizmetlerimiz, kendi alanlar??nda zengin bilgi ve deneyime sahip, ??efkatli ve
                        kendini i??ine adam???? t??p uzmanlar??ndan olu??an bir ekip taraf??ndan desteklenmektedir.

                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mt-3 sidebar">
            <h1 class="display-4 makaleler">Makale ve Videolar</h1>
            <div class="media">
                <img src="img/Tumor-markerleri-1024x768.png" height="85px" width="85px" class="mr-3" alt="...">
                <div class="media-body">
                    <a href="tumor.html" class="card-link">
                        <h5 class="mt-0">T??m??r Markerlar?? (Belirte??leri) ve Normal De??erleri</h5>
                    </a>
                    T??m??r Nedir?<br>T??m??r, ??o??unlukla beyinde olu??an ve ama??s??zca ??o??alan h??crelerdir. H??crelerin a????r??
                    ??o??almas?? ile ortaya ????kan yumru ??eklidir. T??m??rler iyi huylu ve k??t?? huylu olarak ikiye ayr??l??r...
                </div>
            </div>
            <div class="media">
                <img src="img/kanser.png" height="85px" width="85px" class="mr-3" alt="...">
                <div class="media-body">
                    <a href="kanser.html" class="card-link">
                        <h5 class="mt-0">Kanser</h5>
                    </a>
                    Kanser Nedir?<br>Kolayca sorulan, ??o??u zaman da basit bir cevab?? oldu??u d??????n??len, fakat detayl?? bir
                    cavab??n?? birka?? ciltlik bir kitapta verebilece??iniz bir sorudur ???kanser nedir ve neden olur???. Yine
                    de en karma????k g??r??len olgular??n bile bir tan??m?? olmal??d??r...
                </div>
            </div>
            <div class="media">
                <img src="img/inme.png" height="85px" width="85px" class="mr-3" alt="...">
                <div class="media-body">
                    <a href="inme.html" class="card-link">
                        <h5 class="mt-0">??nme</h5>
                    </a>
                    ??nme Nedir?<br>???Fel?????ad?? ile de bilinen inme, beyne giden kan ak??m??n??n ani bir ??ekilde kesilmesi
                    veya azalmas?? durumudur...
                </div>
            </div>
            <div class="media">
                <img src="img/hepatit.png" height="85px" width="85px" class="mr-3" alt="...">
                <div class="media-body">
                    <a href="hepatit.html" class="card-link">
                        <h5 class="mt-0">Hepatit</h5>
                    </a>
                    Hepatit Nedir?<br>Hepatit karaci??erin herhangi bir nedenle olu??an iltihab??d??r. Hepatitler,
                    genellikle vir??slerle, en s??k g??r??len be?? hepatit vir??s?? olan A,B,C,D ve E vir??sleri ile meydana
                    gelir...
                </div>
            </div>
        </div>
    </div>

    <div class="row footer">
        <div class="col-lg-6">
            <a href="mesajlarim.html"><img class="message" src="img/message.png" width="50px" height="50px"></a>
            <div class="review">
                <h3>M????terilerimiz ne diyor?</h3>
                <div class="card-deck">
                    <div class="card">
                        <div class="card-header">
                            <img src="img/login logo.png" alt="">
                            <h6>Name</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"Bu hastanenin hizmet kalitesinden asla hayal k??r??kl??????na u??ramad??m"</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="background-color: #199BD9;">
                            <img src="img/login logo.png" alt="">
                            <h6>Name</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"Kaliteli hizmet ve uygun fiyat, hizmetiniz i??in bir kez daha te??ekk??r ederiz"</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="img/login logo.png" alt="">
                            <h6>Name</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"Bu hastane ger??ekten iyi bir sa??l??k hizmeti sa??lad??"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="contactinfo">
                <img src="img/adress logo.png" height="25px" width="25px" alt="">
                <h6>Adres</h6>
                <p>Kocah??d??r Mah. Alptekn 2 Sk. No 14
                    K??rklarel Merkez, K??rklarel
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
                <h6>??al????ma Saatlerimiz</h6>
                <table>
                    <tr>
                        <td>Pazartesi</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Sal??</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>??ar??amba</td>
                        <td>09.00 - 24.00</td>
                    </tr>
                    <tr>
                        <td>Per??embe</td>
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