<?php
	
	$pesanan_id= $_GET["pesanan_id"];
	
	$query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");
	
	$row=mysqli_fetch_assoc($query);
	
	$tanggal_pemesanan = $row['tanggal_pemesanan'];
	$nama_penerima = $row['nama_penerima'];
	$nomor_telepon = $row['nomor_telepon'];
	$alamat = $row['alamat'];
	$tarif = $row['tarif'];
	$nama = $row['nama'];
	$kota = $row['kota'];
	
?>

<div>
	<h3 class="text-center py-3 border-bottom">Detail Pesanan</h3>

    <div class="table-responsive my-3">
		<table>
			<tr>
                <td>Nomor Faktur</td>
                <td>:</td>
                <td><?php echo $pesanan_id; ?></td>
            </tr>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <td>Nama Penerima</td>
                <td>:</td>
                <td><?php echo $nama_penerima; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $alamat; ?></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><?php echo $nomor_telepon; ?></td>
            </tr>		
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>:</td>
                <td><?php echo $tanggal_pemesanan; ?></td>
                </tr>	
        </table>	
    </div>
</div>

    <div class='table-responsive'>
		<table class='table'>
			<thead class='thead-dark'>
				<tr>
                    <th scope='col'>No</th>
                    <th scope='col'>Nama Barang</th>
                    <th scope='col'>Qty</th>
                    <th scope='col'>Harga Satuan</th>
                    <th scope='col'>Total</th>
				</tr>
            </thead>
            <tbody>
		
		<?php
		
			$queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
			
			$no = 1;
			$subtotal = 0;
			while ($rowDetail = mysqli_fetch_assoc($queryDetail)){
			
				$total = $rowDetail["harga"] * $rowDetail["quantity"];
				$subtotal = $subtotal + $total;
				
				echo "<tr>
						<th scope='row'>$no</th>
						<td>$rowDetail[nama_barang]</td>
						<td>$rowDetail[quantity]</td>
						<td>".rupiah($rowDetail["harga"])."</td>
						<td>".rupiah($total)."</td>
					  </tr>";
				
				$no++;
			}
		
			$subtotal = $subtotal + $tarif;
		?>
		
		<tr>
			<th scope="row" colspan="4" class="text-center">Biaya Pengiriman</th>
			<td><?php echo rupiah($tarif); ?></td>
		</tr>

		<tr>
			<th scope="row" colspan="4" class="text-center bg-dark text-white">Sub total</th>
			<td><b><?php echo rupiah($subtotal); ?></td>
		</tr>
		</tbody>
	</table>
	
	<?php
		$row = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pesanan_id, status FROM pesanan WHERE pesanan_id=$pesanan_id"));
		
		if($row['status'] == 0) {
			echo "<div class='alert alert-info' role='alert'>
				<h4 class='alert-heading'>One More Step!</h4>
				<hr>
				<p>Lakukan pembayaran ke rekening bank XXX<br>
					<strong>Nomor Account: 0101-1919-3131</strong>
				</p>
				<hr>
				<p class='mb-0'>Setelah selesai, silakan lakukan konfirmasi pada tombol di bawah ini.</p>
				<a class='btn btn-secondary' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id'>Saya telah melakukan pembayaran</a>.
			</div>";
		} elseif($row['status'] == 1){
			echo "<div class='alert alert-info' role='alert'>
				<h4 class='alert-heading'>Pembayaran sedang di validasi!</h4>
				<hr>
				<p>Saat ini tim Megaltoid sedang melakukan pengecekan pembayaran Anda. Proses ini tidak akan memakan waktu lebih dari satu hari.<br>
				Segera setelah pembayaran Anda divalidasi, kami akan segera mengirimkan pesanan Anda ke tujuan yang telah Anda tentukan.
				</p>
				</div>";
		} elseif($row['status'] == 2) {
			echo "<div class='alert alert-success' role='alert'>
				<h4 class='alert-heading'>Pembayaran Anda telah diterima!</h4>
				<hr>
				<p>Terima kasih atas kepercayaan Anda. Silakan tunggu hingga barang Anda sampai ke alamat yang Anda cantumkan.</p>
				</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>
				<h4 class='alert-heading'>Pembayaran Anda ditolak!</h4>
				<hr>
				<p>Mohon maaf, kami tidak dapat memvalidasi data pembayaran Anda. Kami telah memberikan informasi kegagalan pembayaran ini pada email Anda beserta alasannya.</p>
				</div>";
		}
		

