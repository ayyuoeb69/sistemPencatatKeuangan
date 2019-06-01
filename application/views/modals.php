<main class="main">
	<div class="col-sm-12" style="padding-top: 35px">
		<div class="col-sm-12">
			<h1>
				<i class="nav-icon fa fa-money" style="margin-right:5px"></i> Modal Awal Anda = Rp. <?= $modals->modals ?>
			</h1>  
		</div>
		<div class="col-sm-12" style="margin-bottom:40px">
			<a href="#" data-toggle="modal" data-target="#myModal">
				<button class="btn btn-success"><i class="fa fa-pencil" style="margin-right:5px" ></i>Edit Modal</button>
			</a>
			<br>
		</div>
</main>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Modal</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url() ?>welcome/tambah_modal" method="post">
					<b><label>Modal Awal : </label></b><br>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp. </span>
						</div>
						<input type="text" name="modals" class="form-control" placeholder="Masukkan Modal Awal ( contoh : 10000 )" required>
					</div>
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