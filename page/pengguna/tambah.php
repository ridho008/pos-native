<?php  
if(isset($_POST['tambah'])) {
    if(tambahPengguna($_POST) > 0) {
        echo "<script>alert('Data pengguna berhasil ditambahkan.');window.location='?p=pengguna';</script>";
    } else {
        echo "<script>alert('Data pengguna gagal ditambahkan.');window.location='?p=pengguna';</script>";
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="
                                email" class="form-control" placeholder="Masukan email" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control-file" required="">
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
