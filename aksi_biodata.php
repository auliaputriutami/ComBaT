<?php
session_start();
$con = mysqli_connect("localhost","root","","tescbtpendaftarcca");
   include 'koneksi.php';
    $id = $_POST['id_cca'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $wa = $_POST['wa'];
    $user = $_POST['user'];
    $pass = $_POST['user'];
    $ttl = $_POST['ttl'];
    //$kd = $_
    $aksi = $_POST['aksi'];
    if ($aksi=="Save"){
      $query= mysqli_query($con,"insert into pendaftar_cca values (".$id.", '".$nama."', '".$ttl."', '".$alamat."', '".$wa."')");
      $query1= mysqli_query($con,"insert into akun values (NULL, ".$id.", '".$user."', '".$pass."', 2)");
      if($query and $query1){
        echo '<script language="javascript">window.alert("Succesfully Save");window.location.href="index.php?id=1"</script>';
        }else{
         echo '<script language="javascript">window.alert("Failed Save");window.location.href="index.php?id=1"</script>';
      }
    }
    else if ($aksi=="Update"){
      /*$query1= mysqli_query($con,"update pendaftar_cca SET nama_mhs='".$nama."', alamat='".$alamat."', no_hp='".$nope."', angkatan=".$angkatan.", semester=".$semester.", kelas='".$kelas."', jurusan='".$jurusan."' where stambuk=".$stb);
      if($query1){
         echo '<script language="javascript">window.alert("Succesfully Update");window.location.href="index.php?kode=1&kodex1=2"</script>';
        }else{
         echo '<script language="javascript">window.alert("Failed Update");window.location.href="index.php?kode=1&kodex1=1"&kd='.$stb.'"</script>';
      }*/
    }
    else if (!empty($_GET['id'])){
      $query1= mysqli_query($con,"delete from mahasiswa where stambuk=".$_GET['id']);
      if($query1){
         echo '<script language="javascript">window.alert("Succesfully delete");window.location.href="index.php?kode=1&kodex1=2"</script>';
        }else{
         echo '<script language="javascript">window.alert("Failed Delete");window.location.href="index.php?kode=1&kodex1=2"</script>';
      }
    }
    else {
      //echo '<script language="javascript">;window.location.href="index.php"</script>';
    }
?>
