<?php
session_start();
$con = mysqli_connect("localhost","root","","tescbtpendaftarcca");
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $aksi="Save";
    $id=0;
    if ($aksi=="Save"){
        $query= mysqli_query($con,"select a.No_akun, a.Username, a.Password, b.category, b.id_category from akun a INNER JOIN category_user b ON (a.id_category=b.id_category) where a.Username = '".$user."' and a.Password = '".$pass."'");
        while ($data = mysqli_fetch_array($query)){
            $id=$data['id_category'];
            $user=$data['Username'];
            $_SESSION['user']=$user;
            $_SESSION['kategori']=$data['category'];
            $_SESSION['akun']=$data['No_akun'];
        }
        if($id!=0){
          echo '<script language="javascript">window.alert("Succesfully Save");window.location.href="index.php"</script>';
          }else{
           echo '<script language="javascript">window.alert("Failed Save'.$user.$pass.'");window.location.href="login.php"</script>';
        }
      }
?>