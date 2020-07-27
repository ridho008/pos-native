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


function editP($data)
{
	global $conn;
	$id = htmlspecialchars($data['id']);
	$email = htmlspecialchars($data['email']);
	$nama = htmlspecialchars($data['nama']);
	$password = htmlspecialchars($data['password']);
    $fotoLama = htmlspecialchars($data['fotoLama']);

    // cek foto
    $foto = upload();
   	if(!$foto) {
   		return false;
   	}

   	if($foto == 'default.jpg') {
   		$foto = $fotoLama;
   	}

    $sql = $conn->query("UPDATE tb_user SET email_user = '$email', nama_user = '$nama', pass_user = '$password', level = '2', foto_user = '$foto' WHERE id_user = $id ") or die(mysqli_error($conn));
    return $conn->affected_rows;
}


function upload()
{
	$namaFoto = $_FILES['foto']['name'];
	$errorFoto = $_FILES['foto']['error'];
	$sizeFoto = $_FILES['foto']['size'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	if($errorFoto == 4) {
		return "default.jpg";
	}

	$fotoValid = ['jpg','png','jpeg'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $fotoValid)) {
		echo "<script>alert('Ektensi foto harus jpg/png.')</script>";
		return false;
	}

	if($sizeFoto > 1000000) {
		echo "<script>alert('Size foto wajib di bawah 1MB.')</script>";
		return false;
	}

	// acak nama foto
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFoto, './images/profile/' . $namaFileBaru);
	return $namaFileBaru;
}


function gantiPass($data)
{
	global $conn;
	$passwordLama = htmlspecialchars($data['passwordLama']);
	$passwordBaru = htmlspecialchars($data['passwordBaru1']);

	$result = $conn->query("SELECT * FROM tb_user") or die(mysqli_error($conn));
	$row = $result->fetch_assoc();

	if(!password_verify($passwordLama, $row['pass_user'])) {
		echo "<script>alert('Password lama salah!');window.location='?p=gantipass';</script>";
	} else {
		// jika password lama & baru, sama diinputkan
		if($passwordLama == $passwordBaru) {
			echo "<script>alert('Password baru & lama tidak boleh sama!');window.location='?p=gantipass';</script>";
		} else {
			$password_hash = password_hash($passwordBaru, PASSWORD_DEFAULT);
			$conn->query("UPDATE tb_user SET pass_user = '$password_hash'") or die(mysqli_error($conn));
			echo "<script>alert('Password berhasil diganti.');window.location='?p=gantipass';</script>";
		} 
	}

}


// ------------------------PENGGUNA---------------------------
function level($data)
{
	if($data == '1') {
		echo "Admin";
	} else {
		echo "Pengguna";
	}
}

function tambahPengguna($data)
{
	global $conn;
	$email = htmlspecialchars($data['email']);
	$nama = htmlspecialchars($data['nama']);
	$password = htmlspecialchars($data['password']);

	// cek gambar
	$namaFoto = $_FILES['foto']['name'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	$fotoValid = ['jpg', 'png', 'jpeg'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFoto, './images/profile/' . $namaFileBaru);

	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	$conn->query("INSERT INTO tb_user VALUES(null, '$email', '$nama', '$password_hash', '2', '$namaFileBaru') ") or die(mysqli_error($conn));
	return $namaFileBaru;
}


function ubahPengguna($data)
{
	global $conn;
	$id = htmlspecialchars($data['id']);
	$email = htmlspecialchars($data['email']);
	$nama = htmlspecialchars($data['nama']);
	$password = htmlspecialchars($data['password']);
	$fotoLama = htmlspecialchars($data['fotoLama']);
	
	// cek gambar
	
	if($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	} else {
		$foto = uploadPengguna();
	}

	// if($foto == 'default.jpg') {
	// 	$foto = $fotoLama;
	// }

	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	$conn->query("UPDATE tb_user SET email_user = '$email', nama_user = '$nama', pass_user = '$password_hash', level =  '2', foto_user = '$foto' WHERE id_user = $id ") or die(mysqli_error($conn));
	return $conn->affected_rows;
}


function uploadPengguna()
{
	$namaFoto = $_FILES['foto']['name'];
	$errorFoto = $_FILES['foto']['error'];
	$sizeFoto = $_FILES['foto']['size'];
	$tmpFoto = $_FILES['foto']['tmp_name'];
	$fotoLama = $_POST['FotoLama'];

	if($errorFoto == 4) {
		return 'dafault.jpg';
	}

	$fotoValid = ['jpg','jpeg','png'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $fotoValid)) {
		echo "<script>alert('Ektensi foto wajib jpg/png')</script>";
		return false;
	}

	if($sizeFoto > 1000000) {
		echo "<script>alert('Ukuran foto harus dibawah 1MB.')</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	$path = "./img/profile/" . $FotoLama;
	if(file_exists($path)) {
		unlink($path);
	}

	move_uploaded_file($tmpFoto, './images/profile/' . $namaFileBaru);
	return $namaFileBaru;
}


// -----------------------PENJUALAN------------------------
