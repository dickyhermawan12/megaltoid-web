<?php

    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $kategori = "";
    $status = "";
    $button = "Add";

    if($kategori_id){
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
        $rowKategori = mysqli_fetch_assoc($queryKategori);

        $kategori = $rowKategori['kategori'];
        $status = $rowKategori['status'];
        $button = "Update";
    }

?>

<?php
	if($kategori_id){
		echo "<h4 class='mt-3 text-center red-accent-light py-3 rounded'>Update Kategori</h4>";
	} else {
		echo "<h4 class='mt-3 text-center red-accent-light py-3 rounded'>Tambah Kategori</h4>";
	}
?>

<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST" class="my-3">

    <div class="form-group">
        <label for="inputKategori">Kategori</label>
        <input type="text" class="form-control" id="inputKategori" name="kategori" value="<?php echo $kategori; ?>">
    </div>

    <div class="row">
      <legend class="col-form-label col-sm-1 pt-0">Status</legend>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="radioStatusOn" value="on" <?php if($status == "on" || $status == ""){ echo "checked='true'"; } ?>>
          <label class="form-check-label" for="radioStatusOn">
            On
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="radioStatusOff" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?>>
          <label class="form-check-label" for="radioStatusOff">
            Off
          </label>
        </div>
      </div>
    </div>

    <button type="submit" class="form-group btn btn-secondary" name="button" value="<?php echo $button; ?>"><?php echo $button; ?></button>

</form>