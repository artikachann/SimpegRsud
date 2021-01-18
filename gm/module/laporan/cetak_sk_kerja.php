<?php 
include "head.php";
?>
          <section class="content-header">
            <h1>
             Laporan
              <small>SK Kerja Pegawai</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
              <li class="active">SK Kerja</li>
            </ol>
          </section>

           
          <section class="content">
            <div class="text-center">
			<h3><img src="inc/logo.jpg" width="60px" height="60px"/></h3>
			<b>Jalan Gatot Subroto No. 41, Bojongbata <br/>
			Pemalang, Jawa Tengah 52319</b>
			</div><br/>
             
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title center">Daftar SK Kerja Pegawai</h3>
				<span class="pull-right">				
				Pemalang, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
              <div class="box-body">
                <table  class="table table-bordered table-striped">
<thead>
	<tr >
		<th>No. SK</th>
		<th>Nomor Pegawai</th>
		<th>NIP</th>
		<th>Nama Pegawai</th> 
		<th>Tgl. SK</th> 
		<th>Unit Kerja</th> 
		<th>Jabatan</th>	
		<th>Pangkat / Gol</th>	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM sk_krj a, pegawai b, jabatan c, pangkat d, unit_krj e where a.no_pegawai=b.no_pegawai and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_krj=e.id_unit_krj and a.status_sk='aktif' order by a.tgl_sk";
$tampil = mysql_query($sql);
$no=1;

while ($k = mysql_fetch_array($tampil)) { 
$Kode = $k['no_sk'];
$msk=IndonesiaTgl($k['tgl_msk']);
?>

	<tr>	
	<td><?php echo $k['no_sk']; ?></a></td>
	<td><?php echo $k['no_pegawai']; ?></a></td>
	<td><?php echo $k['nip']; ?></td>
	<td><?php echo $k['nm_pegawai']; ?></td>
	<td><?php echo IndonesiaTgl($k['tgl_sk']); ?></td>	
	<td><?php echo $k['nm_unit_krj']; ?></td>
	<td><?php echo $k['nm_jabatan']; ?></td>
	<td><?php echo $k['nm_pangkat']; ?></td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>	
              </div><!-- /.box-body -->
            </div>
          </section><!-- /.content -->

<?php
include "tail.php";?>