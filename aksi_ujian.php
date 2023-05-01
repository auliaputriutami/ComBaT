<?php
session_start();
$id_hu=0;
$jawaban = $_POST['jawaban'];
$soal = $_POST['soal'];
$con = mysqli_connect("localhost","root","","tescbtpendaftarcca");
$query4= mysqli_query($con,"select * from hasil_ujian order by id_HU LIMIT 1");
while ($data4 = mysqli_fetch_array($query4)){
    $id_hu=$data4['id_HU'];
}
$query= mysqli_query($con,"insert into detail_hasil_ujian values (NULL, ".$id_hu.", ".$jawaban.")");
if($query){
    $a=$soal+1;
    echo '<script language="javascript">window.location.href="ujian.php?kode='.$a.'"</script>';
    }else{
    echo '<script language="javascript">window.alert("Failed Save");window.location.href="index.php?id=barang"</script>';
}
?>