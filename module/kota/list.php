<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form"; ?>" class="btn btn-secondary my-3" role="button">+ Tambah Kota</a>

<?php

	$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
	$data_per_halaman = 5;
	$mulai_dari = ($pagination-1) * $data_per_halaman;

	$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC LIMIT $mulai_dari, $data_per_halaman");
	
	if (mysqli_num_rows($queryKota) == 0){
		echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada kota di dalam list!</div>";
	} else {
		echo "<div class='table-responsive'>
				<table class='table'>
					<thead class='thead-dark'>
						<tr>
							<th scope='col'>No</th>
							<th scope='col'>Kota</th>
							<th scope='col'>Tarif</th>
							<th scope='col'>Status</th>
							<th scope='col'>Action</th>
						</tr>
					</thead>
					<tbody>";
		$no = 1;
		while($rowKota = mysqli_fetch_assoc($queryKota)){
			echo "<tr>
					<th scope='row'>$no</th>
					<td>$rowKota[kota]</td>
					<td>".rupiah($rowKota['tarif'])."</td>
					<td>$rowKota[status]</td>
					<td>
						<a class='btn btn-sm btn-primary' href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]'>Edit</a>
					</td>
				</tr>";
			
			$no++;
		}
		
		echo "</tbody>
			</table>
			</div>";

			$queryHitungKota = mysqli_query($koneksi, "SELECT * FROM kota");
			pagination($queryHitungKota, $data_per_halaman, $pagination, "index.php?page=my_profile&module=kota&action=list");
	}
?>