<?php 
if(isset($_POST['gantipass'])) {
    if(gantiPass($_POST) > 0) {
        echo "<script>alert('Edit Profile berhasil.');window.location='?p=profile';</script>";
    } else {
        echo "<script>alert('Edit Profile gagal.');window.location='?p=profile';</script>";
    }
}

?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	        	<h4>Ganti Password</h4>
	        </div>
	        <div class="body">
	        	<form action="" method="post">
	            <div class="form-group">
                    <div class="form-line">
                        <input type="password" name="passwordLama" class="form-control" placeholder="Password lama" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="form-line">
                        <input type="password" name="passwordBaru1" class="form-control" placeholder="Password baru" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="form-line">
                        <input type="password" name="passwordBaru2" class="form-control" placeholder="Konfirmasi Password baru" />
                    </div>
                </div>
                <div class="form-group">
                	<button type="submit" name="gantipass" class="btn btn-primary">Edit Profile</button>
                </div>
                </form>
	        </div>
	    </div>
	</div>
</div>