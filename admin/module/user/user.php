<?php
$aksi="module/user/user_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA User ------------------------- ---->			
<h3 class="box-title margin text-center">Data User</h3>
<center> <div class="batas"> </div></center>
<hr/>
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-user-secret"></i>
		Data User </h3>
		<a class="btn btn-default pull-right"href="?module=user&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah data</a>		
		</div>		
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">ID user</th>
    <th>Nama</th>
		<th class="col-sm-1">Username</th>
    <th class="col-sm-1">Password</th>
		<th class="col-sm-1">Level</th> 
		<th class="col-sm-1">Status</th> 
		<th class="col-sm-1">Blokir?</th>
    <th class="col-sm-1">Aksi</th> 

	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM user";
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_user'];
$blokir = $tampilkan['blokir'];?>


	<tr>
	<td><?php echo $tampilkan['id_user']; ?></td>
	<td><?php echo $tampilkan['nama']; ?></td>
	<td><?php echo $tampilkan['user']; ?></td>
  <td><?php echo $tampilkan['pass']; ?></td>
	<td><?php echo $tampilkan['level']; ?></td>
	<td align = "center">
    <?php if  ( $blokir== 'Y' ) {
				echo "<a class='btn btn-xs btn-warning' disabled >NonAktif</a>";}
				else {echo "<a class='btn btn-xs btn-success' disabled>Aktif</a>"; }   ?></td>
	<td align="center">
	<?php if ( $blokir== 'N' ) { ?>
	<a class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Blokir User??" href="<?php echo $aksi ?>?module=user&aksi=yes&id_user=<?php echo $tampilkan['id_user']; ?>" onclick="return confirm('Apakah anda yakin ingin blokir <?php echo $tampilkan['user']; ?> ?')"><i class="glyphicon glyphicon-ok"></i></a>
	<?php }
	else { ?>
	<a class="btn btn-xs btn-success" data-toggle="tooltip" title="UnBlokir User??" href="<?php echo $aksi ?>?module=user&aksi=no&id_user=<?php echo $tampilkan['id_user']; ?>" onclick="return confirm('Apakah anda yakin UnBlokir <?php echo $tampilkan['user']; ?>?')"><i class="glyphicon glyphicon-remove"></i></a>
	<?php } ?>

  <td align="center">
  <a class="btn btn-xs btn-info" href="?module=user&aksi=edit&id_user=<?php echo $tampilkan['id_user'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
  <a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=user&aksi=hapus&id_user=<?php echo $tampilkan['id_user'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>  ?')"> <i class="glyphicon glyphicon-trash"></i></a>
  </td>

	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA User ------------------------- ---->
<?php 
break;
 case "tambah": 
//ID
$sql ="SELECT max(id_user) as terakhir from user";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "USR".sprintf("%03s",$nextNoUrut);
?>
<!----- ------------------------- TAMBAH DATA User ------------------------- ---->
<h3 class="box-title margin text-center">Tambah Data User</h3>
<center> <div class="batas"> </div></center>
<hr/>

<form class="form-horizontal" action="<?php echo $aksi?>?module=user&aksi=tambah" role="form" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">ID user </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="id_user" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" placeholder="Nama user">
    </div>
  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Level </label>
    <div class="col-sm-5">
      <select name="level" class="form-control">
<option value=" "> -- Pilih Level -- </option>
<option value="admin">Admin</option>
<option value="pengguna">Pengguna</option>
</select>
    </div>
  </div>
<hr/>
<div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="user" placeholder="username">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" required="required" name="pass" minlength="5"value="12345">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
<button type="submit"name="submit" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i><i>Reset</i></button>
    </div>
  </div> 
</form> 
<!----- ------------------------- END TAMBAH DATA User ------------------------- ---->

<?php 
break;
case "edit": 


if (isset($_POST['submit'])){
if ((!empty($_POST['nama']))) {
$sql = "UPDATE user SET nama= '".$_POST['nama']."', user = '".$_POST['user']."', 
    pass = '".$_POST['pass']."' WHERE id_user = '".$_SESSION['id']."'";
$simpan = mysql_query($sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update');</script>";
} else { 
echo "<script>alert('Gagal Di Update');</script>";
}
}
}

$data=mysql_query("select * from user where id_user='$_GET[id_user]'");
$edit=mysql_fetch_array($data);
?>

<!----- ------------------------- EDIT DATA MASTER user ------------------------- ---->
<h3 class="box-title margin text-center">Edit Profil</h3>
<center> <div class="batas"> </div></center>
<br/>
<form class="form-horizontal" role="form" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">ID User </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id_user" value="<?php echo $edit['id_user']; ?>" >
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Lengkap</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" value="<?php echo $edit['nama']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Level </label>
    <div class="col-sm-5">
     <input type="text" class="form-control" readonly value="<?php echo $edit['level']; ?>">
    </div>
  </div>
<hr/>
<div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="user" value="<?php echo $edit['user']; ?>">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" id="password1"class="form-control" required="required" name="pass" value="<?php echo $edit['pass']; ?>">
    <a class="text-red">*ubah password secara berkala demi menjaga keamanan</a>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Konfirmasi Password</label>
    <div class="col-sm-5">
      <input type="password" id="password2"class="form-control" required="required">    
    </div>
  </div>
  
  <script type="text/javascript">
window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
document.getElementById("password2").setCustomValidity("Passwords Tidak Sama");
else
document.getElementById("password2").setCustomValidity('');}
</script>

  <div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
<button type="submit"name="submit" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>   
    </div>
  </div>   

</form>









<?php	
break;
}
?>
