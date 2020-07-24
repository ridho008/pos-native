<div class="row clearfix">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	    <div class="thumbnail">
	        <img src="images/profile/<?= $_SESSION['user']['foto_user']; ?>">
	        <div class="caption">
	            <h3><?= $_SESSION['user']['nama_user']; ?></h3>
	            <p>
	                <?= $_SESSION['user']['email_user']; ?>
	            </p>
	            <p>
	                <a href="?p=editprofile" class="btn btn-primary waves-effect" role="button">Edit Profile</a>
	            </p>
	        </div>
	    </div>
	</div>
</div>