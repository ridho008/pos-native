<?php 
$sql = $conn->query("SELECT * FROM tb_user") or die(mysqli_error($conn));
$row = $sql->fetch_assoc();

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	        	<a href="?p=pelanggan&aksi=tambah" class="btn btn-primary mb-3">Tambah Data Pelanggan</a>
	        </div>
	        <div class="body">
	        	<form action="" method="post">
	            <div class="form-group">
                    <div class="form-line">
                        <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email_user']; ?>" readonly placeholder="Email" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="form-line">
                        <input type="text" name="nama" class="form-control" value="<?= $_SESSION['user']['nama_user']; ?>" placeholder="Nama Lengkap" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="form-line">
                		<input type="file" name="foto" class="form-control-file">
                	</div>
                </div>
                <div class="form-group">
                	<button type="submit" name="editprofile">Edit Profile</button>
                </div>
                </form>
	        </div>
	    </div>
	</div>
</div>