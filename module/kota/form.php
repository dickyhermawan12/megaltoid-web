<?php

	$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
	
	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if ($kota_id){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
		$row = mysqli_fetch_assoc($queryKota);
		
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}
		
?>

<?php
	if ($kota_id){
		echo "<h4 class='mt-3 text-center red-accent-light py-3 rounded'>Update Kota</h4>";
	} else {
		echo "<h4 class='mt-3 text-center red-accent-light py-3 rounded'>Tambah Kota</h4>";
	}
?>

<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"?>" method="post" class="my-3">

	<div class="form-group">
        <label for="inputNamaKota">Nama Kota</label>
        <input type="text" class="form-control" id="inputNamaKota" name="kota" value="<?php echo $kota; ?>">
	</div>
	
	<div class="form-group">
        <label for="inputTarif">Tarif Kirim</label>
        <input type="text" class="form-control" id="inputTarif" name="tarif" value="<?php echo $tarif; ?>">
    </div>		

	<div class="row">
		<legend class="col-form-label col-sm-1 pt-0">Status</legend>
		<div class="col-sm-10">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="status" id="radioStatusOn" value="on" <?php if($status == "on" || $status == ""){ echo "checked='true'"; } ?>>
				<label class="form-check-label" for="radioStatusOn">On</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="status" id="radioStatusOff" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?>>
				<label class="form-check-label" for="radioStatusOff">Off</label>
			</div>
		</div>
    </div>	
	
	<button type="submit" class="form-group btn btn-secondary" name="button" value="<?php echo $button; ?>"><?php echo $button; ?></button>
	
</form>		