<?php
include "koneksi.php";

$aksi="module/pegawai/pegawai_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER pegawai ------------------------- ---->     
<h3 class="box-title margin text-center">Data Master Pegawai</h3>
<hr/>

  <div class="box box-solid box-danger">
    <div class="box-header">
    <h3 class="btn btn disabled box-title">
    <i class="fa fa-user-md"></i>
    Data Pegawai </h3>
    <a class="btn btn-default pull-right" href="?module=pegawai&aksi=tambah">
    <i class="fa  fa-plus"></i> Tambah Data</a> 
    </div>    
  <div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
<thead>
  <tr class="text-red">
    <th class="col-sm-1">No Pegawai</th>
    <th class="col-sm-1">NIP</th>
    <th class="col-sm-3">Nama Pegawai</th>
    <th class="col-sm-1">JK</th> 
    <th class="col-sm-3">Tempat/Tgl. Lahir</th> 
    <th class="col-sm-1">No. HP</th> 
    <th class="col-sm-1">E-mail</th>
    <th class="col-sm-1">Tgl. Masuk</th>
    <th class="col-sm-1">AKSI</th>
  </tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM pegawai";
$tampil = mysql_query($sql);
$no=1;
while ($data = mysql_fetch_array($tampil)) { 
$Kode = $data['no_pegawai'];?>

  <tr>
  <td><a href="?module=pegawai&aksi=detail_pegawai&no_pegawai=<?php echo $data['no_pegawai'];?>"><?php echo $data['no_pegawai']; ?></a></td>
  <td><?php echo $data['nip']; ?></td>
  <td><?php echo $data['nm_pegawai']; ?></td>
  <td><?php echo $data['jk']; ?></td>
  <td><?php echo $data['tpt_lhr'] .", ". IndonesiaTgl($data['tgl_lhr']); ?></td>
  <td><?php echo $data['no_hp']; ?></td>
  <td><?php echo $data['email']; ?></td>  
  <td><?php echo IndonesiaTgl($data['tgl_msk']); ?></td>
  <td align="center">
  <a class="btn btn-xs btn-info"      data-toggle="tooltip" title="Edit Data <?php echo $data['no_pegawai'];?>" href="?module=pegawai&aksi=edit&no_pegawai=<?php echo $data['no_pegawai'];?>"><i class="glyphicon glyphicon-edit"></i></a>
  <a class="btn btn-xs btn-warning"   data-toggle="tooltip" title="Hapus Semua Data Pegawai" href="<?php echo $aksi ?>?module=pegawai&aksi=hapus&no_pegawai=<?php echo $data['no_pegawai'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>  ?')"> <i class="glyphicon glyphicon-trash"></i></a>
  </td>
  <?php
  }
  ?>
  </tr>
</tbody>
  </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA MASTER pegawai ------------------------- ---->
<?php 
break;
case "tambah": 
?>
<!----- ------------------------- TAMBAH DATA MASTER pegawai ------------------------- ---->
<h3 class="box-title margin text-center">Tambah Data Pegawai Baru</h3>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=pegawai&aksi=tambah" role="form" method="post">             
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Pegawai </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i></a>
    </div>  
  <div class="box-body">
  <div class="form-group">
    <label class="col-sm-4 control-label">No Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_pegawai" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NIP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nip" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_pegawai" placeholder="Nama pegawai">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Tempat/Tgl. Lahir</label>
    <div><div class="col-sm-2">
      <input type="text" class="form-control" required="required" name="tpt_lhr" placeholder="Tempat Lahir">
  </div>
  <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" data-toggle="tooltip" title="Format: yyyy/dd/mm" name="tgl_lhr">
  </div><!-- /.input group -->
  </div></div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
    <input name="jk" class="minimal" type="radio" value="Laki-laki" checked> Laki-laki &nbsp;&nbsp;
    <input name="jk" class="minimal" type="radio" value="Perempuan"> Perempuan
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Agama</label>
    <div class="col-sm-5">  
    <select name="agama" class="form-control"><option> Pilih Agama</option>
  <option name="agama" value="Islam"> Islam </option><option name="agama" value="Kristen Protestan"> Kristen Protestan </option>
  <option name="agama" value="Kristen Katolik"> Katholik </option><option name="agama" value="Hindu"> Hindu </option>
  <option name="agama" value="Budha"> Budha </option>
  </select>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="alamat"></textarea>
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">No HP</label>
    <div class="col-sm-5">
      <input type="number" class="form-control"  name="no_hp" placeholder="08xx xxx xxxx">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">E-mail</label>
    <div class="col-sm-5">
      <input type="email" class="form-control"  name="email" placeholder="">
    </div>
  </div></div></div> 
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-briefcase"></i> Informasi Pekerjaan Pegawai </h3>
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
    <label class="col-sm-4 control-label">Tgl. Masuk</label>
    <div>
  <div class="col-sm-5">
    <div class="input-group">
  <div class="input-group-addon">
            <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required" name="tgl_msk">
  </div></div></div></div>
  <div class="form-group">
    <label class="col-sm-4 control-label">No. SK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" data-toggle="tooltip" title="Nomor SK Baru" value="<?php echo $nextID; ?>"required="required" name="no_sk">
    </div></div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Unit Kerja</label>
    <div class="col-sm-5">
