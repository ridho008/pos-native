<?php 
$id_pelanggan = $_GET['id'];
$tampilPelanggan = $conn->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan") or die(mysqli_error($conn));
$pecahPelanggan = $tampilPelanggan->fetch_assoc();

if(isset($_POST['ubah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telp = htmlspecialchars($_POST['telp']);
    $email = htmlspecialchars($_POST['email']);

    $sql = $conn->query("UPDATE tb_pelanggan SET nama_pelanggan = '$nama', alamat_pelanggan = '$alamat', telp_pelanggan = '$telp', email_pelanggan = '$email' WHERE id_pelanggan = $id_pelanggan ") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Diubah.');window.location='?p=pelanggan';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.');window.location='?p=pelanggan';</script>";
    }
}

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Form Tambah Data Pelanggan
                    <small>Formulit Tambah Pelanggan</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="
                                nama" class="form-control" placeholder="Masukan kode barang" value="<?= $pecahPelanggan['nama_pelanggan']; ?>" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat"  class="form-control" required=""><?= $pecahPelanggan['alamat_pelanggan']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="telp">Telpon</label>
                                <input type="number" name="telp" id="telp" class="form-control" value="<?= $pecahPelanggan['telp_pelanggan']; ?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $pecahPelanggan['email_pelanggan']; ?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="ubah" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>
