<?php 
$id_barang = $_GET['id']; 

$tampilBarang = $conn->query("SELECT * FROM tb_barang WHERE id_barang = $id_barang") or die(mysqli_error($conn));
$pecahBarang = $tampilBarang->fetch_assoc();

if(isset($_POST['ubah'])) {
    $kode = htmlspecialchars($_POST['kode_barang']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $stok = htmlspecialchars($_POST['stok']);
    $hrg_beli = htmlspecialchars($_POST['hrg_beli']);
    $hrg_jual = htmlspecialchars($_POST['hrg_jual']);
    // $profit = htmlspecialchars($_POST['profit']);

    if(empty($kode && $nama_barang && $satuan && $hrg_beli && $hrg_jual)) {
        echo "<script>alert('Inputan tidak boleh kosong.');window.location='?p=barang';</script>";
        return false;
    }

    // function abs, berfungsi menghilangkan min (-).
    $total = $hrg_beli - $hrg_jual;
    $totalSemua = abs($total);

    $sql = $conn->query("UPDATE tb_barang SET kode_barcode = '$kode', nama_barang = '$nama_barang', satuan = '$satuan', hrg_beli = '$hrg_beli', stok = '$stok', hrg_jual = '$hrg_jual', profit = '$totalSemua' WHERE id_barang = $id_barang") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Diubah.');window.location='?p=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.');window.location='?p=barang';</script>";
    }
}

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Form Ubah Data Barang
                    <small>Formulit Ubah Barang</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="kode_barang">Kode Barcode</label>
                                <input type="text" name="kode_barang" id="
                                kode_barang" class="form-control" placeholder="Masukan kode barang" value="<?= $pecahBarang['kode_barcode']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="
                                nama_barang" class="form-control" placeholder="Masukan kode barang" value="<?= $pecahBarang['nama_barang']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="satuan">Satuan</label>
                                <select name="satuan" id="satuan" class="form-control show-tick">
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="Lusin" <?php if($pecahBarang['satuan'] == 'Lusin'){echo "selected";} ?>>Lusin</option>
                                    <option value="Pack" <?php if($pecahBarang['satuan'] == 'Pack'){echo "selected";} ?>>Pack</option>
                                    <option value="Pcs" <?php if($pecahBarang['satuan'] == 'Pcs'){echo "selected";} ?>>Pcs</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="
                                stok" class="form-control" placeholder="Masukan stok barang" value="<?= $pecahBarang['stok']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="hrg_beli">Harga Beli</label>
                                <input type="number" name="hrg_beli" id="
                                hrg_beli" class="form-control" placeholder="Masukan harga beli" value="<?= $pecahBarang['hrg_beli']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="hrg_jual">Harga Jual</label>
                                <input type="number" name="hrg_jual" id="
                                hrg_jual" class="form-control" placeholder="Masukan harga jual" value="<?= $pecahBarang['hrg_jual']; ?>" />
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="form-line">
                                <label for="profit">Profit</label>
                                <input type="number" name="profit" id="
                                profit" class="form-control" placeholder="Masukan profit" />
                            </div>
                        </div> -->
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
