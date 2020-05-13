<?php

	$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
	$data_per_halaman = 5;
	$mulai_dari = ($pagination-1) * $data_per_halaman;

	if($level == "superadmin"){
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $mulai_dari, $data_per_halaman");
	}else{
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $mulai_dari, $data_per_halaman");
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
							<th scope='col' style='max-width: 160px;'>Action</th>
						</tr>
					</thead>
					<tbody>";
		
		$adminButton = "";
		$no = 1 + $mulai_dari;
		while($row=mysqli_fetch_assoc($queryPesanan)){
			if($level == "superadmin"){
				$adminButton = "<a class='btn btn-sm btn-primary' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
			}
		
            $status = $row['status'];
            
            echo "<tr>
					<th scope='row'>$row[pesanan_id]</th>
					<td>$arrayStatusPesanan[$status]</td>
					<td>$row[nama]</td>
					<td style='max-width: 160px;'>
						<a class='btn btn-sm btn-pink' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
                        $adminButton
                    </td>
				</tr>";
				
			$no++;

		}
		
		echo "</tbody>
			</table>
			</div>";

		$queryHitungPesanan = mysqli_query($koneksi, "SELECT * FROM pesanan");
		pagination($queryHitungPesanan, $data_per_halaman, $pagination, "index.php?page=my_profile&module=pesanan&action=list");
	}
	
?>