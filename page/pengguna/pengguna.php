<?php 
// menampilkan semua data barang
$sqlPengguna = $conn->query("SELECT * FROM tb_user ORDER BY id_user DESC") or die(mysqli_error($conn));

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Data Semua Pengguna
	            </h2>
	        </div>
	        <div class="header">
	        	<a href="?p=pengguna&aksi=tambah" class="btn btn-primary mb-3">Tambah Data Pengguna</a>
	        </div>
	        <div class="body">
	            <table class="table table-striped">
	                <thead>
                    <tr>
	                    <th>No.</th>
	                    <th>Email</th>
	                    <th>Nama</th>
	                    <th>Password</th>
	                    <th>Level</th>
	                    <th>Foto</th>
	                    <th>Aksi</th>
                    </tr>
	                </thead>
	                <tfoot>
                    <tr>
                      <th>No.</th>
	                    <th>Email</th>
	                    <th>Nama</th>
	                    <th>Password</th>
	                    <th>Level</th>
	                    <th>Foto</th>
	                    <th>Aksi</th>
	                  </tr>
                  </tfoot>
	                <tbody>
	                <?php 
	                $no = 1; 
	                while($data = $sqlPengguna->fetch_assoc()) : ?>
	                	<tr>
	                    <td><?= $no++; ?></td>
	                    <td><?= $data['email_user']; ?></td>
	                    <td><?= $data['nama_user']; ?></td>
	                    <td><?= $data['pass_user']; ?></td>
	                    <td><?= level($data['level']); ?></td>
	                    <td>
	                    	<img src="images/profile/<?= $data['foto_user']; ?>" width="100">
	                    </td>
	                    <td>
	                    	<a href="?p=pengguna&aksi=ubah&id=<?= $data['id_user']; ?>" class="btn btn-info">
	                    	<div class="demo-google-material-icon">
	                    		<i class="material-icons">create</i>
	                    		<span class="icon-name"></span>
	                    	</div>
	                    </a>
	                    	<a href="?p=pengguna&aksi=hapus&id=<?= $data['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">
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