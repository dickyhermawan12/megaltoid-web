<?php

	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
	
    $nama_barang = "";
    $kategori_id = "";
    $spesifikasi = "";
    $stok = "";
    $harga = "";
    $gambar = "";
	$status = "";
	$button = "Add";
	
	if($barang_id){
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		$row = mysqli_fetch_assoc($query);
        
        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $spesifikasi = $row['spesifikasi'];
        $gambar = $row['gambar'];
        $harga = $row['harga'];
        $stok = $row['stok'];
		$status = $row['status'];
		$button = "Update";
        $gambar = "<img src='".BASE_URL."images/barang/$gambar' style='width: 200px;vertical-align: middle;' />";
    }
    
?>

<?php
	if($barang_id){
		echo "<h4 class='mt-3 text-center bg-secondary text-white py-3 rounded'>Update Barang</h4>";
	} else {
		echo "<h4 class='mt-3 text-center bg-secondary text-white py-3 rounded'>Tambah Barang</h4>";
	}
?>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" class="mt-3" enctype="multipart/form-data">

	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="kategori_id">
            <?php
                $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                while ($row = mysqli_fetch_assoc($query)){
                    if($kategori_id == $row['kategori_id']){
                        echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                    }else{
                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="inputNamaBarang">Nama Barang</label>
        <input type="text" class="form-control" id="inputNamaBarang" name="nama_barang" value="<?php echo $nama_barang; ?>">
    </div>

    <div class="form-group">
        <label for="inputSpesifikasi">Spesifikasi</label>
        <textarea class="form-control" id="inputSpesifikasi" name="spesifikasi"><?php echo $spesifikasi; ?></textarea>
    </div>

    <div class="form-group">
        <label for="inputStok">Jumlah Stok</label>
        <input type="text" class="form-control" id="inputStok" name="stok" value="<?php echo $stok; ?>">
    </div>

    <div class="form-group">
        <label for="inputHarga">Harga</label>
        <input type="text" class="form-control" id="inputHarga" name="harga" value="<?php echo $harga; ?>">
    </div>

    <div class="form-group">
        <label for="inputGambar">Gambar Produk</label>
        <span>
            <input type="file" class="form-control-file" id="inputGambar" name="file"> <?php echo $gambar; ?>
        </span>
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