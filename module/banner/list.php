<?php
	$search = isset($_GET["search"]) ? $_GET["search"] : false;
?>

<div class="row">
	<div class="col">
		<a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=form"; ?>" class="btn btn-indigo btn-sm my-3" role="button">+ Tambah Banner</a>
	</div>
	<div class="col">
		<form class="form-inline float-right mt-2" action="<?php echo BASE_URL."index.php"; ?>" method="GET">
			<input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>">
			<input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>">
			<input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
			<div class="form-group">
				<input type="text" class="form-control form-control-sm" name="search" value="<?php echo $search; ?>">
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
		$where = "WHERE banner.banner LIKE '%$search%'";
	}

    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner $where ORDER BY banner_id DESC LIMIT $mulai_dari, $data_per_halaman");
        
    if (mysqli_num_rows($queryBanner) == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada banner di dalam database!</div>";
    } else {
        echo "<div class='table-responsive'>
                <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>No</th>
                            <th scope='col'>Banner</th>
                            <th scope='col'>Link</th>
                            <th scope='col'>Status</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
        
        $no = 1 + $mulai_dari;
        while($rowBanner = mysqli_fetch_array($queryBanner)){
            echo "<tr>
					<th scope='row'>$no</th>
                    <td>$rowBanner[banner]</td>
                    <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
                    <td>$rowBanner[status]</td>
                    <td>
                        <a class='btn btn-sm btn-cyan' href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]'>Edit</a>
                        <a class='btn btn-sm btn-danger' href='".BASE_URL."module/banner/action.php?button=Delete&banner_id=$rowBanner[banner_id]'>Delete</a>
                    </td>
                </tr>";
                
            $no++;
        }
        echo "</tbody>
            </table>
            </div>";

            $queryHitungBanner = mysqli_query($koneksi, "SELECT * FROM banner $where");
			pagination($queryHitungBanner, $data_per_halaman, $pagination, "index.php?page=my_profile&module=banner&action=list");
    }
?>