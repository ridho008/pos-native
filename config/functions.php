<?php
require_once 'koneksi.php';

function base_url($url = null) {
	$base_url = "http://localhost/pos-native/";
	if($base_url != null) {
		return $base_url . $url;
	} else {
		return $base_url;
	}
}


// ------------------- AUTH-----------------------
function register($data)
{
	global $conn;
	// tampung inputannya.
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$password = htmlspecialchars($data['password']);
	$confirm = htmlspecialchars($data['confirm']);

	if($password != $confirm) {
		echo "<script>alert('Konfirmasi password salah, ulangi lagi.');window.location='registrasi.php';</script>";
		return false;
	}

	if(strlen($password) > 6) {
		echo "<script>alert('Minimal password 6 digit.');window.location='registrasi.php';</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	// masukan ke dalam databse tb_user
	$sql = $conn->query("INSERT INTO tb_user VALUES (null, '$email', '$nama', '$password', '2', 'default.jpg')") or die(mysqli_error($conn));
	return $conn->affected_rows;
}