<?php
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
    
    if (mysqli_num_rows($queryAdmin) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada data user yang dimasukkan!</div>";
    } else {
        echo "<table class='table table-bordered mt-3'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col' class='pb-4'>No</th>
                        <th scope='col' class='pb-4'>Nama</th>
                        <th scope='col' class='pb-4'>Email</th>
                        <th scope='col'>Nomor Telepon</th>
                        <th scope='col' class='pb-4'>Level</th>
                        <th scope='col' class='pb-4'>Status</th>
                        <th scope='col' class='pb-4'>Action</th>
                    </tr>
                </thead>
                <tbody>";
        $no=1;
		while($rowUser = mysqli_fetch_assoc($queryAdmin)){
			echo "<tr>
					<th scope='row'>$no</th>
                    <td>$rowUser[nama]</td>
                    <td>$rowUser[email]</td>
                    <td>$rowUser[phone]</td>
                    <td>$rowUser[level]</td>
                    <td>$rowUser[status]</td>
					<td>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]'>Edit</a>
					</td>
                </tr>";

            $no++;
		}
        echo "</tbody>
            </table>";
    }
?>