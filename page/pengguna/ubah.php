<?php  
$id = $_GET['id'];
$tampilPengguna = $conn->query("SELECT * FROM tb_user WHERE id_user = $id") or die(mysqli_error($conn));
$row = $tampilPengguna->fetch_assoc();

if(isset($_POST['ubah'])) {
    if(ubahPengguna($_POST) > 0) {
        echo "<script>alert('Data pengguna berhasil diubah.');window.location='?p=pengguna';</script>";
    } else {
        echo "<script>alert('Data pengguna gagal diubah.');window.location='?p=pengguna';</script>";
    }
}

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Form Ubah Data Pelanggan
                    <small>Formulir Ubah Pelanggan</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $row['id_user']; ?>">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="
                                email" class="form-control" placeholder="Masukan email" required="" value="<?= $row['email_user']; ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $row['nama_user']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required="" value="<?= $row['pass_user']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="foto">Foto</label>
                                <input type="text" name="fotoLama" value="<?= $row['foto_user']; ?>">
                                <img src="images/profile/<?= $row['foto_user']; ?>" width="100">
                                <input type="file" name="foto" id="foto" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>
