<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Print Laporan Keuangan</title>

	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/js/jque.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<style type="text/css">
	table,th,td{
		border:0.5px solid #555;
	}
</style>
</head>
<body>
	<div class="container" style="padding-bottom: 40px">
		<div class="row">
			<div class="col-sm-12">
				<?php
				if($bln == 1){
					$bulan = "Januari" ;
				}else if($bln == 2){
					$bulan = "Februari" ;
				}else if($bln == 3){
					$bulan = "Maret" ;
				}else if($bln == 4){
					$bulan = "April" ;
				}else if($bln == 5){
					$bulan = "Mei" ;
				}else if($bln == 6){
					$bulan = "Juni" ;
				}else if($bln == 7){
					$bulan = "Juli" ;
				}else if($bln == 8){
					$bulan = "Agustus" ;
				}else if($bln == 9){
					$bulan = "September" ;
				}else if($bln == 10){
					$bulan = "Oktober" ;
				}else if($bln == 11){
					$bulan = "November" ;
				}else if($bln == 12){
					$bulan = "Desember" ;
				}
				?>
				<h1 class="jdl-relawan" style="color: #19aac6">Laporan Keuangan Bulan <?= $bulan ?> Tahun <?= $thn ?></h1>
				<hr style="border:1px solid">
			</div>

			<div class="col-sm-12" style="padding-top: 30px">
				<table style="table-layout:fixed;width: 820px">
					<thead>
						<tr>
							<th style="color: #18525d;vertical-align: middle;width:20px; word-wrap:break-word;">No</th>
							<th style="color: #18525d;vertical-align: middle;width:90px; word-wrap:break-word;">Tanggal</th>
							<th style="color: #18525d;vertical-align: middle;width:160px; word-wrap:break-word;">Keterangan</th>
							<th style="color: #18525d;vertical-align: middle;width:110px; word-wrap:break-word;">Referensi </th>
							<th style="color: #18525d;vertical-align: middle;width:110px; word-wrap:break-word;" >Pendapatan </th>
							<th style="color: #18525d;vertical-align: middle;width:110px; word-wrap:break-word;">Pengeluaran</th>
							<th style="color: #18525d;vertical-align: middle;width:130px; word-wrap:break-word;">Profit</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; $pendapatan = 0;$pengeluaran = 0;$profit = 0; foreach ($tampil as $d) {
							if(date('m', strtotime($d->tgl_perhari)) == $bln && date('Y', strtotime($d->tgl_perhari)) == $thn){
								?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= date('d M Y', strtotime($d->tgl_perhari))  ?></td>
									<td><?= $d->keterangan ?></td>
									<td><?= $d->referensi ?></td>
									<td>Rp. <?= $d->pendapatan ?></td>
									<td>Rp. <?= $d->pengeluaran ?></td>
									<td>Rp. <?= $d->pendapatan - $d->pengeluaran ?></td>
								</tr>
								<?php 
								$pendapatan = $pendapatan + $d->pendapatan;
								$pengeluaran = $pengeluaran + $d->pengeluaran;
								$profit = $profit + ($d->pendapatan - $d->pengeluaran);

								 $i++;
							} 
						}?>
					</tbody>
				</table>
				<br>
				<br>
				<h4>Total Pendapatan Bulan <?= $bulan ?> Tahun <?= $thn ?> = Rp. <?= $pendapatan ?></h4>
				<br>
				<h4>Total Pengeluaran Bulan <?= $bulan ?> Tahun <?= $thn ?> = Rp. <?= $pengeluaran ?></h4>
				<br>
				<h4>Total Profit Bulan <?= $bulan ?> Tahun <?= $thn ?> = Rp.  <?= $profit ?></h4>
				<br>
				<h4>Laba Bulan <?= $bulan ?> Tahun <?= $thn ?> = Rp.  <?= $pendapatan-$pengeluaran ?></h4>
				<br>
				<hr>
			</div>
		</div>
	</div>
	<h5 style="color:#6C6D8A;text-align: center;margin-bottom:10px"><?= date("l jS \of F Y h:i:s A") ?></h5>
