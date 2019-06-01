<main class="main">
	<div class="col-sm-12" style="padding-top: 35px">
		<div class="col-sm-12">
			<h1>
				<i class="nav-icon fa fa-money" style="margin-right:5px"></i> Edit Transaksi
			</h1>  
		</div>
		<form action="<?php echo base_url('Welcome/proses_edit_perhari/'.$tampil->id_perhari) ?>" method="post">
			<b><label>Keterangan : </label></b><br>
			<div class="input-group">
				<input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" value="<?= $tampil->keterangan ?>" required>
			</div>
			<br>
			<br>
			<b><label>Referensi : </label></b><br>
			<div class="input-group">
				<input type="text" name="referensi" class="form-control" placeholder="Masukkan Referensi" value="<?= $tampil->referensi ?>" required>
			</div>
			<br>
			<br>
			<b><label>Pendapatan : </label></b><br>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Rp. </span>
				</div>
				<input type="text" name="pendapatan" class="form-control" placeholder="Masukkan Besaran Pendapatan ( contoh : 10000 )" value="<?= $tampil->pendapatan ?>" required>
			</div>
			<br>
			<br>
			<b><label>Pengeluaran : </label></b><br>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Rp. </span>
				</div>
				<input type="text" name="pengeluaran" class="form-control" placeholder="Masukkan Besaran Pengeluaran ( contoh : 10000 )" value="<?= $tampil->pengeluaran ?>" required>
			</div>
			<br>
			<br>
			<b><label>Tanggal : </label></b><br>
			<div class="input-group">
				<input type="date" name="tanggal" value="<?= $tampil->tgl_perhari ?>" class="form-control" placeholder="Masukkan Tanggal" required>
			</div>
			<br>
			<br>
			<button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>EDIT</button>
			<br>
		</form>
	</div>
</main>