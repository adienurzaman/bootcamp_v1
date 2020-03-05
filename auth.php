<?php
include "config/koneksi.php";

$modul = $_GET['modul'];
$act = $_GET['act'];

if($modul == "auth" && $act == "cek_auth"){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	#cek username 
	$sql_uname = "SELECT * FROM users WHERE username = '$username'";
	$query_uname = mysqli_query($konek,$sql_uname);
	if(mysqli_num_rows($query_uname)>0){
		#cek password
		$sql_password = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query_password = mysqli_query($konek,$sql_password);
		if(mysqli_num_rows($query_password)>0){
			session_start();
			$r=mysqli_fetch_assoc($query_password);
			$_SESSION['id_user'] = $r['id_user'];
			$_SESSION['username'] = $r['username'];
			$_SESSION['password']  = $r['password'];
			$_SESSION['nama']  = $r['nama'];
			$_SESSION['level_user'] = $r['level_user'];

			echo "<meta http-equiv='refresh' content='0; url=media.php?modul=home'>";
		}else{
			echo "<script>alert('Password salah. Gagal Login')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}
	}else{
		echo "<script>alert('Username Tidak Terdaftar. Gagal Login')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
}

else if($modul == "auth" && $act == "logout"){
	session_start();
	session_destroy();
	echo "<script>alert('Logout Berhasil')</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

else{
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}


