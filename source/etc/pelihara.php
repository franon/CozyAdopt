<?php
  if (isset($_POST['id_kucing'])) {
    if (file_exists('db.php')) {
      include 'db.php';
    }
    $id_kucing = $_POST['id_kucing'];
    $nama_kucing = $_POST['nama'];
    $img_kucing1 = $_POST['img'];
    $jenis_kucing = $_POST['jenis_kucing'];
    $umur_kucing = $_POST['umur_kucing'];
    $warna_kucing = $_POST['warna_kucing'];
    $bulu_kucing = $_POST['bulu_kucing'];
    $jk_kucing = $_POST['jk_kucing'];
    $stmt = $mysqli->prepare("SELECT info_kucing, info_khusus_kucing FROM kucing WHERE id_kucing = ?");
    $stmt->bind_param("s", $id_kucing);
    $stmt->execute();
    $stmt->bind_result($info_kucing, $info_khusus_kucing);
    $stmt->fetch();
    $stmt->close();
    switch($umur_kucing) {
      case "Kitten": $umur_kucing = "Masih Anak Kucing"; break;
      case "Young": $umur_kucing = "Muda"; break;
      case "Adult": $umur_kucing = "Dewasa"; break;
      case "Senior": $umur_kucing = "Senior"; break;
    }
  } else {
    header("Location: index.php");
  }
 ?>
<div class="pelihara">
  <div class="exit">
    <div class="close-container">
    </div>
    <i class="fas fa-window-close"></i>
  </div>
  <div class="isi_pelihara">
    <div class="data-pelihara">
      <div class="gambar-pelihara">
        <img src="source/img/kucing/<?php echo $img_kucing1 ?>" alt="">
      </div>
      <div class="data-kucing">
        <div class="head-data-kucing">
          <p class="text-center h1"><?php echo $nama_kucing ?></p>
          <p class="text-justify"><strong>Lokasinya</strong></p>
          <p class="text-justify"><strong><?php echo $jenis_kucing. " . ". $jk_kucing . " . ". $warna_kucing?></strong></p>
          <hr>
          <p class="text-center h1">Tentang <?php echo $nama_kucing ?></p>
          <p class="justify"> <strong><?php echo $nama_kucing . " Berbulu ". $bulu_kucing?></strong> </p>
          <p class="justify"> <strong><?php echo "Umur ".$nama_kucing. " " .$umur_kucing?></strong> </p>
          <br>
          <div class="bio-kucing">
            <p class="text-center">
              <button class="rawatpelihara" val="<?php echo $id_kucing ?>" type="button" name="button">Rawat dan Pelihara <?php echo $nama_kucing ?></button>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="bio-kucing">
      <p class="h1 text-justify">Info <?php echo $nama_kucing ?></p>
      <p> <strong><?php echo $info_kucing ?></strong> </p>

      <p class="h1 text-justify">Info Khusus Tentang <?php echo $nama_kucing ?></p>
      <p> <strong><?php echo $info_khusus_kucing ?></strong> </p>
    </div>
  </div>
</div>