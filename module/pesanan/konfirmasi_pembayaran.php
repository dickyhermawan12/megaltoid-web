<?php

	$pesanan_id = $_GET["pesanan_id"];

?>

<h3 class="text-center py-3 border-bottom">Konfirmasi Pembayaran</h3>

<div class="container">

    <form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"?>" method="POST" class="my-3">

        <div class="form-group">
            <label for="inputNoRekening">Nomor Rekening</label>
            <input type="text" class="form-control" id="inputNoRekening" name="nomor_rekening">
        </div>

        <div class="form-group">
            <label for="inputNamaAccount">Nama Account</label>
            <input type="text" class="form-control" id="inputNamaAccount" name="nama_account">
        </div>

        <div class="form-group">
            <label for="inputTanggalTransfer">Tanggal Transfer (Format: YYYY-MM-DD)</label>
            <input type="text" class="form-control" id="inputTanggalTransfer" name="tanggal_transfer">
        </div>	
        
        <button type="submit" class="form-group btn btn-secondary" name="button" value="konfirmasi">Konfirmasi Pembayaran</button>
        
    </form>

</div>
