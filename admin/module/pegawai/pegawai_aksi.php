<?php
include "../../koneksi.php";
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$no_pegawai = $_POST['no_pegawai'];
$nip = $_POST['nip'];
$nm_pegawai = $_POST['nm_pegawai'];
$jk = $_POST['jk'];
$tpt_lhr = $_POST['tpt_lhr'];
$tgl_lhr = $_POST['tgl_lhr'];
$tgl_msk = $_POST['tgl_msk'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$no_sk = $_POST['no_sk'];
$id_pangkat = $_POST['pangkat'];

$id_jabatan = $_POST['jabatan'];
$id_unit_krj = $_POST['unit_krj'];
$status = $_POST['status'];

$id_kel = $_POST['id_kel'];
$nm_kel = $_POST['nm_kel'];
$jk_kel = $_POST['jk_kel'];
$tpt_lhr_kel = $_POST['tpt_lhr_kel'];
$tgl_lhr_kel = $_POST['tgl_lhr_kel'];
$alamat_kel = $_POST['alamat_kel'];
$no_hp_kel = $_POST['no_hp_kel'];
$agama_kel = $_POST['agama_kel'];
$hubungan = $_POST['hubungan'];

// HAPUS
if($module=='pegawai' AND $aksi=='hapus' ){ 
$mySql1 = mysql_query("DELETE FROM pendidikan WHERE no_pegawai='".$_GET['no_pegawai']."'");
$mySql2 = mysql_query("DELETE FROM pengalaman_krj WHERE no_pegawai='".$_GET['no_pegawai']."'");
$mySql3 = mysql_query("DELETE FROM sk_krj WHERE no_pegawai='".$_GET['no_pegawai']."'");
$mySql4 = mysql_query("DELETE FROM keluarga WHERE no_pegawai='".$_GET['no_pegawai']."'");

$mySql = "DELETE FROM pegawai WHERE no_pegawai='".$_GET['no_pegawai']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
if($module=='pegawai' AND $aksi=='hapus_pend' ){ 
$mySql2 = mysql_query("DELETE FROM pendidikan WHERE id_pend='".$_GET['id_pend']."'");
echo "<script>window.location='javascript:history.back()';</script>";
}
if($module=='pegawai' AND $aksi=='hapus_peng_krj' ){ 
$mySql2 = mysql_query("DELETE FROM pengalaman_krj WHERE id_peng_krj='".$_GET['id_peng_krj']."'");
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='pegawai' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE pegawai SET				 
				  nip = '$nip',
				  nm_pegawai = '$nm_pegawai',
				  jk = '$jk',
				  alamat = '$alamat',
				  no_hp = '$no_hp',
				  tpt_lhr = '$tpt_lhr',
				  tgl_lhr = '$tgl_lhr',
				  tgl_msk = '$tgl_msk',
				  agama = '$agama',
				  email = '$email'
				  WHERE no_pegawai = '$no_pegawai'");
$query1 = mysql_query("UPDATE sk_krj SET				 				  				  
				  id_jabatan = '$id_jabatan',
				  id_pangkat = '$id_pangkat',
				  id_unit_krj = '$id_unit_krj',
				  tgl_msk = '$tgl_msk'				  
				  WHERE no_sk = '$no_sk'");	
$query2 = mysql_query("UPDATE keluarga SET				 				  				  
				  nm_kel = '$nm_kel',
				  jk_kel = '$jk_kel',
				  tpt_lhr_kel = '$tpt_lhr_kel',
				  tgl_lhr_kel = '$tgl_lhr_kel',	
				  agama_kel = '$agama_kel',	
				  alamat_kel = '$alamat_kel',
				  no_hp_kel = '$no_hp_kel',
				  hubungan = '$hubungan'						  
				  WHERE id_kel = '$id_kel'");	
$num_input = count($_POST['add_nm_jjg']);
//input data pendidikan
for ($i = 0; $i < $num_input; $i++) {
$no_pegawai = $_POST['no_pegawai'];
$jjg = $_POST['add_jjg'][$i];
$nm_jjg = $_POST['add_nm_jjg'][$i];
$thn_jjg = $_POST['add_thn_jjg'][$i];
    $query = "insert into pendidikan (no_pegawai, thn_pend, jenjang, nm_pendidikan) 
	values('{$no_pegawai}','{$thn_jjg}', '{$jjg}','{$nm_jjg}')";
mysql_query($query) or die(mysql_error());	
}
$count = count($_POST['nm_jjg']);
for($i = 0; $i < $count; $i++){
$id = $_POST['id_pend'][$i];
$jjg = $_POST['jjg'][$i];
$nm_jjg = $_POST['nm_jjg'][$i];
$thn_jjg = $_POST['thn_jjg'][$i];	
	
		$query_nilaiupdate = "UPDATE pendidikan set thn_pend = '".$thn_jjg."',
jenjang = '".$jjg."',nm_pendidikan = '".$nm_jjg."' where id_pend = '".$id."'";
		$simpan = mysql_query($query_nilaiupdate);
	}
$counts = count($_POST['thn_krj']);
for($i = 0; $i < $counts; $i++){
$ids = $_POST['ids'][$i];
$pekerjaan = $_POST['pekerjaan'][$i];
$nm_pt = $_POST['nm_pt'][$i];
$thn_krj = $_POST['thn_krj'][$i];				
$simpans = mysql_query("UPDATE pengalaman_krj set thn_krj = '".$thn_krj."',
nm_pt = '".$nm_pt."',nm_krj = '".$pekerjaan."' where id_peng_krj = '".$ids."'");
	}	

//input riwayat kerja
$num = count($_POST['add_pekerjaan']);
for ($j = 0; $j < $num; $j++) {
$no_pegawai = $_POST['no_pegawai'];
$nm_krj = $_POST['add_pekerjaan'][$j];
$nm_pt = $_POST['add_nm_pt'][$j];
$thn_krj = $_POST['add_thn_krj'][$j];
    $quer = "insert into pengalaman_krj (no_pegawai, thn_krj, nm_krj, nm_pt) 
	values('{$no_pegawai}','{$thn_krj}', '{$nm_krj}','{$nm_pt}')";
mysql_query($quer) or die(mysql_error());	
}
				  
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='pegawai' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO pegawai  (no_pegawai, nip, nm_pegawai, jk, tpt_lhr, tgl_lhr, agama, alamat, no_hp, email, tgl_msk) VALUES ('$no_pegawai', '$nip', '$nm_pegawai', '$jk', '$tpt_lhr', '$tgl_lhr',  '$agama', '$alamat', '$no_hp', '$email', '$tgl_msk')";
$simpan = mysql_query($sql);
$sq = "INSERT INTO sk_krj (no_sk, no_pegawai, tgl_sk, id_jabatan, id_pangkat, id_unit_krj, status_sk) VALUES ( '{$no_sk}','{$no_pegawai}','{$tgl_msk}','{$id_jabatan}', '{$id_pangkat}','{$id_unit_krj}','{$status}')";
$simpa = mysql_query($sq);
$sqll = "INSERT INTO keluarga (id_kel, no_pegawai, nm_kel, jk_kel, tpt_lhr_kel, tgl_lhr_kel, agama_kel,	alamat_kel, no_hp_kel, hubungan) VALUES ( '{$id_kel}', '{$no_pegawai}', '{$nm_kel}', '{$jk_kel}', '{$tpt_lhr_kel}', '{$tgl_lhr_kel}', '{$agama_kel}', '{$alamat_kel}', '{$no_hp_kel}', '{$hubungan}')";
$simpann = mysql_query($sqll);

$num_input = count($_POST['nm_jjg']);
//input data pendidikan
for ($i = 0; $i < $num_input; $i++) {
$no_pegawai = $_POST['no_pegawai'];
$jjg = $_POST['jjg'][$i];
$nm_jjg = $_POST['nm_jjg'][$i];
$thn_jjg = $_POST['thn_jjg'][$i];
    $query = "insert into pendidikan (no_pegawai, thn_pend, jenjang, nm_pendidikan) 
	values('{$no_pegawai}','{$thn_jjg}', '{$jjg}','{$nm_jjg}')";
mysql_query($query) or die(mysql_error());	
}
//input riwayat kerja
$num = count($_POST['pekerjaan']);
for ($j = 0; $j < $num; $j++) {
$no_pegawai = $_POST['no_pegawai'];
$nm_krj = $_POST['pekerjaan'][$j];
$nm_pt = $_POST['nm_pt'][$j];
$thn_krj = $_POST['thn_krj'][$j];
    $quer = "insert into pengalaman_krj (no_pegawai, thn_krj, nm_krj, nm_pt) 
	values('{$no_pegawai}','{$thn_krj}', '{$nm_krj}','{$nm_pt}')";
mysql_query($quer) or die(mysql_error());	
}
}
?>