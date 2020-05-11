<?php

	if($level == "superadmin"){
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
	}else{
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
	}
	
	if(mysqli_num_rows($queryPesanan) == 0){
		echo "<div class='alert alert-warning mt-3' role='alert'>Saat ini belum ada data pesanan</div>";
	}
	else{

        echo "<div class='table-responsive mt-3'>
				<table class='table'>
					<thead class='thead-dark'>
						<tr>
							<th scope='col'>No Pesanan</th>
							<th scope='col'>Status</th>
							<th scope='col'>Nama</th>
							<th scope='col'>Action</th>
						</tr>
					</thead>
					<tbody>";
		
		$adminButton = "";
		while($row=mysqli_fetch_assoc($queryPesanan)){
			if($level == "superadmin"){
				$adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
			}
		
            $status = $row['status'];
            
            echo "<tr>
					<th scope='row'>$row[pesanan_id]</th>
					<td>$arrayStatusPesanan[$status]</td>
					<td>$row[nama]</td>
					<td>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
                        $adminButton
                    </td>
				</tr>";

		}
		
		echo "</tbody>
			</table>
			</div>";
	}
	
?>