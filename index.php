<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>f1 - ( helena's version)</title>
    <link rel="icon" href="img/f1.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <!--nav begin-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
          <a class="navbar-brand" href=""><img src="img/img9.jpg" alt="" width="10%">Formula 1 Journal</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
              <li class="nav-item">
                <a class="nav-link" href="#hero">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#article">Article</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#aboutme">About Me</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="login.php" target="_blank">Login</a>
              </li>
              </ul>
              <button id="darkmode" class="btn btn-outline-light"><i class="bi bi-cloud-sun-fill h2 p-2 text-dark"></i></button>
              <button id="lightmode" class="btn btn-outline-light"><i class="bi bi-cloud-sun h2 p-2 text-dark"></i></button>
          </div>
        </div>
      </nav>
    <!--nav end-->

    <!--hero begin-->
    <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start" >
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="img/img10.jpg" class="img-fluid" width="300">
                <div>
                    <h1 class="fw-bold display-4">FORMULA 1</h1>
                    <h4 class="lead display-6">Formula One, commonly known as Formula 1 or F1, is the highest class of international racing 
                        for open-wheel single-seater formula racing cars sanctioned by the Fédération Internationale de l'Automobile. The FIA 
                        Formula One World Championship has been one of the world's premier forms of racing since its inaugural running in 1950. 
                    </h4><br>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!--hero end-->

    
    <!-- article begin -->
    <section id="article" class="text-center p-5">
      <div class="container">
      <h1 class="fw-bold display-4 pb-3">article</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
    </div>
    </section>
    <!-- article end -->

    <!--gallery begin-->
    <section id="gallery" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display pb-3">gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/img1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/img3.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/img6.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/img7.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </section>
    <!--gallery end-->

     <!-- schedule begin -->
     <section id="schedule" class="text-center p-5">
        <div class="container">
          <h1 class="fw-bold display-4 pb-3">Schedule</h1>
          <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
              <div class="card h-100">
                <div class="card-header bg-danger text-white">SENIN</div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    Etika Profesi<br />16.20-18.00 | H.4.4
                  </li>
                  <li class="list-group-item">
                    Sistem Operasi<br />18.30-21.00 | H.4.8
                  </li>
                </ul>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-header bg-danger text-white">SELASA</div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    Pendidikan Kewarganegaraan<br />12.30-13.10 | Kulino
                  </li>
                  <li class="list-group-item">
                    Probabilitas dan Statistik<br />15.30-18.00 | H.4.9
                  </li>
                  <li class="list-group-item">
                    Kecerdasan Buatan<br />18.30-21.00 | H.4.11
                  </li>
                </ul>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-header bg-danger text-white">RABU</div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    Manajemen Proyek Teknologi Informasi<br />15.30-18.00 | H.4.6
                  </li>
                </ul>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-header bg-danger text-white">KAMIS</div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    Bahasa Indonesia<br />12.30-14.10 | Kulino
                  </li>
                  <li class="list-group-item">
                    Pendidikan Agama Islam<br />16.20-18.00 | Kulino
                  </li>
                  <li class="list-group-item">
                    Penambangan Data<br />18.30-21.00 | H.4.9
                  </li>
                </ul>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-header bg-danger text-white">JUMAT</div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    Pemrograman Web Lanjut<br />10.20-12.00 | D.2.K
                  </li>
                </ul>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-header bg-danger text-white">SABTU</div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">FREE</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- schedule end -->  

    <!--about me-->
    <section id="aboutme" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">About Me</h1>
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center" justify-content-center>
                <div class="foto me-md-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/9203/9203764.png" class="img-fluid rounded-circle" alt="" width="50%" onclick="toggleDescription()"></div>
                <div id="deskripsi" style="display: none;" class="col text-start">
                    
                            <p class="hidden" >A11.2023.14959</p>
                            <h5 class="hidden card-title"  >Helena Nugroho</h5>
                            <p class="hidden card-text"> 
                                <p class="hidden" >Program Studi Teknik Informatika</p>
                                <a href="https://dinus.ac.id/" class="fw-bold text-decoration-none hidden" >Universitas Dian Nuswantoro</a>
                            </p>      
                </div> 
            </div>
        </div>
    </section>
    <!--about me end-->

    <!--footer begin-->
    <footer class="text-center p-5">
        <div>
            <a href="https://www.instagram.com/f1"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
            <a href="https://x.com/F1"><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a>
            <a href="https://www.youtube.com/user/Formula1"><i class="bi bi-youtube h2 p-2 text-dark"></i></a>
            <a href="https://www.facebook.com/Formula1"><i class="bi bi-facebook h2 p-2 text-dark"></i></a>
        </div> <br>
        <div>Copyright - helena sedunia &copy; 2024</div>

    </footer>
    <!--footer end-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()", 1000);

        function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = 
            waktu.getHours() + 
            ":" +
            waktu.getMinutes() +
            ":" +
            waktu.getSeconds();
        }

    //tampilkan dan sembunyikan deskripsi data diri
    function toggleDescription() {
        const deskripsi = document.getElementById("deskripsi");
        deskripsi.classList.toggle("hidden");
        if (deskripsi.style.display == "none") {
            deskripsi.style.display ="block";
        } else {
            deskripsi.style.display="none";
        }
    }

    //mengganti dark mode
    document.getElementById("darkmode").onclick = function () {
        document.body.classList.add("bg-secondary", "text-light"); //add kelas mode gelap
        document.body.classList.remove("bg-white", "text-dark"); //hapus kelas mode terang

        const heroSection = document.getElementById("hero");
        heroSection.classList.add("bg-dark", "text-light"); //add hero section gelap
        heroSection.classList.remove("bg-danger-subtle", "text-dark"); //hapus hero terang

        const gallerySection = document.getElementById("gallery");
        gallerySection.classList.add("bg-dark", "text-light"); //add gallery gelap
        gallerySection.classList.remove("bg-danger-subtle", "text-dark"); //hapus gallery terang

        const aboutmeSection = document.getElementById("aboutme");
        aboutmeSection.classList.add("bg-dark", "text-light"); //add gallery gelap
        aboutmeSection.classList.remove("bg-danger-subtle", "text-dark"); //hapus gallery terang

        const scheduleSection = document.getElementById("schedule");
        scheduleSection.classList.add("bg-dark", "text-light"); //add gallery gelap
        scheduleSection.classList.remove("bg-danger-subtle", "text-dark"); //hapus gallery terang

        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.style.backgroundColor = "black";
            card.style.color = "white";
        });  
    };

    //mengganti light mode 
    document.getElementById("lightmode").onclick = function () {
        document.body.classList.remove("bg-secondary", "text-light"); //hapus kelas mode gelap
        document.body.classList.add("bg-white", "text-dark"); //add kelas mode terang

        const heroSection = document.getElementById("hero");
        heroSection.classList.remove("bg-dark", "text-light"); // hapus hero section gelap
        heroSection.classList.add("bg-danger-subtle", "text-dark"); //add khero terang

        const gallerySection = document.getElementById("gallery");
        gallerySection.classList.remove("bg-dark", "text-light"); //hapus gallery gelap
        gallerySection.classList.add("bg-danger-subtle", "text-dark"); //add gallery terang

        const aboutmeSection = document.getElementById("aboutme");
        aboutmeSection.classList.remove("bg-dark", "text-light"); //hapus gallery gelap
        aboutmeSection.classList.add("bg-danger-subtle", "text-dark"); //add gallery terang

        const scheduleSection = document.getElementById("schedule");
        scheduleSection.classList.remove("bg-dark", "text-light"); //hapus gallery gelap
        scheduleSection.classList.add("bg-danger-subtle", "text-dark"); //add gallery terang

        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.style.backgroundColor = "white";
            card.style.color = "black";
        });
    };

    </script>

</body>
</html>

