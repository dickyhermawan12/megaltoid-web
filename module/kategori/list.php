<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form"; ?>" class="btn btn-secondary my-3" role="button">+ Tambah Kategori</a>

<?php  

    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");

    if (mysqli_num_rows($queryKategori) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada nama kategori di dalam tabel kategori!</div>";
    } else {
        echo "<div class='table-responsive'>
                <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>No</th>
                            <th scope='col'>Kategori</th>
                            <th scope='col'>Status</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
        $no=1;
        while($rowKategori = mysqli_fetch_assoc($queryKategori)){
            echo "<tr>
					<th scope='row'>$no</th>
                    <td>$rowKategori[kategori]</td>
					<td>$rowKategori[status]</td>
                    <td>
                        <a class='btn btn-sm btn-primary' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$rowKategori[kategori_id]'>Edit</a>
					</td>
                </tr>";

            $no++;
        }
        
        echo "</tbody>
            </table>
            </div>";
    }

?>