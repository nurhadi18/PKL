<?php
include 'menu.php';
include 'header.php';
include 'config/koneksi.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Data Barang Masuk</h1>



  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="barang_masuk.php" class="btn btn-info btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fas fa-angle-left"></i>
        </span>
        <span class="text font-weight-bold">Kembali</span>
      </a>
      <div class="card-body">
        <div class="table-responsive">
          <form action="" method="POST">
            <table class="table">
              <tr>
                <td>Nama Barang</td>
                <td>
                  <select name="id_barang" class="form-control" required>
                    <option value=""> -- Pilih -- </option>
                    <?php
                    $qr = mysqli_query($koneksi, "SELECT * FROM barang");
                    while ($d = mysqli_fetch_assoc($qr)) { ?>
                      <option value="<?= $d['id_barang'] ?>">
                        <?= $d['nama_barang'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
            </table>
            <button type="submit" value="Cari" name="cari" class="btn btn-primary btn-icon-split btn-sm">
              <span class="icon text-white-50">
                <i class="fas fa-search"></i>
              </span>
              <span class="text font-weight-bold">Cari</span>
            </button>
          </form>
        </div>
      </div>              
    </div>       
  </div>

  <?php
  if (isset($_POST['cari'])) {

    $id_barang = $_POST['id_barang'];
    $sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id_barang");
    $data = mysqli_fetch_assoc($sql);
    ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="card-body">
          <div class="table-responsive">
            <form action="" method="POST">
              <table class="table">
                <tr>
                  <td>Nama Barang</td>
                  <td>
                    <input type="text" class="form-control" disabled="" value="<?= $data['nama_barang'] ?>">
                  </td>
                  <input type="hidden" name="id_barang" value="<?= $id_barang ?>">
                </tr>
                <tr>
                  <td>Jumlah Masuk</td>
                  <td>
                    <input type="number" name="jml_masuk" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Masuk</td>
                  <td>
                    <input type="date" name="tgl_masuk" class="form-control">
                  </td>
                </tr>
                <tr>
                <td>Nama Suplier</td>
                <td>
                  <select name="id_suplier" class="form-control" required>
                    <option value=""> -- Pilih -- </option>
                    <?php
                    $qr = mysqli_query($koneksi, "SELECT * FROM suplier");
                    while ($d = mysqli_fetch_assoc($qr)) { ?>
                      <option value="<?= $d['id_suplier'] ?>">
                        <?= $d['nama_suplier'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              </table>
              <button type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-save"></i>
                </span>
                <span class="text font-weight-bold">Simpan</span>
              </button>
            </form>
          </div>
        </div>              
      </div>      
    </div>          
  <?php } ?>

</div>
<!-- /.container-fluid -->

<?php
include 'footer.php';
?>

<?php
if (isset($_POST['simpan'])) {
  $tgl_masuk = $_POST['tgl_masuk'];
  $jml_masuk = $_POST['jml_masuk'];
  $id_suplier = $_POST['id_suplier'];
  $id_barang = $_POST['id_barang'];

  $sql = mysqli_query($koneksi, " INSERT INTO barang_masuk VALUES('', '$tgl_masuk', '$jml_masuk', '$id_suplier', '$id_barang' )");

  $sql2 = mysqli_query($koneksi, "UPDATE barang SET jumlah_barang = jumlah_barang + $jml_masuk WHERE id_barang = $id_barang");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert ("Data Berhasil Di Simpan");
      window.location.href="barang_masuk.php";
    </script>      
    <?php  
  }
}
?>


