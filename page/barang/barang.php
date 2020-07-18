<?php 
// menampilkan semua data barang
$sqlBarang = $conn->query("SELECT * FROM tb_barang ORDER BY id_barang DESC") or die(mysqli_error($conn));

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Data Semua Barang
	            </h2>
	        </div>
	        <div class="header">
	        	<a href="?p=barang&aksi=tambah" class="btn btn-primary mb-3">Tambah Data Barang</a>
	        </div>
	        <div class="body">
	            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
	                <thead>
                    <tr>
	                    <th>No.</th>
	                    <th>Kode Barcode</th>
	                    <th>Barang</th>
	                    <th>Satuan</th>
	                    <th>Stok</th>
	                    <th>Harga Beli</th>
	                    <th>Harga Jual</th>
	                    <th>Profit</th>
	                    <th>Aksi</th>
                    </tr>
	                </thead>
	                <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kode Barcode</th>
                      <th>Barang</th>
                      <th>Satuan</th>
                      <th>Stok</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Profit</th>
                      <th>Aksi</th>
	                  </tr>
                  </tfoot>
	                <tbody>
	                <?php 
	                $no = 1; 
	                while($data = $sqlBarang->fetch_assoc()) : ?>
	                	<tr>
	                    <td><?= $no++; ?></td>
	                    <td><?= $data['kode_barcode']; ?></td>
	                    <td><?= $data['nama_barang']; ?></td>
	                    <td><?= $data['satuan']; ?></td>
	                    <td><?= $data['stok']; ?></td>
	                    <td><?= number_format($data['hrg_beli']); ?></td>
	                    <td><?= number_format($data['hrg_jual']); ?></td>
	                    <td><?= number_format($data['profit']); ?></td>
	                    <td>
	                    	<a href="?p=barang&aksi=ubah&id=<?= $data['id_barang']; ?>" class="btn btn-info">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">create</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </a>
	                    	<a href="?p=barang&aksi=hapus&id=<?= $data['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">delete</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </td>
	                   </tr>
	                 <?php endwhile; ?>
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>