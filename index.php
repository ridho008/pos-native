<?php 
error_reporting(0);
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';
require_once 'page/penjualan/kodepj.php';

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$page = $_GET['p'];
$aksi = $_GET['aksi'];

?>
<!-- <pre><?= print_r($_SESSION['user']); ?></pre> -->
<?php require_once 'themeplates/header.php'; ?>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <?php require_once 'themeplates/topbar.php'; ?>
    <!-- #Top Bar -->
    
    <!-- SIDEBAR -->
    <?php require_once 'themeplates/sidebar.php'; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>BLANK PAGE</h2> -->
                <?php 
                if($page == 'barang') {
                    if($aksi == '') {
                        require_once 'page/barang/barang.php';
                    } else if($aksi == 'tambah') {
                        require_once 'page/barang/tambah.php';
                    } else if($aksi == 'ubah') {
                        require_once 'page/barang/ubah.php';
                    } else if($aksi == 'hapus') {
                        require_once 'page/barang/hapus.php';
                    }
                } else if($page == 'pelanggan') {
                    if($aksi == '') {
                        require_once 'page/pelanggan/pelanggan.php';
                    } else if($aksi == 'tambah') {
                        require_once 'page/pelanggan/tambah.php';
                    } else if($aksi == 'ubah') {
                        require_once 'page/pelanggan/ubah.php';
                    } else if($aksi == 'hapus') {
                        require_once 'page/pelanggan/hapus.php';
                    }
                } else if($page == 'profile') {
                    if($aksi == '') {
                        require_once 'page/profile/profile.php';
                    }
                } else if($page == 'editprofile') {
                    if($aksi == '') {
                        require_once 'page/profile/editprofile.php';
                    }
                } else if($page == 'gantipass') {
                    if($aksi == '') {
                        require_once 'page/profile/gantipass.php';
                    }
                } else if($page == 'pengguna') {
                    if($aksi == '') {
                        require_once 'page/pengguna/pengguna.php';
                    } else if($aksi == 'tambah') {
                        require_once 'page/pengguna/tambah.php';
                    } else if($aksi == 'ubah') {
                        require_once 'page/pengguna/ubah.php';
                    } else if($aksi == 'hapus') {
                        require_once 'page/pengguna/hapus.php';
                    }
                } else if($page == 'penjualan') {
                    if($aksi == '') {
                        require_once 'page/penjualan/penjualan.php';
                    }
                } else {
                    echo "<h2>BERANDA</h2>";
                }
                ?>
            </div>
        </div>
    </section>

<?php require_once 'themeplates/footer.php'; ?>