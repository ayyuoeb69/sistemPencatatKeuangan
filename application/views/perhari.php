<main class="main">
	<div class="col-sm-12" style="padding-top: 35px">
		<div class="col-sm-6">
			<h1>
				<i class="nav-icon fa fa-money" style="margin-right:5px"></i> Transaksi Per Hari
			</h1>  
		</div>
		<div class="col-sm-6" style="margin-bottom:40px">
			<a href="#" data-toggle="modal" data-target="#myModal">
				<button class="btn btn-success"><i class="fa fa-plus" style="margin-right:5px" ></i>Tambah Data</button>
			</a>
			<a href="<?= base_url('Excel/export_perhari') ?>">
				<button class="btn btn-warning"><i class="fa fa-file-excel-o" style="margin-right:5px" ></i>Export Data</button>
			</a>
			<br>
		</div>
		<table id="perhari" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th>Referensi</th>
					<th>Pendapatan</th>
					<th>Pengeluaran</th>
					<th>Profit</th>
					<th>Saldo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$l =count($tampil);
					$m = count($tampil);
					$saldo[$l] = 0; 
					$i = 1;

					for($k = count($tampil)-1; $k >= 0 ; $k-- ){
						$saldo[$k] = (  $saldo[$k+1] + $tampil[$k]->pendapatan ) - $tampil[$k]->pengeluaran;
						$m--;
					}
					for($j = 0; $j < count($tampil); $j++ ){
					
				 ?>
				<tr>
					<td style="text-align: center;"><?= $i; ?></td>
					<td><?= date('d M Y', strtotime($tampil[$j]->tgl_perhari)) ?></td>
					<td><?= $tampil[$j]->keterangan; ?></td>
					<td><?= $tampil[$j]->referensi; ?></td>
					<td>Rp. <?= $tampil[$j]->pendapatan; ?></td>
					<td>Rp. <?= $tampil[$j]->pengeluaran; ?></td>
					<td>Rp. <?= $tampil[$j]->pendapatan - $tampil[$j]->pengeluaran; ?></td>
					<td>Rp. <?= $saldo[$j]; ?></td>
					<td>
						<a href="<?= base_url('Welcome/edit_perhari/'.$tampil[$j]->id_perhari) ?>">
						<button class="btn btn-primary"><i class="fa fa-pencil" style="margin-right:5px"></i>Edit</button>
						</a>
						<br>
						<br>
						<a href="<?= base_url('Welcome/hapus_perhari/'.$tampil[$j]->id_perhari) ?>">
						<button class="btn btn-danger"><i class="fa fa-trash" style="margin-right:5px"></i>Hapus</button>
						</a>
					</td>
				</tr>
			<?php $i++;} ?>
			</tbody>
		</table>
	</div>      
</main>
<script type="text/javascript">
	$(document).ready(function() {
		$('#perhari').DataTable({});
	} );
</script>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url() ?>welcome/tambah_perhari" method="post">
					<b><label>Keterangan : </label></b><br>
					<div class="input-group">
						<input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
					</div>
					<br>
					<br>
					<b><label>Referensi : </label></b><br>
					<div class="input-group">
						<input type="text" name="referensi" class="form-control" placeholder="Masukkan Referensi" required>
					</div>
					<br>
					<br>
					<b><label>Pendapatan : </label></b><br>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp. </span>
						</div>
						<input type="text" name="pendapatan" class="form-control" placeholder="Masukkan Besaran Pendapatan ( contoh : 10000 )" required>
					</div>
					<br>
					<br>
					<b><label>Pengeluaran : </label></b><br>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp. </span>
						</div>
						<input type="text" name="pengeluaran" class="form-control" placeholder="Masukkan Besaran Pengeluaran ( contoh : 10000 )" required>
					</div>
					<br>
					<br>
					<b><label>Tanggal : </label></b><br>
					<div class="input-group">
						<input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal" required>
					</div>
					<br>
					<br>
					<br>
					<button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>Simpan</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>