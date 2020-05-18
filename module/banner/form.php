<?php

	$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
	
    $banner = "";
    $barang_id = "";
    $link = "";
    $gambar = "";
	$keterangan_gambar = "";
    $status = "";
    $button = "Add";
    
    if($banner_id != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
		$row = mysqli_fetch_array($queryBanner);
		
        $banner = $row["banner"];
        $barang_id = $row['barang_id'];
		$link = $row["link"];
		$gambar = "<img src='". BASE_URL."images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
		$keterangan_gambar = "(klik 'Pilih Gambar' untuk mengganti gambar baru)";
		$status = $row["status"];
    }   
?>

<?php
	if ($banner_id != ""){
		echo "<h4 class='mt-3 text-center red-accent-light py-3 rounded'>Update Banner</h4>";
	} else {
		echo "<h4 class='mt-3 text-center red-accent-light py-3 rounded'>Tambah Banner</h4>";
	}
?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"; ?>" method="POST" class="my-3" enctype="multipart/form-data">

	<div class="form-group">
        <label for="inputBanner">Nama Banner</label>
        <input type="text" class="form-control" id="inputBanner" name="banner" value="<?php echo $banner; ?>">
	</div>

    <div class="form-group">
		<label>Barang</label>
		<select class="form-control" name="barang_id">
            <?php
                $query = mysqli_query($koneksi, "SELECT barang_id, nama_barang FROM barang WHERE status='on' ORDER BY nama_barang ASC");
                while ($row = mysqli_fetch_assoc($query)){
                    if($kategori_id == $row['barang_id']){
                        echo "<option value='$row[barang_id]' selected='true'>$row[nama_barang]</option>";
                    }else{
                        echo "<option value='$row[barang_id]'>$row[nama_barang]</option>";
                    }
                }
            ?>
        </select>
    </div>
	
	<div class="form-group">
        <label for="inputGambar">Gambar <?php echo $keterangan_gambar; ?></label>
        <span>
            <input type="file" class="form-control-file" id="inputGambar" name="file"> <?php echo $gambar; ?>
        </span>
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