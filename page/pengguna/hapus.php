<?php  
$id = $_GET['id'];
$cekGambar  = $conn->query("SELECT * FROM tb_user WHERE id_user = $id") or die(mysqli_error($conn));
$data = $cekGambar->fetch_assoc();
$foto = $data['foto_user'];

if ('images/profile/' . $foto) {
	unlink('images/profile/' . $foto);
}

$slqHapus = $conn->query("DELETE FROM tb_user WHERE id_user = $id") or die(mysqli_error($conn));
if($slqHapus) {
	echo "<script>alert('Data berhasil dihapus.');window.location='?p=pengguna';</script>";
} else {
	echo "<script>alert('Data gagal dihapus.');window.location='?p=pengguna';</script>";
}

?>