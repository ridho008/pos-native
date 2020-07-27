<?php 
$kode = $_GET['kodepj'];

if(isset($_POST['tambah'])){
	$kdpj = htmlspecialchars($_POST['kode']);
	$barcode = htmlspecialchars($_POST['kode_barcode']);
	$tgl = date('Y-m-d');

	$sqlBarang = $conn->query("SELECT * FROM tb_barang WHERE kode_barcode = '$barcode'") or die(mysqli_error($conn));
	$dataBarang  = $sqlBarang->fetch_assoc();
	$hrgJual = $dataBarang['hrg_jual'];
	$jumlah = 1;
	$total = $jumlah * $hrgJual;

	$barang2 = $conn->query("SELECT * FROM tb_barang WHERE kode_barcode = '$barcode'") or die(mysqli_error($conn));
	while($dataBarang2 = $barang2->fetch_assoc()) {
		$sisa  = $dataBarang2['stok'];

		if($sisa == 0) {
			echo "<script>alert('Stok barang sedang habis, tidak dapat melakukan penjualan.');window.location='?p=penjualan&kodepj=$kode';</script>";
		} else {
			$conn->query("INSERT INTO tb_penjualan VALUES(null, '$kdpj', '$barcode', '$jumlah', '$total', '$tgl', '0')") or die(mysqli_error($conn));
			// menguransi stok brg, saat menambahkan brg ke dlm tb_penjualan
			$conn->query("UPDATE tb_barang SET stok = $sisa - 1 WHERE kode_barcode = '$barcode'") or die(mysqli_error($conn));
		}
	}
}
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Penjualan
                    <small>Formulir Penjualan</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="kode">Kode Penjualan</label>
                                <input type="text" name="kode" id="
                                kode" readonly="" style="background: #ddd" class="form-control" value="<?= $kode; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="kode_barcode">Kode Barcode</label>
                                <input type="text" name="kode_barcode" id="
                                kode_barcode" autofocus="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
// menampilkan semua data barang
$sqlBarang = $conn->query("SELECT * FROM tb_penjualan JOIN tb_barang ON tb_penjualan.kode_barcode = tb_barang.kode_barcode AND kode_penjualan = '$kode'") or die(mysqli_error($conn));

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Data Penjualan
	            </h2>
	        </div>
	        <div class="body">
	            <table class="table table-bordered table-striped table-hover">
	                <thead>
                    <tr>
	                    <th>No.</th>
	                    <th>Kode Barcode</th>
	                    <th>Nama Barang</th>
	                    <th>Harga</th>
	                    <th>Jumlah</th>
	                    <th>Total</th>
                    </tr>
	                </thead>
	                <tbody>
	                <?php 
	                $no = 1; 
	                while($data = $sqlBarang->fetch_assoc()) : ?>
	                	<tr>
	                    <td><?= $no++; ?></td>
	                    <td><?= $data['kode_barcode']; ?></td>
	                    <td><?= $data['nama_barang']; ?></td>
	                    <td><?= number_format($data['hrg_jual']); ?></td>
	                    <td><?= $data['jumlah']; ?></td>
	                    <td><?= number_format($data['total']); ?></td>
	                    <td>
	                    	<a href="?p=barang&aksi=ubah&id=<?= $data['id_barang']; ?>" class="btn btn-success">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">add_circle</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </a>
	                    	<a href="?p=barang&aksi=ubah&id=<?= $data['id_barang']; ?>" class="btn btn-info">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">remove_circle</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </a>
	                    	<a href="?p=barang&aksi=hapus&id=<?= $data['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">delete</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </a>
	                    </td>
	                   </tr>
	                   <?php $totalBayar = $totalBayar + $data['total']; ?>
	                 <?php endwhile; ?>
	                </tbody>
	                <tr>
	                	<th colspan="5">Total</th>
	                	<td>
	                		<input type="text" value="Rp.<?= number_format($totalBayar); ?>" readonly class="form-control" id="total_bayar" onkeyup="hitung();" style="background: #ddd;">
	                	</td>
	                </tr>
	                <tr>
	                	<th colspan="5">Diskon</th>
	                	<td>
	                		<input type="number" class="form-control" onkeyup="hitung();" name="diskon" id="diskon">
	                	</td>
	                </tr>
	                <tr>
	                	<th colspan="5">Potongan Diskon</th>
	                	<td>
	                		<input type="number" class="form-control" name="potongan" id="potongan">
	                	</td>
	                </tr>
	                <tr>
	                	<th colspan="5">Subtotal</th>
	                	<td>
	                		<input type="number" class="form-control" name="s_total" id="s_total">
	                	</td>
	                </tr>
	                <tr>
	                	<th colspan="5">Bayar</th>
	                	<td>
	                		<input type="number" class="form-control" name="bayar" id="bayar">
	                	</td>
	                </tr>
	                <tr>
	                	<th colspan="5">Kembali</th>
	                	<td>
	                		<input type="number" class="form-control" name="kembali" id="kembali">
	                	</td>
	                </tr>
	            </table>
	        </div>
	    </div>
	</div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script>
    function hitung()
    {
        // const total_bayar = document.getElementById('total_bayar').value;
        // const diskon = document.getElementById('diskon').value;
        $total_bayar = $('#total_bayar').val();
        $diskon = $('#diskon').val();
        const pDiskon = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);

        if(!isNaN(pDiskon)) {
            // const potongan = document.getElementById('potongan').value = pDiskon;
            $('#potongan').val($pDiskon);
        }

        const subTotal = parseInt(total_bayar) - parseInt(potongan);
        if(!isNaN(subTotal)) {
            const s_total = document.getElementById('s_total').value = subTotal;
        }
    }
</script>