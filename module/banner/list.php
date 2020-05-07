<a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=form"; ?>" class="btn btn-secondary my-3" role="button">+ Tambah Banner</a>

<?php       
    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");
        
    if(mysqli_num_rows($queryBanner) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada banner di dalam database!</div>";
    } else {
        echo "<table class='table table-bordered'>";
            
        echo "<thead class='thead-dark'>
                <tr>
				<th scope='col'>No</th>
                <th scope='col'>Banner</th>
                <th scope='col'>Link</th>
                <th scope='col'>Status</th>
				<th scope='col'>Action</th>
                </tr>
             </thead>";
             
        $no=1;
        echo "<tbody>";
        while($rowBanner=mysqli_fetch_array($queryBanner)){
            echo "<tr>
					<th scope='row'>$no</td>
                    <td>$rowBanner[banner]</td>
                    <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a>
                    </td>
					<td>$rowBanner[status]</td>
					<td><a href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]'>Edit</a>
					</td>
                  </tr>";
				  
            $no++;
        }
        echo "</tbody>";
        echo "</table>";
    }
?>