<?php  
if(isset($_POST['tambah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telp = htmlspecialchars($_POST['telp']);
    $email = htmlspecialchars($_POST['email']);

    $sql = $conn->query("INSERT INTO tb_pelanggan VALUES(null, '$nama', '$alamat', '$telp', '$email')") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=pelanggan';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan.');window.location='?p=pelanggan';</script>";
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
                                nama" class="form-control" placeholder="Masukan kode barang" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="telp">Telpon</label>
                                <input type="number" name="telp" id="telp" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>
