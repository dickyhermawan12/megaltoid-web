<?php

    $current_user = $_SESSION['user_id'];

    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $data_per_halaman = 3;
    $mulai_dari = ($pagination-1) * $data_per_halaman;

    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
    
    if (mysqli_num_rows($queryAdmin) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada data user yang dimasukkan!</div>";
    } else {
        echo "<div class='table-responsive'>
                <table class='table mt-3'>
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
        $no=1 + $mulai_dari;
		while($rowUser = mysqli_fetch_assoc($queryAdmin)){
			echo "<tr>
					<th scope='row'>$no</th>
                    <td>$rowUser[nama]</td>
                    <td>$rowUser[email]</td>
                    <td>$rowUser[phone]</td>
                    <td>$rowUser[level]</td>
                    <td>$rowUser[status]</td>
					<td>
                        <a class='btn btn-sm btn-cyan mr-2' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]'>Edit</a>";
            if ($rowUser['user_id'] == $current_user){
                echo "<a class='btn btn-sm btn-danger disabled' href='".BASE_URL."module/user/action.php?button=Delete&user_id=$rowUser[user_id]'>Delete</a>";
            } else {
                echo "<a class='btn btn-sm btn-danger' href='".BASE_URL."module/user/action.php?button=Delete&user_id=$rowUser[user_id]'>Delete</a>";
            }
					echo "</td>
                </tr>";

            $no++;
		}
        echo "</tbody>
            </table>
            </div>";

            $queryHitungUser = mysqli_query($koneksi, "SELECT * FROM user");
			pagination($queryHitungUser, $data_per_halaman, $pagination, "index.php?page=my_profile&module=user&action=list");
    }
?>