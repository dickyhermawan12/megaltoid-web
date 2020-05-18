<?php
	$search = isset($_GET["search"]) ? $_GET["search"] : false;
?>
<div class="row">
	<div class="col">
		<a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="btn btn-indigo btn-sm my-3" role="button">+ Tambah Barang</a>	
	</div>
	<div class="col">
		<form class="form-inline float-right mt-2" action="<?php echo BASE_URL."index.php"; ?>" method="GET">
			<input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>">
			<input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>">
			<input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
			<div class="form-group">
				<input type="text" class="form-control form-control-sm" name="search" value="<?php echo $search;?>">
			</div>
			<input class="btn btn-elegant btn-sm" type="submit" value="Search">
		</form>
	</div>
</div>

<?php

	$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
	$data_per_halaman = 5;
	$mulai_dari = ($pagination-1) * $data_per_halaman;

	$where = "";
	$search_url = "";
	if($search){
		$search_url = "&search=$search";
		$where = "WHERE barang.nama_barang LIKE '%$search%'";
	}

	$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori USING(kategori_id) $where LIMIT $mulai_dari, $data_per_halaman");
	
	if (mysqli_num_rows($query) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada barang di dalam tabel barang!</div>";
	} else {
		echo "<div class='table-responsive'>
				<table class='table'>
					<thead class='thead-dark'>
						<tr>
							<th scope='col'>No</th>
							<th scope='col'>Barang</th>
							<th scope='col'>Kategori</th>
							<th scope='col'>Harga</th>
							<th scope='col'>Status</th>
							<th scope='col'>Action</th>
						</tr>
					</thead>
					<tbody>";
		$no = 1 + $mulai_dari;
		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>
					<th scope='row'>$no</th>
                    <td>$row[nama_barang]</td>
                    <td>$row[kategori]</td>
                    <td>".rupiah($row['harga'])."</td>
					<td>$row[status]</td>
					<td>
						<a class='btn btn-sm btn-cyan' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
						<a class='btn btn-sm btn-danger' href='".BASE_URL."module/barang/action.php?button=Delete&barang_id=$row[barang_id]'>Delete</a>
					</td>
				</tr>";

            $no++;
		}
		echo "</tbody>
			</table>
			</div>";

			$queryHitungBarang = mysqli_query($koneksi, "SELECT * FROM barang $where");
			pagination($queryHitungBarang, $data_per_halaman, $pagination, "index.php?page=my_profile&module=barang&action=list$search_url");
	
	}

?>