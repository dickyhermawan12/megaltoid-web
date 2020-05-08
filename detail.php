<?php
    $barang_id = $_GET['barang_id'];

    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
    $row = mysqli_fetch_assoc($query);

?>

<div class="container my-3 border">
    <div class="row justify-content-center my-3">
        <div class="col-sm-4">
            <img src="<?php echo BASE_URL."images/barang/$row[gambar]"; ?>" class="w-100">
        </div>
        <div class="col-sm-7">
            <div class="row text-center border-bottom py-2">
                <h4 class="col"><?php echo $row['nama_barang']; ?><h3>
            </div>
            <div class="row mt-3 justify-content-around">
                <h4 class="col-9 text-danger"><?php echo rupiah($row['harga']); ?></h4>
                <?php
                    if ($row['stok']>1){
                        echo "<a href='#' class='btn btn-sm btn-success mb-2 col disabled mr-3' style='opacity: 100%;'>Ready Stock</a>";
                    } else {
                        echo "<a href='#' class='btn btn-sm btn-secondary mb-2 col disabled mr-3'>Stock Empty</a>";
                    }
                ?>
            </div>
            <div class="row py-3 border-bottom">
                <div class="col">
                    <?php
                        if($row['stok']>1){
                            echo "<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]' class='btn btn-danger'>Tambah ke Keranjang</a>";
                        } else {
                            echo "<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]' class='btn btn-danger disabled'>Tambah ke Keranjang</a>";
                        }
                    ?>
                </div>
            </div>
            <div class="row pt-3">
                <p class="col font-weight-bold" >Keterangan:</p>
            </div>
            <div class="row">
                <p class="col"><?php echo $row['spesifikasi']; ?></p>
            </div>
        </div>
    </div>
</div>
