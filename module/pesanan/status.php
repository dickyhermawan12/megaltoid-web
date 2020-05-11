<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
	$row = mysqli_fetch_assoc($query);
	$status = $row['status'];
	
?>
<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" class="mt-3">

    <div class="form-group">
            <label for="PesananId">Pesanan Id (Faktur Id)</label>
            <input type="text" class="form-control" id="PesananId" value=<?php echo $pesanan_id; ?> readonly="true">
    </div>

    <div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
            <?php
                foreach($arrayStatusPesanan AS $key => $value){
                    if($status == $key){
                        echo "<option value='$key' selected='true'>$value</option>";
                    }
                    else{
                        echo "<option value='$key'>$value</option>";
                    }
                }
			?>
        </select>
    </div>
	
	<button type="submit" class="form-group btn btn-secondary" value="edit_status" name="button">Ubah Status</button>
	
</form>  