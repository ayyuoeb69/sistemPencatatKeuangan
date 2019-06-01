<main class="main">
	<div class="col-sm-12" style="padding-top: 35px">
		<div class="col-sm-12">
			<h1>
				<i class="nav-icon fa fa-pie-chart" style="margin-right:5px"></i> Akumulasi Keuangan Per Bulan <span id="bulan"> </span>
			</h1>  
		</div>
		<div class="form-group">
			<label for="bln">Pilih Bulan:</label>
			<select class="form-control" id="bln">
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
		</div> 
		<div class="form-group">
			<label for="thn">Pilih Tahun:</label>
			<input class="form-control" min="1990" max="2100" type="number" id="thn" name="thn" value="<?php
			$tgl=date('Y');
			echo $tgl;
			?>" >
		</div>
		<br>
		<button class="btn btn-primary" onclick="cari()"><i class="nav-icon fa fa-search" style="margin-right:5px"></i>Cari Data</button>
		<div id="tabel" style="display:none;margin-top:40px">
			
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
				</tr>
			</thead>
			<tbody id="tabbody">

			</tbody>
		</table>
		<br>
		<h4>Total Pendapatan Bulan <span id="bulan2"> </span> = Rp. <span id="tot_pendapatan"> </span></h4>
		<br>
		<h4>Total Pengeluaran Bulan <span id="bulan3"> </span> = Rp. <span id="tot_pengeluaran"> </span></h4>
		<br>
		<h4>Total Profit Bulan <span id="bulan4"> </span> = Rp. <span id="tot_profit"> </span></h4>
		<br>
		<h4>Laba Bulan <span id="bulan5"> </span> = Rp. <span id="laba"> </span></h4>
		<br>
		<div id="cetak">
		</div>
		<br>
		<br>
		</div>
	</div>
</main>
<script type="text/javascript">
	function cari(){
		var bln = document.getElementById('bln').value;
		var thn = document.getElementById('thn').value;
		var tabel = document.getElementById('tabel');
		var tls_bln = document.getElementById('bulan');
		var tls_bln2 = document.getElementById('bulan2');
		var tls_bln3 = document.getElementById('bulan3');
		var tls_bln4 = document.getElementById('bulan4');
		var tls_bln5 = document.getElementById('bulan5');
		$.ajax({
			dataType:'JSON',
			type : 'GET',
			url   : "<?php echo base_url('Welcome/cari_data/');?>",
			success : function(data){
				console.log(data);
				var j =1;
				var htmls;
				var profit;
				var kosong = 0;
				var pendapatan = 0;
				var pengeluaran = 0;
				var profits = 0;
				if(bln == 1){
					var bulan = "Januari" ;
				}else if(bln == 2){
					var bulan = "Februari" ;
				}else if(bln == 3){
					var bulan = "Maret" ;
				}else if(bln == 4){
					var bulan = "April" ;
				}else if(bln == 5){
					var bulan = "Mei" ;
				}else if(bln == 6){
					var bulan = "Juni" ;
				}else if(bln == 7){
					var bulan = "Juli" ;
				}else if(bln == 8){
					var bulan = "Agustus" ;
				}else if(bln == 9){
					var bulan = "September" ;
				}else if(bln == 10){
					var bulan = "Oktober" ;
				}else if(bln == 11){
					var bulan = "November" ;
				}else if(bln == 12){
					var bulan = "Desember" ;
				}
				tls_bln.innerHTML = bulan +' '+ thn;
				tls_bln2.innerHTML = bulan +' '+ thn;
				tls_bln3.innerHTML = bulan +' '+ thn;
				tls_bln4.innerHTML = bulan +' '+ thn;
				tls_bln5.innerHTML = bulan +' '+ thn;
				for(var i=0;i<data.length;i++){
				var parts =data[i].tgl_perhari.split('-');
				if(parts[1] == bln && parts[0] == thn){
				profit = parseInt(data[i].pendapatan)-parseInt(data[i].pengeluaran);
				htmls +=
					'<tr>'+
						'<td style="text-align: center;">'+j+'</td>'+
						'<td>'+data[i].tgl_perhari.split('-').reverse().join('-')+'</td>'+
						'<td>'+data[i].keterangan+'</td>'+
						'<td>'+data[i].referensi+'</td>'+
						'<td>Rp. '+data[i].pendapatan+'</td>'+
						'<td>Rp. '+data[i].pengeluaran+'</td>'+
						'<td>Rp. '+profit+'</td>'+
					'</tr>';
					pendapatan = pendapatan + parseInt(data[i].pendapatan);
					pengeluaran = pengeluaran + parseInt(data[i].pengeluaran);
					profits = profits + profit;
					laba = pendapatan - pengeluaran;
					j++;
					kosong = 1;

				}
			}
			html_link = '<a href="<?= base_url() ?>Welcome/cetak/'+bln+'/'+thn+'">'+
						'<button class="btn btn-warning">'+
						'<i class="nav-icon fa fa-file-pdf-o" style="margin-right:5px"></i>Eksport Data</button>'+
						'</a>';
			if(kosong == 0){
				tabel.style.display = "none";
			}else{
				tabel.style.display = "block";
			}
			$('#tabbody').html(htmls);
			$('#tot_pendapatan').html(pendapatan);
			$('#tot_pengeluaran').html(pengeluaran);
			$('#tot_profit').html(profits);
			$('#laba').html(laba);
			$('#cetak').html(html_link);
			},
			error : function(){
				alert("error");
			}
		});

	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#perhari').DataTable({});
	} );
</script>