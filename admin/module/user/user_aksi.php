<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id_user'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$nama = $_POST['nama'];
$level = $_POST['level'];

// HAPUS
if($module=='user' AND $aksi=='no' ){ 
$sql = "UPDATE user SET blokir='N' WHERE id_user = '".$_GET['id_user']."'";
$hapus = mysql_query($sql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='user' AND $aksi=='yes' ){ 
$sql = "UPDATE user SET blokir='Y' WHERE id_user = '".$_GET['id_user']."'";
$hapus = mysql_query($sql);
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='user' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO user  (id_user, user, pass, nama, level ) VALUES ('$id', '$user', '$pass', '$nama', '$level')";
$simpan = mysql_query($sql);
}

else if($module=='user' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM user WHERE id_user='".$_GET['id_user']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}

else if($module=='user' AND $aksi=='edit' ){ 
$sql = "UPDATE user SET 
	nama= '$nama', 
	user = '$user', 
    pass = '$pass', 
    WHERE id_user = '".$_GET['id_user']."'";
$edit = mysql_query($sql);

header('location:../../index.php?module='.$module);
}

?>
