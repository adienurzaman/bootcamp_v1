<?php
include "./config/koneksi.php";

$modul = $_GET['modul'];
$act = $_GET['act'];

$aksi = "views/modul/mod_user/aksi_user.php";
?>
<section class="content">
	<div class="container-fluid">
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-12 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-user"></i>
							<?php 
							echo ucfirst($_GET['act'])." ".ucfirst($_GET['modul']);
							?>
						</h3>
					</div><!-- /.card-header -->
					<div class="card-body">
<?php
if($modul == "user" && $act == "tampil"){
?>

	<div class="tab-content p-0">
			<p>
				<a class="btn btn-md btn-primary" href="media.php?modul=user&act=tambah"><i class="fas fa-plus"></i> Tambah Data</a>
			</p>
		<table id="tabel_user" class="table table-bordered table-hover table-striped nowrap" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Level User</th>
					<th>Status User</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM users LEFT JOIN ref_agama ON ref_agama.id_agama = users.agama";
				$query = mysqli_query($konek,$sql);
				$no = 1;
				while($row = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['jk']; ?></td>
						<td><?php echo $row['nama_agama']; ?></td>
						<td><?php echo $row['alamat']; ?></td>			
						<td><?php echo $row['level_user']; ?></td>		
						<td><?php echo $row['status_user']; ?></td>		
						<td>
							<a class="btn btn-md btn-info" href="media.php?modul=user&act=edit&id_user=<?php echo $row['id_user']; ?>"><i class="fas fa-edit"></i> Edit</a>
							<a class="btn btn-md btn-danger" href="<?php echo $aksi.'?modul=user&act=hapus&id_user='.$row['id_user']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')"><i class="fas fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Level User</th>
					<th>Status User</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>

	<script type="text/javascript">
		$(function(){
			$("#tabel_user").DataTable({
				responsive: true
			});
		});
	</script>

							

<?php 
} 
if($modul == "user" && $act == "tambah"){
	?>
	<div class="tab-content p-0">
	<form action="<?php echo $aksi.'?modul=user&act=simpan'; ?>" method="post">
		<p>
			<label>Username :</label>
			<input class="form-control" type="text" name="username" placeholder="Isi Username">
		</p>
		<p>
			<label>Password :</label>
			<input class="form-control" type="password" name="password" placeholder="Isi Password">
		</p>
		<p>
			<label>Nama :</label>
			<input class="form-control" type="text" name="nama" placeholder="Isi Nama">
		</p>
		<p>
			<label>Jenis Kelamin :</label>
			<select class="form-control" name="jk">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
		</p>
		<p>
			<label>Agama :</label>
			<select class="form-control" name="agama">
				<?php 
				$query = mysqli_query($konek,"SELECT * FROM ref_agama");
				while($r = mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $r['id_agama']; ?>"><?php echo $r['nama_agama']; ?></option>
					<?php 
				} 
				?>
			</select>
		</p>
		<p>
			<label>Alamat :</label>
			<textarea class="form-control" name="alamat"></textarea>
		</p>
		<p>
			<label>Level User :</label>
			<select class="form-control" name="level_user">
				<option value="admin">Admin</option>
				<option value="client">Client</option>
			</select>
		</p>
		<p>
			<label>Status User :</label>
			<select class="form-control" name="status_user">
				<option value="A">Aktif</option>
				<option value="NA">Non Aktif</option>
			</select>
		</p>
		<p>
			<button class="btn btn-md btn-success" type="submit"><i class="fas fa-save"></i> Simpan</button>
			<button class="btn btn-md btn-danger" type="button" onclick="window.history.back();"><i class="fas fa-backward"></i> Kembali ke User Page</button>
		</p>
	</form>
	</div>
	<?php 
} 
if($modul == "user" && $act == "edit"){

	#sql Get Data yang akan diedit
	$id_user = $_GET['id_user'];
	$sql = "SELECT * FROM users LEFT JOIN ref_agama AS ref_agama ON ref_agama.id_agama = users.agama WHERE users.id_user = '$id_user' ";
	$query = mysqli_query($konek,$sql);
	$data = mysqli_fetch_assoc($query);
	?>
	<div class="tab-content p-0">
	<form action="<?php echo $aksi.'?modul=user&act=edit'; ?>" method="post">
		<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
		<p>
			<label>Username :</label>
			<input class="form-control" type="text" name="username" placeholder="Isi Username" value="<?php echo $data['username']; ?>">
		</p>
		<p>
			<label>Password :</label>
			<input class="form-control" type="password" name="password" placeholder="Isi Password">
		</p>
		<p>
			<label>Nama :</label>
			<input class="form-control" type="text" name="nama" placeholder="Isi Nama" value="<?php echo $data['nama']; ?>">
		</p>
		<p>
			<label>Jenis Kelamin :</label>
			<select class="form-control" name="jk">
				<option value="<?php echo $data['jk']; ?>">		<?php echo $data['jk']; ?>
			</option>

			<option value=""></option>
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
	</p>
	<p>
		<label>Agama :</label>
		<select class="form-control" name="agama">
			<option value="<?php echo $data['id_agama']; ?>">
				<?php echo $data['nama_agama']; ?>
			</option>

			<option value=""></option>
			<?php 
			$query = mysqli_query($konek,"SELECT * FROM ref_agama");
			while($r = mysqli_fetch_array($query)){
				?>
				<option value="<?php echo $r['id_agama']; ?>"><?php echo $r['nama_agama']; ?></option>
				<?php 
			} 
			?>
		</select>
	</p>
	<p>
		<label>Alamat :</label>
		<textarea class="form-control" name="alamat">
			<?php echo $data['alamat']; ?>
		</textarea>
	</p>
	<p>
		<label>Level User :</label>
		<select class="form-control" name="level_user">
			<option value="<?php echo $data['level_user']; ?>">
				<?php echo $data['level_user']; ?>		
			</option>
			<option value=""></option>
			<option value="admin">Admin</option>
			<option value="client">Client</option>
		</select>
	</p>
	<p>
		<label>Status User :</label>
		<select class="form-control" name="status_user">
			<option value="<?php echo $data['status_user']; ?>">
				<?php echo $data['status_user']; ?>
			</option>
			<option value=""></option>
			<option value="A">Aktif</option>
			<option value="NA">Non Aktif</option>
		</select>
	</p>
	<p>
		<button class="btn btn-md btn-success" type="submit" ><i class="fas fa-edit"></i> Ubah</button>
		<button class="btn btn-md btn-danger" type="button" onclick="window.history.back();"><i class="fas fa-backward"></i> Kembali ke User Page</button>
	</p>
</form>
</div>
<?php 
} 
?>

</div><!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.card -->
</section>
<!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>