<select name="unit_krj" class="form-control"><option value=" "> -- Pilih Unit Kerja -- </option>

<?php $q = mysql_query ("select * from unit_krj");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_unit_krj']; ?>" 
<?php (@$h['unit_krj']==$k['unit_krj'])?print(" "):print(""); ?>  > <?php echo $k['id_unit_krj']; echo " / ".$k['nm_unit_krj']; ?>
</option> <?php } ?>
</select>
  </div></div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Jabatan</label>
    <div class="col-sm-5">  
<select name="jabatan" class="form-control"><option value=" "> -- Pilih Jabatan -- </option>

<?php $q = mysql_query ("select * from jabatan");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_jabatan']; ?>" 
<?php (@$h['jabatan']==$k['jabatan'])?print(" "):print(""); ?>  > <?php echo $k['id_jabatan']; echo " / ".$k['nm_jabatan']; ?>
</option> <?php } ?>
</select>
    </div></div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Pangkat/ Gol</label>
    <div class="col-sm-5">
<select name="pangkat" class="form-control"><option value=" "> -- Pilih pangkat -- </option>

<?php $q = mysql_query ("select * from pangkat");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_pangkat']; ?>" 
<?php (@$h['pangkat']==$k['pangkat'])?print(" "):print(""); ?>  > <?php echo $k['id_pangkat']; echo " / ".$k['nm_pangkat']; ?>
</option> <?php } ?>
</select>
  </div></div>  
  

<div class="form-group">
    <label class="col-sm-4 control-label">Status Pegawai</label>
    <div class="col-sm-5">
    <input name="status" class="minimal" type="radio" value="aktif" checked> Aktif &nbsp;&nbsp;
    <input name="status" class="minimal" type="radio" value="nonakti"> Nonaktif
    </div></div>    
</div></div>  




<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-mortar-board "></i> Informasi Pendidikan </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div>  
  <div class="box-body">
  <?php
for ($i= 1; $i <= 3; $i++) { ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Jenjang/Nama Sekolah </label>
    <div><div class="col-sm-2">
    <select name="jjg[]" class="form-control">
  <option value=""> Pilih Jenjang</option>  
<?php $q = mysql_query ("select * from jjg");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['nm_jjg']; ?>" 
<?php (@$h['jjg']==$k['jjg'])?print(" "):print(""); ?>  > <?php echo $k['nm_jjg']; ?>
</option> <?php } ?>
  </select>
  </div><div class="col-sm-3">
  <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Sekolah" placeholder="Nama Sekolah"   name="nm_jjg[]">
  </div><div class="col-sm-3">
    <div class="input-group"> <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>
      <input type="text" class="form-control"   data-toggle="tooltip" maxlength="9" title="Format: 2000-2006" placeholder="Tahun"   name="thn_jjg[]">
  </div><!-- /.input group -->
  </div></div></div>
