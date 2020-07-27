<?php 
if(isset($_POST['editprofile'])) {
    if(editP($_POST) > 0) {
        echo "<script>alert('Edit Profile berhasil.');window.location='?p=profile';</script>";
    } else {
        echo "<script>alert('Edit Profile gagal.');window.location='?p=profile';</script>";
    }
}

$id = $_SESSION['user']['id_user'];
$editP = $conn->query("SELECT * FROM tb_user WHERE id_user = $id") or die(mysqli_error($conn));
$pecah = $editP->fetch_assoc();

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	        	<h4>Edit Profile</h4>
	        </div>
	        <div class="body">
	        	<form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $pecah['id_user']; ?>">
                    <input type="hidden" name="password" value="<?= $pecah['pass_user']; ?>">
	            <div class="form-group">
                    <div class="form-line">
                        <input type="email" name="email" class="form-control" value="<?= $pecah['email_user']; ?>" readonly placeholder="Email" style="background: #ddd;" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="form-line">
                        <input type="text" name="nama" class="form-control" value="<?= $pecah['nama_user']; ?>" placeholder="Nama Lengkap" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="form-line">
                        <input type="hidden" name="fotoLama" value="<?= $pecah['foto_user']; ?>">
                        <img src="<?= base_url('images/profile/'); ?><?= $pecah['foto_user']; ?>" width="100">
                		<input type="file" name="foto" class="form-control-file">
                	</div>
                </div>
                <div class="form-group">
                	<button type="submit" name="editprofile" class="btn btn-primary">Edit Profile</button>
                </div>
                </form>
	        </div>
	    </div>
	</div>
</div>