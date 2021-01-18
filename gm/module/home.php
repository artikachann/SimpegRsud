<?php
$namaBln = array("1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", 
					 "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
include ("../inc/koneksi.php"); 
include ("../inc/fungsi_hdt");  ?>

<br/>
<div style="margin-right:10%;margin-left:15%" class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><i class="icon fa fa-info"></i>
Welcome <?php echo $_SESSION['nama']; ?>! &nbsp;&nbsp;
Anda berada di halaman "User"
</p>
</div>  
<div class="box box-solid box-warning">
<div class="box-header">
<i class="fa fa-info" ></i>Informasi
</div>
<div class="box-body">

<h4>Hak Akses sebagai User:</h4>
<li>Mengelola data User</li>
<li>Melihat dan mencetak daftar pegawai</li>
<li>Melihat dan mencetak daftar SK</li>

</tr>
</div>
</div><!-- /.row -->