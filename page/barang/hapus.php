<?php 
$id_barang = $_GET['id'];

$sql = $conn->query("DELETE FROM tb_barang WHERE id_barang = $id_barang") or die(mysqli_error($conn));
if($sql) {
        echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.');window.location='?p=barang';</script>";
    }

?>