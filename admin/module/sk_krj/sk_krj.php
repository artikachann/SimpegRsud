<?php


$aksi="module/sk_krj/sk_krj_aksi.php";

switch($_GET[aksi]){
default:
?>

	
<h3 class="box-title margin text-center">Data SK Kerja Pegawai</h3>
<center> <div class="batas"> </div></center>
<hr/>
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
	<li class="active"><a class="text-red" href="#dat" data-toggle="tab">SK Kerja</a></li>
	<li><a class="text-red" href="#dat1" data-toggle="tab">Riwayat SK Kerja</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="dat">
<section id="new">
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-briefcase"></i>
		Daftar SK Kerja Aktif </h3>		
		</div>		
	<div class="box-body">
	<table id="example1" class="table table-bordeblue table-striped">
<thead>
	<tr class="text-red">
		<th>No. SK</th>
		<th>No Pegawai</th>
		<th>Nama Pegawai</th> 
		<th class="col-sm-1">Tgl. SK</th> 
		 
		<th class="col-sm-2">Unit Kerja</th> 
		<th class="col-sm-2">Jabatan</th>
		<th>Pangkat / Gol</th>
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM sk_krj a, pegawai b, jabatan c, pangkat d, unit_krj e where a.no_pegawai=b.no_pegawai and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_krj=e.id_unit_krj and a.status_sk='aktif'";
$tampil = mysql_query($sql);
$no=1;
while ($k = mysql_fetch_array($tampil)) { 
$Kode = $k['no_sk'];
$msk=IndonesiaTgl($k['tgl_msk']);
?>

	<tr>	
	<td><?php echo $k['no_sk']; ?></a></td>
	<td><a target="blank"href="?module=pegawai&aksi=detail_pegawai&no_pegawai=<?php echo $k['no_pegawai'];?>"><?php echo $k['no_pegawai']; ?></a></td>
	<td><?php echo $k['nm_pegawai']; ?></td>
	<td><?php echo IndonesiaTgl($k['tgl_sk']); ?></td>	
	
	<td><?php echo $k['nm_unit_krj']; ?></td>
	<td><?php echo $k['nm_jabatan']; ?></td>
	<td><?php echo $k['nm_pangkat']; ?></td>
	

	<td align="center">
	<a  class="btn btn-xs btn-info" href="?module=sk_krj&aksi=edit&no_sk=<?php echo $k['no_sk'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>	
	<a  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=sk_krj&aksi=hapus&no_sk=<?php echo $k['no_sk'];?>" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</section>
</div>

<div class="tab-pane" id="dat1">
<section id="new1">
<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-briefcase"></i>
		Daftar Riwayat Kerja </h3>			
		</div>		
	<div class="box-body">
	<table id="example1" class="table table-bordeblue table-striped">
<thead>
	<tr class="text-red">
		<th>No. SK</th>
		<th>No Pegawai</th>
		<th>Nama Pegawai</th> 
		<th class="col-sm-1">Tgl. SK</th> 
		
		<th class="col-sm-2">Unit Kerja</th> 
		<th class="col-sm-2">Jabatan</th>
		<th>Pangkat / Gol</th>
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM sk_krj a, pegawai b, jabatan c, pangkat d, unit_krj e where a.no_pegawai=b.no_pegawai and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_krj=e.id_unit_krj and a.status_sk='nonaktif'";
$tampil = mysql_query($sql);
$no=1;
while ($k = mysql_fetch_array($tampil)) { 
$Kode = $k['no_sk'];?>

	<tr>	
	<td><?php echo $k['no_sk']; ?></a></td>
	<td><a target="blank"href="?module=pegawai&aksi=detail_pegawai&no_pegawai=<?php echo $k['no_pegawai'];?>"><?php echo $k['no_pegawai']; ?></a></td>
	<td><?php echo $k['nm_pegawai']; ?></td>
	<td><?php echo IndonesiaTgl($k['tgl_sk']); ?></td>	
	<td><?php echo $k['nm_unit_krj']; ?></td>
	<td><?php echo $k['nm_jabatan']; ?></td>
	<td><?php echo $k['nm_pangkat']; ?></td>

	<td align="center">	
	<a class="btn btn-xs btn-danger" href="<?php echo $aksi ?>?module=sk_krj&aksi=hapus&no_sk=<?php echo $k['no_sk'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</section>
</div>

</div>
<!----- ------------------------- END MENAMPILKAN DATA MASTER sk_krj ------------------------- ---->
<?php 
break;
case "edit" :

?>
<!----- ------------------------- EDIT DATA MASTER sk_krj ------------------------- ---->
<h3 class="box-title margin text-center">"Pengubahan(Kenaikan atau Penurunan) SK Kerja"</h3>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=sk_krj&aksi=edit" role="form" method="post">             
<div class="row">
<div class="col-md-6">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-briefcase"></i> SK Kerja Lama </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
<?php $d=mysql_query("select * from sk_krj s, unit_krj u, pangkat x, jabatan j where s.id_jabatan=j.id_jabatan and s.id_pangkat=x.id_pangkat and s.id_unit_krj=u.id_unit_krj and s.no_sk='$_GET[no_sk]' and s.status_sk='aktif'");
$e=mysql_fetch_array($d);
?>
<div class="form-group">
    <label class="col-sm-4 control-label">No Pegawai</label>
    <div class="col-sm-7">
	  <input type="text" class="form-control" readonly name="no_pegawai" value="<?php echo $e['no_pegawai'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pegawai</label>
    <div class="col-sm-7">
	<?php 
	$s=mysql_fetch_array(mysql_query("select nm_pegawai from pegawai where no_pegawai='$e[no_pegawai]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nm_pegawai'];?>">
    </div>
  </div>	
<!--style="background:url(img/lol.gif);align:center;"-->
  <hr />  
<div class="form-group">
    <label class="col-sm-4 control-label">No. SK</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" readonly name="no_sk_lm" value="<?php echo $e['no_sk']; ?>">
    </div></div> 	
<div class="form-group">
    <label class="col-sm-4 control-label">Tgl SK</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" disabled value="<?php echo IndonesiaTgl($e['tgl_sk']); ?>">
    </div></div> 		
<div class="form-group">
    <label class="col-sm-4 control-label">Unit Kerja</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" disabled value="<?php echo $e['nm_unit_krj']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">Jabatan </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" disabled value="<?php echo $e['nm_jabatan']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Pangkat / Gol </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" disabled value="<?php echo $e['nm_pangkat']; ?>">
    </div></div>
</div></div>	 	
</div>
<div class="col-md-6">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-briefcase"></i> SK Kerja Baru </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>
<?php
  $hasil = mysql_query("SELECT max(no_sk) as terakhir from sk_krj"); 
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir']; 
  $lastNoUrut = substr($lastID, 0, 20); 
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "SK/".sprintf("%09s",$nextNoUrut);
?>
	<div class="box-body">
<div class="form-group">
    <label class="col-sm-4 control-label">No. SK</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" data-toggle="tooltip" title="Nomor SK Baru" value="<?php echo $nextID; ?>"required="required" name="no_sk">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Tgl. SK</label>
    <div>
	<div class="col-sm-7">
	  <div class="input-group">
	<div class="input-group-addon">
            <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required" name="tgl_sk">
	</div></div></div></div>	
    <div class="form-group">
    <label class="col-sm-4 control-label">Unit Kerja</label>
    <div class="col-sm-7">
<select name="unit_krj" class="form-control">
<option value=" "> -- Pilih Unit Kerja -- </option>
<?php $q = mysql_query ("select * from unit_krj");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_unit_krj']; ?>" 
<?php (@$h['unit_krj']==$k['unit_krj'])?print(" "):print(""); ?>	> <?php echo $k['nm_unit_krj']; ?>
</option> <?php	} ?>
</select>
  </div></div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Jabatan</label>
    <div class="col-sm-7">	
<select name="jabatan" class="form-control">
<option value=" "> -- Pilih Jabatan -- </option>
<?php $q = mysql_query ("select * from jabatan");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_jabatan']; ?>" 
<?php (@$h['jabatan']==$k['jabatan'])?print(" "):print(""); ?>	> <?php echo $k['nm_jabatan']; ?>
</option> <?php	} ?>
</select>
    </div></div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Pangkat / Gol</label>
    <div class="col-sm-7">
<select name="pangkat" class="form-control">
<option value=" "> -- Pilih pangkat -- </option>
<?php $q = mysql_query ("select * from pangkat");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_pangkat']; ?>" 
<?php (@$h['pangkat']==$k['pangkat'])?print(" "):print(""); ?>	> <?php echo $k['nm_pangkat']; ?>
</option> <?php	} ?>
</select>
  </div></div>  
  
</div></div>	
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
      <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=cancel">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Cancel</button></a>	
    </div>

</div>
</div>
  </form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER sk_krj ------------------------- ---->
<?php
break;
}
?>

