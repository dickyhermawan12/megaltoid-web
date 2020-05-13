<div class="container mt-4">
    <div class="jumbotron jumbotron-fluid py-0 rounded shadow-sm" style="background-color: white;">
        <div class="row justify-content-center">
            <?php
                $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");
                $no=1;
                if(mysqli_num_rows($queryBanner) == 0){
                    echo "<div class='col bg-danger' style='height: 500px; max-width: 860px'></div>";
                } else {
                    echo "<div id='main-carousel' class='carousel slide col' data-ride='carousel' style='max-width: 860px;'>
                    <div class='carousel-inner'>";
                    while($row=mysqli_fetch_assoc($queryBanner)){
                        if ($no==1){
                            echo "<div class='carousel-item active'>
                            <a href='".BASE_URL."$row[link]'>
                                <img src='".BASE_URL."images/slide/$row[gambar]' class='d-block w-100' alt='$row[banner]'>
                            </a>
                            </div>";
                        } else {
                            echo "<div class='carousel-item'>
                            <a href='".BASE_URL."$row[link]'>
                                <img src='".BASE_URL."images/slide/$row[gambar]' class='d-block w-100' alt='$row[banner]'>
                            </a>
                            </div>";
                        }
                        $no++;
                    }
                    echo "</div>
                            <a class='carousel-control-prev' href='#main-carousel' role='button' data-slide='prev'>
                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Previous</span>
                            </a>
                            <a class='carousel-control-next' href='#main-carousel' role='button' data-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Next</span>
                            </a>
                        </div>";
                }
            ?>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row justify-content-center">
        <?php
            echo kategori($kategori_id);
        ?>

        <div class="col-sm-9">
            <?php

                $data_per_halaman = 6;
                $mulai_dari = ($pagination-1) * $data_per_halaman;

				if($kategori_id){
					$kategori_id = "AND kategori_id='$kategori_id'";
				}

                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' $kategori_id ORDER BY barang_id DESC LIMIT $mulai_dari, $data_per_halaman");
				
                $no=1;
                echo "<div>";
				while($row=mysqli_fetch_assoc($query)){

					if($no%3==1){
                        echo "<div class='row row-cols-1 row-cols-md-3'>";
					}
					
                    echo "<div class='col mb-4'>
                            <div class='card h-100 border shadow-sm'>
                                <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
                                    <img src='".BASE_URL."images/barang/$row[gambar]' class='card-img-top' alt='$row[nama_barang]'>
                                </a>
                                <div class='card-body'>";
                                    if($row['stok']>1){
                                        echo "<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]' class='btn btn-sm btn-success disabled mb-2' style='opacity: 100%;'>Ready Stock";
                                    } else {
                                        echo "<a href='#' class='btn btn-sm btn-dark mb-2 disabled'>Stock Empty";
                                    }
                                    echo "</a>
                                    <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
                                        <h5 class='card-title'>$row[nama_barang]</h5>
                                    </a>
                                    <p class='card-text text-warning font-weight-bold'>".rupiah($row['harga'])."</p>
                                </div>
                            </div>
                        </div>";
                        
                    if($no%3==0){
                        echo "</div>";
                    }
                    $no++;
                }
                echo "</div>";

                echo "<div>";
                $queryHitungCard = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on'");
                pagination($queryHitungCard, $data_per_halaman, $pagination, "index.php");
                echo "</div>";

			?>

        </div>
    </div>

</div>

<script>
    $( document ).ready(function() {
        new WOW().init();
    });
</script>