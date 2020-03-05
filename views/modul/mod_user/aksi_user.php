<?php
include "../../../config/koneksi.php";

$modul = $_GET['modul'];
$act = $_GET['act'];

if ($modul == "user" && $act == "simpan") {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$level_user = $_POST['level_user'];
	$status_user = $_POST['status_user'];

	$sql = "INSERT INTO users 
			(username,password,nama,jk,agama,alamat,level_user,status_user) 
			VALUES ('$username','$password','$nama','$jk','$agama','$alamat','$level_user','$status_user')";
	$query = mysqli_query($konek,$sql);
	if($query){
		#jika berhasil kembali ke halaman user
		echo "<script>alert('Tambah Data Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=../../../media.php?modul=user&act=tampil'>";
	}else{
		#jika berhasil kembali ke halaman tambah user
		echo "<script>alert('Tambah Data Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=../../../media.php?modul=user&act=tambah'>";
	}
}

if ($modul == "user" && $act == "edit") {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$level_user = $_POST['level_user'];
	$status_user = $_POST['status_user'];

	if(empty($password)){
		$sql = "UPDATE users SET
				username = '$username',
				nama = '$nama',
				jk = '$jk',
				agama = '$agama',
				level_user = '$level_user',
				status_user = '$status_user'
				WHERE id_user = '$_POST[id_user]'
				";
	}else{
		$sql = "UPDATE users SET
				username = '$username',
				password = '$password',
				nama = '$nama',
				jk = '$jk',
				agama = '$agama',
				level_user = '$level_user',
				status_user = '$status_user'
				WHERE id_user = '$_POST[id_user]'
				";
	}

	$query = mysqli_query($konek,$sql);
	if($query){
		#jika berhasil kembali ke halaman user
		echo "<script>alert('Ubah Data Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=../../../media.php?modul=user&act=tampil'>";
	}else{
		#jika berhasil kembali ke halaman edit user
		echo "<script>alert('Ubah Data Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=../../../media.php?modul=user&act=edit'>";
	}
}

if($modul == "user" && $act == "hapus"){
	$id_user = $_GET['id_user'];
	$sql = "DELETE FROM users WHERE id_user = '$id_user'";
	$query = mysqli_query($konek,$sql);
	if($query){
		#jika berhasil kembali ke halaman user
		echo "<script>alert('Hapus Data Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=../../../media.php?modul=user&act=tampil'>";
	}else{
		#jika berhasil kembali ke halaman user
		echo "<script>alert('Hapus Data Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=../../../media.php?modul=user&act=tampil'>";
	}
}