<?php } ?>  
<div class="form-group">
<div id="main">
    <div class="my-form">
            <center>
      <p class="text-box">
                
            </p></center>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        if( 5 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<div class="form-group"><label class="col-sm-3 control-label">Jenjang/Nama Sekolah </label><div><div class="col-sm-2"> <select name="jjg[]" class="form-control"><option value=""> Pilih Jenjang</option> <?php $q = mysql_query ("select * from jjg");while ($k = mysql_fetch_array($q)){ ?><option value="<?php echo $k['nm_jjg']; ?>" <?php (@$h['jjg']==$k['jjg'])?print(" "):print(""); ?> > <?php echo $k['nm_jjg']; ?></option> <?php  } ?>  </select></div><div class="col-sm-3"> <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Sekolah" placeholder="Nama Sekolah" name="nm_jjg[]"> </div><div class="col-sm-3"> <div class="input-group">  <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>  <input type="text" class="form-control"   data-toggle="tooltip" title="Format: 2000-2006" maxlength="9" placeholder="Tahun"   name="thn_jjg[]"></div></div></div>  <a href="#" class="remove-box btn btn-danger btn-sm "><i class="fa fa-remove"> </i></a></div>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.my-form').on('click', '.remove-box', function(){
        $(this).parent().css( 'background-color', '#' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>
</div>
</div></div>  
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-puzzle-piece"></i> Pengalaman Pekerjaan </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a>
 
    </div>  
  <div class="box-body">
<div class="form-group">
    <label class="col-sm-1 control-label"></label>
    <div><div class="col-sm-4">
    <input type="text" class="form-control"  data-toggle="tooltip" title="Pekerjaan" placeholder="Pekerjaan" name="pekerjaan[]">
  </div><div class="col-sm-3">
  <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Perusahaan" placeholder="Nama Perusahaan" name="nm_pt[]">
  </div><div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="text" class="form-control"   data-toggle="tooltip" maxlength="9"title="Format: 2000-2006" placeholder="Tahun" name="thn_krj[]">
  </div><!-- /.input group -->
  </div></div>
  </div>
<div class="form-group">
<div id="main">
    <div class="form-ku">
            <center>
      <p class="text-itan">
                
            </p></center>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.form-ku .ad-box').click(function(){
        var n = $('.text-itan').length + 1;
        if( 5 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<div class="form-group"> <label class="col-sm-1 control-label"></label>    <div><div class="col-sm-4">    <input type="text" class="form-control"  data-toggle="tooltip" title="Pekerjaan" placeholder="Pekerjaan" name="pekerjaan[]">  </div><div class="col-sm-3">  <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Perusahaan" placeholder="Nama Perusahaan" name="nm_pt[]">  </div><div class="col-sm-3">    <div class="input-group"> <div class="input-group-addon">       <i class="fa fa-calendar"> </i>    </div>      <input type="text" class="form-control"   data-toggle="tooltip" maxlength="9"title="Format: 2000-2006" placeholder="Tahun" name="thn_krj[]"> </div>  </div></div>  <a href="#" class="hapus-box btn btn-danger btn-sm "><i class="fa fa-remove"> </i></a></div>');
        box_html.hide();
        $('.form-ku p.text-itan:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.form-ku').on('click', '.hapus-box', function(){
        $(this).parent().css( 'background-color', '#' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>
</div>  
  </div>
</div>

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Keluarga Pegawai </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i></a>
    </div> 
  <?php
  $hasil = mysql_query("SELECT max(id_kel) as terakhir from keluarga"); 
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir']; 
  $lastNoUrut = substr($lastID, 0, 9); 
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = sprintf("%05s",$nextNoUrut);
?>
  <div class="box-body">
  <div class="form-group">
    <label class="col-sm-4 control-label">ID Keluarga</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" data-toggle="tooltip" title="ID Kel" value="<?php echo $nextID; ?>"required="required" name="id_kel">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Keluarga Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_kel" placeholder="Nama keluarga pegawai">
    </div>
  </div>  
   <div class="form-group">
    <label class="col-sm-4 control-label">Tempat/Tgl. Lahir</label>
    <div><div class="col-sm-2">
      <input type="text" class="form-control" required="required" name="tpt_lhr_kel" placeholder="Tempat Lahir Kel">
  </div>
  <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" data-toggle="tooltip" title="Format: yyyy/dd/mm" name="tgl_lhr_kel">
  </div><!-- /.input group -->
  </div></div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
    <input name="jk_kel" class="minimal" type="radio" value="Laki-laki" checked> Laki-laki &nbsp;&nbsp;
    <input name="jk_kel" class="minimal" type="radio" value="Perempuan"> Perempuan
    </div>
  </div>
 <div class="form-group">
    <label class="col-sm-4 control-label">Agama</label>
    <div class="col-sm-5">  
    <select name="agama_kel" class="form-control"><option> Pilih Agama</option>
  <option name="agama_kel" value="Islam"> Islam </option><option name="agama_kel" value="Kristen Protestan"> Kristen Protestan </option>
  <option name="agama_kel" value="Kristen Katolik"> Katholik </option><option name="agama_kel" value="Hindu"> Hindu </option>
  <option name="agama_kel" value="Budha"> Budha </option>
  </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="alamat_kel"></textarea>
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">No HP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_hp_kel" placeholder="no hp keluarga">
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-sm-4 control-label">Hubungan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="hubungan" placeholder="hubungan">
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
  <hr/>
      <button type="submit"name="submit" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>       
    </div>
  </div> 
</form>

<!----- ------------------------- END TAMBAH DATA MASTER pegawai ------------------------- ---->
<?php
break;
case "edit":
$data=mysql_query("select * from pegawai p, sk_krj s where p.no_pegawai=s.no_pegawai and p.no_pegawai='$_GET[no_pegawai]'");
$edit=mysql_fetch_array($data);
?>
<h3 class="box-title margin text-center">Edit Data Pegawai</h3>
<hr/>

<form class="form-horizontal" action="<?php echo $aksi?>?module=pegawai&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Edit Informasi Pegawai </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i></a>
    </div>  
  <div class="box-body">  
  <div class="form-group">
    <label class="col-sm-4 control-label">No Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly value="<?php echo $edit['no_pegawai']; ?>" name="no_pegawai" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nm_pegawai']; ?>" name="nm_pegawai" placeholder="Nama pegawai">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Tempat/Tgl. Lahir</label>
    <div><div class="col-sm-2">
      <input type="text" class="form-control" value="<?php echo $edit['tpt_lhr']; ?>" name="tpt_lhr" placeholder="Tempat Lahir">
  </div>
  <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" value="<?php echo $edit['tgl_lhr']; ?>" data-toggle="tooltip" title="Format: yyyy/dd/mm" name="tgl_lhr">
  </div><!-- /.input group -->
  </div></div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
    <input  class="minimal" name="jk" type="radio" value="Laki-laki" <?php if(($edit['jk'])== "Laki-laki")
        {echo "checked=\"checked\"";};?>/> Laki-laki &nbsp;&nbsp;
    <input class="minimal" name="jk" type="radio" value="Perempuan" <?php if(($edit['jk'])== "Perempuan")
        {echo "checked=\"checked\"";};?>/> Perempuan
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Agama</label>
    <div class="col-sm-5">  
    <select name="agama" class="form-control"><option> Pilih Agama</option>
  <option name="agama" value="Islam" <?php if(($edit['agama'])== "Islam")
        {echo "selected=\"selected\"";};?>> Islam </option>
      <option name="agama" value="Kristen Protestan" <?php if(($edit['agama'])== "Kristen Protestan")
        {echo "selected=\"selected\"";};?>> Kristen Protestan </option>
  <option name="agama" value="Kristen Katolik" <?php if(($edit['agama'])== "Kristen Katolik")
        {echo "selected=\"selected\"";};?>> Kristen Katolik </option>
      <option name="agama" value="Hindu" <?php if(($edit['agama'])== "Hindu")
        {echo "selected=\"selected\"";};?>> Hindu </option>
  <option name="agama" value="Budha" <?php if(($edit['agama'])== "Budha")
        {echo "selected=\"selected\"";};?>> Budha </option>
  </select>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-5">
      <input rowspan="2" class="form-control" value="<?php echo $edit['alamat']; ?>" name="alamat">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">No HP</label>
    <div class="col-sm-5">
      <input type="number" class="form-control"  name="no_hp" value="<?php echo $edit['no_hp']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">E-mail</label>
    <div class="col-sm-5">
      <input type="email" class="form-control"  name="email" value="<?php echo $edit['email']; ?>">
    </div>
  </div></div></div>
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-briefcase"></i> Informasi Pekerjaan Pegawai </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i></a>
    </div>  
  <div class="box-body">
<div class="form-group">
    <label class="col-sm-4 control-label">Tgl. Masuk</label>
    <div>
  <div class="col-sm-5">
    <div class="input-group">
  <div class="input-group-addon">
            <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" value="<?php echo $edit['tgl_msk'];?>" name="tgl_msk">
  </div></div></div></div>
<?php $sql = "SELECT * FROM sk_krj where no_pegawai='$_GET[no_pegawai]' and status_sk='aktif'";
$tampil = mysql_query($sql);
while ($data = mysql_fetch_array($tampil)) {  ?>
  <div class="form-group">
    <label class="col-sm-4 control-label">No. SK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly  value="<?php echo $data['no_sk'];?>" name="no_sk">
    </div></div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Unit Kerja</label>
    <div class="col-sm-5">
<select name="unit_krj" class="form-control">
<option value=" "> -- Pilih Unit Kerja -- </option>
<?php $q = mysql_query ("select * from unit_krj");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_unit_krj']; ?>" <?php if(($k['id_unit_krj'])== ($data['id_unit_krj']))
        {echo "selected=\"selected\"";};?>
<?php (@$h['unit_krj']==$k['unit_krj'])?print(" "):print(""); ?>  > <?php echo $k['id_unit_krj']; echo " / ".$k['nm_unit_krj']; ?>
</option> <?php } ?>
</select>
  </div></div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Jabatan</label>
    <div class="col-sm-5">  
<select name="jabatan" class="form-control">
<option value=" "> -- Pilih Jabatan -- </option>
<?php $q = mysql_query ("select * from jabatan");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_jabatan']; ?>" <?php if(($k['id_jabatan'])== ($data['id_jabatan']))
        {echo "selected=\"selected\"";};?>
<?php (@$h['jabatan']==$k['jabatan'])?print(" "):print(""); ?>  > <?php echo $k['id_jabatan']; echo " / ".$k['nm_jabatan']; ?>
</option> <?php } ?>
</select>
    </div></div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Pangkat / Gol</label>
    <div class="col-sm-5">
<select name="pangkat" class="form-control">
<option value=" "> -- Pilih pangkat -- </option>
<?php $q = mysql_query ("select * from pangkat");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['id_pangkat']; ?>" <?php if(($k['id_pangkat'])== ($data['id_pangkat']))
        {echo "selected=\"selected\"";};?>
<?php (@$h['pangkat']==$k['pangkat'])?print(" "):print(""); ?>  > <?php echo $k['id_pangkat']; echo " / ".$k['nm_pangkat']; ?>
</option> <?php } ?>
</select>
  </div></div>  
    
</div></div>  
<?php } ?>





<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-mortar-board "></i> Informasi Pendidikan </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div>  
  <div class="box-body">

<?php 
// Tampilkan data dari Database
$a = mysql_query("SELECT * FROM pendidikan where no_pegawai='$_GET[no_pegawai]'");
while ($data = mysql_fetch_array($a)) { ?>

<div class="form-group">
    <label class="col-sm-3 control-label">Jenjang/Nama Sekolah </label>
    <div><div class="col-sm-2">
    <select name="jjg[]" class="form-control">
  <option value=""> Pilih Jenjang</option>
  <?php $q = mysql_query ("select * from jjg");
while ($k = mysql_fetch_array($q)){ ?>
<option value="<?php echo $k['nm_jjg']; ?>" <?php if(($k['nm_jjg'])== ($data['jenjang']))
        {echo "selected=\"selected\"";};?>
<?php (@$h['jjg']==$k['jjg'])?print(" "):print(""); ?>  > <?php echo $k['nm_jjg']; ?>
</option> <?php } ?>

  </select>
  </div><div class="col-sm-3">
  <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Sekolah" value="<?php echo $data['nm_pendidikan'];?>"   name="nm_jjg[]">
  <input type="hidden" class="form-control"  value="<?php echo $data['id_pend'];?>"   name="id_pend[]">
  </div><div class="col-sm-3">
    <div class="input-group"> <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>
      <input type="text" class="form-control"   data-toggle="tooltip" title="Format: 2000-2006" maxlength="9"value="<?php echo $data['thn_pend'];?>"   name="thn_jjg[]">
  </div><!-- /.input group -->
  </div></div>
  <a class="hapus-box btn btn-danger btn-sm"   data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=pegawai&aksi=hapus_pend&id_pend=<?php echo $data['id_pend'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>  ?')"> <i class="glyphicon glyphicon-trash"></i></a>
  </div>

<?php } ?>
  
<div class="form-group">
<div id="main">
    <div class="my-form">
            <center>
      <p class="text-box">
                
            </p></center>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        if( 5 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<div class="form-group"><label class="col-sm-3 control-label">Jenjang/Nama Sekolah </label><div><div class="col-sm-2"> <select name="add_jjg[]" class="form-control"><option> Pilih Jenjang</option>  <?php $q = mysql_query ("select * from jjg");while ($k = mysql_fetch_array($q)){ ?><option value="<?php echo $k['nm_jjg']; ?>" <?php (@$h['jjg']==$k['jjg'])?print(" "):print(""); ?> > <?php echo $k['nm_jjg']; ?></option> <?php  } ?>  </select></div><div class="col-sm-3"> <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Sekolah" Placeholder="Nama Sekolah" name="add_nm_jjg[]"> </div><div class="col-sm-3"> <div class="input-group">  <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>  <input type="text" class="form-control"   data-toggle="tooltip" title="Format: 2000-2006" maxlength="9"placeholder="Tahun"   name="add_thn_jjg[]"></div></div></div>  <a href="#" class="remove-box btn btn-danger btn-sm "><i class="fa fa-remove"> </i></a></div>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.my-form').on('click', '.remove-box', function(){
        $(this).parent().css( 'background-color', '#' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>
</div>
</div></div>  
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-puzzle-piece"></i> Pengalaman Pekerjaan </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a>
 
    </div>  
  <div class="box-body">
<?php 
// Tampilkan data dari Database
$a = mysql_query("SELECT * FROM pengalaman_krj where no_pegawai='$_GET[no_pegawai]'");
while ($data = mysql_fetch_array($a)) { ?>

<div class="form-group">
    <label class="col-sm-1 control-label"></label>
    <div><div class="col-sm-4">
  <input type="text" class="form-control"  data-toggle="tooltip" value="<?php echo $data['nm_krj'];?>"   name="pekerjaan[]">
  <input type="hidden" class="form-control"  value="<?php echo $data['id_peng_krj'];?>"   name="ids[]">
  </div>
  <div class="col-sm-3">
  <input type="text" class="form-control"  data-toggle="tooltip" value="<?php echo $data['nm_pt'];?>"   name="nm_pt[]">
  </div>
  <div class="col-sm-3">
    <div class="input-group"> <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>
      <input type="text" class="form-control"   data-toggle="tooltip" maxlength="9"title="Format: 2000-2006" value="<?php echo $data['thn_krj'];?>"   name="thn_krj[]">
  </div><!-- /.input group -->
  </div></div>
  <a class="hapus-box btn btn-danger btn-sm"   data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=pegawai&aksi=hapus_peng_krj&id_peng_krj=<?php echo $data['id_peng_krj'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>  ?')"> <i class="glyphicon glyphicon-trash"></i></a></div> 

<?php } ?>
  <div class="form-group">
<div id="main">
    <div class="form-ku">
            <center>
      <p class="text-itan">
                
            </p></center>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.form-ku .ad-box').click(function(){
        var n = $('.text-itan').length + 1;
        if( 5 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<div class="form-group"> <label class="col-sm-1 control-label"></label>    <div><div class="col-sm-4">    <input type="text" class="form-control"  data-toggle="tooltip" title="Pekerjaan" placeholder="Pekerjaan" name="add_pekerjaan[]">  </div><div class="col-sm-3">  <input type="text" class="form-control"  data-toggle="tooltip" title="Nama Perusahaan" placeholder="Nama Perusahaan" name="add_nm_pt[]">  </div><div class="col-sm-3">    <div class="input-group"> <div class="input-group-addon">       <i class="fa fa-calendar"> </i>    </div>      <input type="text" class="form-control"   data-toggle="tooltip" title="Format: 2000-2006"maxlength="9" placeholder="Tahun" name="add_thn_krj[]"> </div>  </div></div>  <a href="#" class="hapus-box btn btn-danger btn-sm "><i class="fa fa-remove"> </i></a></div>');
        box_html.hide();
        $('.form-ku p.text-itan:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.form-ku').on('click', '.hapus-box', function(){
        $(this).parent().css( 'background-color', '#' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>
</div>  
  </div>
</div> 

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Keluarga Pegawai </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i></a>
    </div>  
  <div class="box-body">  
  <?php 
// Tampilkan data dari Database
$a = mysql_query("SELECT * FROM keluarga where no_pegawai='$_GET[no_pegawai]'");
while ($data = mysql_fetch_array($a)) { ?>
  <div class="form-group">
    <label class="col-sm-4 control-label">ID Keluarga</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $data['id_kel']; ?>"  >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Keluarga Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $data['nm_kel']; ?>" >
    </div></div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Tempat/Tgl. Lahir</label>
    <div><div class="col-sm-2">
      <input type="text" class="form-control" value="<?php echo $data['tpt_lhr_kel']; ?>" >
  </div>
  <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" value="<?php echo $data['tgl_lhr_kel']; ?>" data-toggle="tooltip" title="Format: yyyy/dd/mm" name="tgl_lhr">
  </div><!-- /.input group -->
  </div></div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
    <input  class="minimal" name="jk_kel" type="radio" value="Laki-laki" <?php if(($data['jk_kel'])== "Laki-laki")
        {echo "checked=\"checked\"";};?>/> Laki-laki &nbsp;&nbsp;
    <input class="minimal" name="jk_kel" type="radio" value="Perempuan" <?php if(($data['jk_kel'])== "Perempuan")
        {echo "checked=\"checked\"";};?>/> Perempuan
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Agama</label>
    <div class="col-sm-5">  
    <select name="agama_kel" class="form-control"><option> Pilih Agama</option>
  <option name="agama_kel" value="Islam" <?php if(($data['agama_kel'])== "Islam")
        {echo "selected=\"selected\"";};?>> Islam </option>
      <option name="agama_kel" value="Kristen Protestan" <?php if(($data['agama_kel'])== "Kristen Protestan")
        {echo "selected=\"selected\"";};?>> Kristen Protestan </option>
  <option name="agama_kel" value="Kristen Katolik" <?php if(($data['agama_kel'])== "Kristen Katolik")
        {echo "selected=\"selected\"";};?>> Kristen Katolik </option>
      <option name="agama_kel" value="Hindu" <?php if(($data['agama_kel'])== "Hindu")
        {echo "selected=\"selected\"";};?>> Hindu </option>
  <option name="agama_kel" value="Budha" <?php if(($data['agama_kel'])== "Budha")
        {echo "selected=\"selected\"";};?>> Budha </option>
  </select>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-5">
      <input rowspan="2" class="form-control" value="<?php echo $data['alamat_kel']; ?>">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Nomor HP</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" value="<?php echo $data['no_hp_kel']; ?>">
  </div></div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Hubungan Keluarga Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $data['hubungan']; ?>" >
    </div>
  </div></div>
</div> <?php } ?>
  
  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
  <hr/>
<button type="submit"name="submit" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <i>Reset</i></button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>       
    </div>
  </div>
</form>
 
 
<!----- ------------------------- END EDIT DATA MASTER pegawai ------------------------- ---->
<?php
break;

case "detail_pegawai":
?>
<center>
<h3> Data Pegawai </h3>
</center>

<form class="form-horizontal" action="<?php echo $aksi?>?module=pegawai&aksi=edit" role="form" method="post">             
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
  <li class="active"><a class="text-red" href="#data" data-toggle="tab">Info Pegawai</a></li>
  <li><a class="text-red" href="#data1" data-toggle="tab">Info Pekerjaan</a></li>
  <li><a class="text-red" href="#data2" data-toggle="tab">Info Pendidikan</a></li>
  <li><a class="text-red" href="#data3" data-toggle="tab">Pengalaman Kerja</a></li>
  <li><a class="text-red" href="#data4" data-toggle="tab">Info Keluarga Pegawai</a></li>
</ul>
 <!-- <li><a href="javascript:history.back()" class="btn btn-sm btn-primary pull-right"><i class="fa fa-backward"></i> Kembali</a>   </li> -->
<div class="tab-content">
<div class="tab-pane active" id="data">
<section id="new">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Pegawai </h3>
<div class="pull-right">
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div>  </div>  
  <div class="box-body">
<?php 
$data=mysql_query("select * from pegawai where no_pegawai='$_GET[no_pegawai]'");
$edit=mysql_fetch_array($data);
?>  
  <div class="form-group">
    <label class="col-sm-4 control-label">No Pegawai </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled name="no_pegawai" value="<?php echo $edit['no_pegawai']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled name="nama" value="<?php echo $edit['nm_pegawai']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" disabled  value="<?php echo $edit['jk'];  ?>">
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-4 control-label">Tempat/Tgl. Lahir</label>
    <div><div class="col-sm-5">
      <input type="text" class="form-control" disabled name="tpt_lhr" value="<?php echo $edit['tpt_lhr']; echo ", ".Indonesia2Tgl ($edit['tgl_lhr']); ?>">
  </div>
  </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-5">
      <textarea rowspan="2" disabled class="form-control" name="alamat"><?php echo $edit['alamat']; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">No HP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $edit['no_hp']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">E-mail</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $edit['email']; ?>">
    </div></div> </div></div></section></div>
<div class="tab-pane" id="data1">
<section id="new1">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-briefcase"></i> Informasi Pekerjaan Pegawai </h3>
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div>  
  <div class="box-body">
<?php $d=mysql_query("select * from sk_krj s, unit_krj u, pangkat x, jabatan j where s.id_jabatan=j.id_jabatan and s.id_pangkat=x.id_pangkat and s.id_unit_krj=u.id_unit_krj and no_pegawai='$_GET[no_pegawai]' and s.status_sk='aktif'");
$e=mysql_fetch_array($d);
?>  
<div class="form-group">
    <label class="col-sm-4 control-label">Tgl Masuk</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo Indonesia2Tgl($edit['tgl_msk']); ?>">
    </div></div>  
<div class="form-group">
    <label class="col-sm-4 control-label">No SK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['no_sk']; ?>">
    </div></div>  
<div class="form-group">
    <label class="col-sm-4 control-label">Unit Kerja</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nm_unit_krj']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">Jabatan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nm_jabatan']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Pangkat / Gol </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nm_pangkat']; ?>">
    </div></div>
</div></div></section></div>




<div class="tab-pane" id="data2">
<section id="new2"> 
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-mortar-board "></i> Informasi Pendidikan </h3>
<div class="pull-right">
  <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div></div>  
  <div class="box-body">
  <?php 
// Tampilkan data dari Database
$sqll = "SELECT * FROM pendidikan where no_pegawai='$_GET[no_pegawai]'";
$tampill = mysql_query($sqll);
$no=1;
while ($dat = mysql_fetch_array($tampill)) { ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Jenjang/Nama Sekolah </label>
    <div><div class="col-sm-2">
  <input type="text" class="form-control" disabled value="<?php echo $dat['jenjang']; ?>" >
  </div><div class="col-sm-4">
  <input type="text" class="form-control" disabled value="<?php echo $dat['nm_pendidikan']; ?>" >
  </div><div class="col-sm-3">
    <div class="input-group"> <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>
      <input type="text" class="form-control"  disabled value="<?php echo $dat['thn_pend']; ?>" >
  </div><!-- /.input group -->
  </div></div></div>
<?php } ?>

  </div></div></section></div>
<div class="tab-pane" id="data3">
<section id="new">  
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-puzzle-piece"></i> Pengalaman Kerja </h3>
<div class="pull-right">  
  <a class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div></div>
  <div class="box-body"> 
<?php 
// Tampilkan data dari Database
$sq = "SELECT * FROM pengalaman_krj where no_pegawai='$_GET[no_pegawai]'";
$tampi = mysql_query($sq);
while ($da = mysql_fetch_array($tampi)) { 

?>
<div class="form-group">
<label class="col-sm-1 control-label"></label>
    <div><div class="col-sm-4">
  <input type="text" class="form-control" disabled value="<?php echo $da['nm_krj']; ?>" >
  </div><div class="col-sm-3">
  <input type="text" class="form-control" disabled value="<?php echo $da['nm_pt']; ?>" >
  </div><div class="col-sm-3">
    <div class="input-group"> <div class="input-group-addon">  <i class="fa fa-calendar"> </i>    </div>
      <input type="text" class="form-control"  disabled value="<?php echo $da['thn_krj']; ?>" >
  </div><!-- /.input group -->
  </div></div></div>
<?php } ?>  
  </div></div></section></div>

<div class="tab-pane" id="data4">
<section id="new">  
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-puzzle-piece"></i> Informasi Keluarga </h3>
<div class="pull-right">  
  <a class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
  <i class="fa fa-minus"></i>
  </a></div></div>
  <div class="box-body"> 

  <?php 
$data=mysql_query("select * from keluarga where no_pegawai='$_GET[no_pegawai]'");
$edit=mysql_fetch_array($data);
?>  
  
  <div class="form-group">
    <label class="col-sm-4 control-label">ID Keluarga </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled name="id_kel" value="<?php echo $edit['id_kel']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama keluarga pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled name="nm_kel" value="<?php echo $edit['nm_kel']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis kelamin</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" disabled  value="<?php echo $edit['jk_kel'];  ?>">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">Tempat/Tgl. Lahir</label>
    <div><div class="col-sm-5">
      <input type="text" class="form-control" disabled name="tpt_lhr_kel" value="<?php echo $edit['tpt_lhr_kel']; echo ", ".Indonesia2Tgl ($edit['tgl_lhr_kel']); ?>">
  </div>
  </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Alamat Keluarga</label>
    <div class="col-sm-5">
      <textarea rowspan="2" disabled class="form-control" name="alamat_kel"><?php echo $edit['alamat_kel']; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nomor HP Keluarga</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $edit['no_hp_kel']; ?>">
    </div></div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Hubungan Keluarga Pegawai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled name="hubungan" value="<?php echo $edit['hubungan']; ?>">
    </div>
  </div>
 </div></div></section></div>


</form>

<?php
break;
} 
?>

</div></div>