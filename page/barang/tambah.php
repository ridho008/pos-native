<?php  
if(isset($_POST['tambah'])) {
    $kode = htmlspecialchars($_POST['kode_barang']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $stok = htmlspecialchars($_POST['stok']);
    $hrg_beli = htmlspecialchars($_POST['hrg_beli']);
    $hrg_jual = htmlspecialchars($_POST['hrg_jual']);
    // $profit = htmlspecialchars($_POST['profit']);

    $total = $hrg_beli - $hrg_jual;
    $tot = abs($total);

    $sql = $conn->query("INSERT INTO tb_barang VALUES (null, '$kode', '$nama_barang', '$satuan', '$hrg_beli', '$stok', '$hrg_jual', '$tot')") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan.');window.location='?p=barang';</script>";
    }
}

// mencari kode brg paling besar
$query = $conn->query("SELECT MAX(kode_barcode) as kodebrg FROM tb_barang") or die(mysqli_error($conn));
$data = $query->fetch_assoc();
$kdbrg = $data['kodebrg'];

$noUrut = (int) substr($kdbrg, 3, 3);
$noUrut++;
$char = "BRG";
$kodeBarcode = $char . sprintf("%03s", $noUrut);

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Form Tambah Data Barang
                    <small>Formulit Tambah Barang</small>
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
                                kode_barang" readonly="" style="background: #eee;" value="<?= $kodeBarcode; ?>" class="form-control" placeholder="Masukan kode barang" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="
                                nama_barang" class="form-control" placeholder="Masukan kode barang" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="satuan">Satuan</label>
                                <select name="satuan" id="satuan" class="form-control show-tick">
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="Lusin">Lusin</option>
                                    <option value="Pack">Pack</option>
                                    <option value="Pcs">Pcs</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="
                                stok" class="form-control" placeholder="Masukan stok barang" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="hrg_beli">Harga Beli</label>
                                <input type="number" name="hrg_beli" id="
                                hrg_beli" class="form-control" placeholder="Masukan harga beli" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="hrg_jual">Harga Jual</label>
                                <input type="number" name="hrg_jual" id="
                                hrg_jual" class="form-control" placeholder="Masukan harga jual" />
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
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>
