<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form"; ?>" class="btn btn-secondary my-3" role="button">+ Tambah Kota</a>

<?php

	$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");
	
	if (mysqli_num_rows($queryKota) == 0){
		echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada kota di dalam list!</div>";
	} else {
		echo "<table class='table table-bordered'>
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
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]'>Edit</a>
					</td>
				</tr>";
			
			$no++;
		}
		
		echo "</tbody>
			</table>";
	}
?>