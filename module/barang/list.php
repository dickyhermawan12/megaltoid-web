<a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="btn btn-secondary my-3" role="button">+ Tambah Barang</a>

<?php

	$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori USING(kategori_id)");
	
	if(mysqli_num_rows($query) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada barang di dalam tabel barang!</div>";
	} else {
	
		echo "<table class='table table-bordered'>";
		
        echo "<thead class='thead-dark'>
                <tr>
				<th scope='col'>No</th>
                <th scope='col'>Barang</th>
                <th scope='col'>Kategori</th>
                <th scope='col'>Harga</th>
				<th scope='col'>Status</th>
				<th scope='col'>Action</th>
                </tr>
			 </thead>";
			 
		$no=1;
		echo "<tbody>";
		while($row=mysqli_fetch_assoc($query)){
			echo "<tr>
					<th scope='row'>$no</td>
                    <td>$row[nama_barang]</td>
                    <td>$row[kategori]</td>
                    <td>".rupiah($row['harga'])."</td>
					<td>$row[status]</td>
					<td>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
					</td>
                  </tr>";
				  
            $no++;
		}
        echo "</tbody>";
		echo "</table>";
	
	}

?>