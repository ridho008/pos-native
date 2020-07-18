<?php 
// menampilkan semua data barang
$sqlPelanggan = $conn->query("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan DESC") or die(mysqli_error($conn));

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Data Semua Pelanggan
	            </h2>
	        </div>
	        <div class="header">
	        	<a href="?p=pelanggan&aksi=tambah" class="btn btn-primary mb-3">Tambah Data Pelanggan</a>
	        </div>
	        <div class="body">
	            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
	                <thead>
                    <tr>
	                    <th>No.</th>
	                    <th>Nama</th>
	                    <th>Alamat</th>
	                    <th>Telepon</th>
	                    <th>Email</th>
	                    <th>Aksi</th>
                    </tr>
	                </thead>
	                <tfoot>
                    <tr>
                      <th>No.</th>
	                    <th>Nama</th>
	                    <th>Alamat</th>
	                    <th>Telepon</th>
	                    <th>Email</th>
	                    <th>Aksi</th>
	                  </tr>
                  </tfoot>
	                <tbody>
	                <?php 
	                $no = 1; 
	                while($data = $sqlPelanggan->fetch_assoc()) : ?>
	                	<tr>
	                    <td><?= $no++; ?></td>
	                    <td><?= $data['nama_pelanggan']; ?></td>
	                    <td><?= $data['alamat_pelanggan']; ?></td>
	                    <td><?= $data['telp_pelanggan']; ?></td>
	                    <td><?= $data['email_pelanggan']; ?></td>
	                    <td>
	                    	<a href="?p=pelanggan&aksi=ubah&id=<?= $data['id_pelanggan']; ?>" class="btn btn-info">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">create</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </a>
	                    	<a href="?p=pelanggan&aksi=hapus&id=<?= $data['id_pelanggan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">
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