<?php
//error_reporting(0);
session_start();
$page = $_SERVER['REQUEST_URI'];  
  include 'koneksi.php';
  $con = mysqli_connect("localhost","root","","tescbtpendaftarcca");
  if (empty($_SESSION['user'])){
    include 'login.php';
  }
  else {
    $query= mysqli_query($con,"select * from ujian");
        while ($data = mysqli_fetch_array($query)){
            $soal=$data['jumlah_soal'];
            $waktu=$data['waktu_ujian'];
        }
?>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | ComBaT - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <style>

.container-p-y:not([class^=pb-]):not([class*=" pb-"]) {
    padding-bottom: 1.625rem !important;
    background-color: #2C7873;
    /* opacity: 69%; */
}

.menu-vertical .menu-inner {
    flex-direction: column;
    flex: 1 1 auto;
}
      .card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid #d9dee3;
  border-radius: 0.5rem;
}
.card > hr {
  margin-right: 0;
  margin-left: 0;
}
.card > .list-group {
  border-top: inherit;
  border-bottom: inherit;
}
.card > .list-group:first-child {
  border-top-width: 0;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}
.card > .list-group:last-child {
  border-bottom-width: 0;
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}
.card > .card-header + .list-group,
.card > .list-group + .card-footer {
  border-top: 0;
}

.card-body {
  flex: 1 1 auto;
  padding: 1.5rem 1.5rem;
  
}

.card-title {
  margin-bottom: 0.875rem;
}

.card-subtitle {
  margin-top: -0.4375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link + .card-link {
  margin-left: 1.5rem;
}

.card-header {
  padding: 1.5rem 1.5rem;
  margin-bottom: 0;
  background-color: transparent;
  border-bottom: 0 solid #d9dee3;
}
.card-header:first-child {
  border-radius: 0.5rem 0.5rem 0 0;
}

.card-footer {
  padding: 1.5rem 1.5rem;
  background-color: transparent;
  border-top: 0 solid #d9dee3;
}
.card-footer:last-child {
  border-radius: 0 0 0.5rem 0.5rem;
}

.card-header-tabs {
  margin-right: -0.75rem;
  margin-bottom: -1.5rem;
  margin-left: -0.75rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.75rem;
  margin-left: -0.75rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.5rem;
  border-radius: 0.5rem;
}

.card-img,
.card-img-top,
.card-img-bottom {
  width: 100%;
}

.card-img,
.card-img-top {
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

.card-img,
.card-img-bottom {
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}

.card-group > .card {
  margin-bottom: 0.8125rem;
}
    </style>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                        <?php
                        $id=0;
                        if (!empty($_GET['id']))
                        $id=$_GET['id'];
                        if ($id==1){
                            $query= mysqli_query($con,"insert into hasil_ujian values (NULL, ".$_SESSION['akun'].", CURRENT_TIMESTAMP)");
                                if($query){
                                    //echo 'window.location.href="ujian.php?kode=1"</script>';
                                    }else{
                                    //echo '<script language="javascript">window.alert("Failed Save'.$_SESSION['akun'].'");window.location.href="index.php?id=barang"</script>';
                                }
                        }
                            if (empty($_GET['kode'])){
                                ?>
                                <h5 class="card-title text-primary">Petunjuk Soal! </h5>
                                <p class="mb-4">
                                    Ujian ini memeberikan soal dengan multiple choice, silahkan pilih jawaban yang menurut anda paling benar, dan untuk kembali ke soal sebelumnya silahkan klik no soal yang ada di bagian kanan layar anda, untuk soal yang berwarna kuning menandakan belum ada jawaban, sedangkan untuk warna biru menandakan sudah ada jawaban. klik button finish untuk menyelesaikan ujian.
                                </p>
                                <p class="mb-4">
                                    Soal ini terdiri dari <B><?php echo $soal." SOAL";?></B> dan dikerjakan dalam waktu <B><?php echo $waktu." MENIT";?></B>
                                </p>
                                <a href="ujian.php?id=1&kode=1" class="btn btn-sm btn-outline-primary">Mulai Ujian</a>
                                <?php
                            }
                            else {
                                if($_GET['kode']==41){
                                    echo '<script language="javascript">window.location.href="index.php"</script>';
                                }
                                echo '<form action="aksi_ujian.php" method="POST">';
                                $query= mysqli_query($con,"select * from soal where id_soal=".$_GET['kode']);
                                while ($data = mysqli_fetch_array($query)){
                                ?>
                                    <?php
                                        echo '<h5 class="card-title text-primary">Soal Ke- '.$_GET['kode'].'</h5>';
                                        echo '<p class="mb-4">'.$data['Soal'].'</p>';
                                        $query1= mysqli_query($con,"select * from jawaban where id_soal=".$_GET['kode']);
                                        while ($data1 = mysqli_fetch_array($query1)){
                                            //echo '<p class="mb-4">'.$data1['jawaban'].'</p>';
                                            echo '
                                            <div class="col-md">
                                                <div class="form-check mt-3">
                                                    <input
                                                    name="jawaban"
                                                    class="form-check-input"
                                                    type="radio"
                                                    value ="'.$data1['id_jawaban'].'" 
                                                    id="defaultRadio1"
                                                    />
                                                    <label class="form-check-label" for="defaultRadio1"> '.$data1['jawaban'].' </label>
                                                </div>
                                            </div>
                                            ';
                                        }
                                        $a=$_GET['kode']+1;
                                        //echo '<br><a href="ujian.php?kode='.$a.'" class="btn btn-sm btn-outline-primary">Selanjutnya</a>';
                                        echo '<br><button type="submit" name="soal" class="btn btn-primary" value="'.$data['id_soal'].'">Selanjutnya</button>';
                                        
                                }
                            //echo '<span class="badge badge-center bg-info mb-2"><a href="index.php">'.$i.'</a></span> ';
                            }
                        ?>
                        
                        
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Daftar Soal</h5>
                      <div class="dropdown">
                        
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <?php
                        $i = 1;
                        if (empty($_GET['kode'])){
                            $i = 1;
                            while ($i<=$soal){
                            echo '<span class="badge badge-center bg-secondary mb-2">'.$i.'</span> ';
                            $i++;
                            }
                        }
                        else {
                            $query= mysqli_query($con,"select * from soal LIMIT ".$soal);
                            while ($data = mysqli_fetch_array($query)){
                                echo '<span class="badge badge-center bg-warning mb-2"><a href="ujian.php?kode='.$data['id_soal'].'">'.$i.'</a></span> ';
                                $i++;
                            }
                          //echo '<span class="badge badge-center bg-info mb-2"><a href="index.php">'.$i.'</a></span> ';
                        }
                        ?>
            </form>
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
  <?php } ?>
</html>
