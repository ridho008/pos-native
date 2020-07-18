<?php 
$id_pelanggan = $_GET['id'];

$sql = $conn->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan") or die(mysqli_error($conn));
if($sql) {
        echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=pelanggan';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.');window.location='?p=pelanggan';</script>";
    }

?>