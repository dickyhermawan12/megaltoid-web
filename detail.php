<?php
    $barang_id = $_GET['barang_id'];

    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
    $row = mysqli_fetch_assoc($query);

?>

<div class="container my-3 border shadow-sm">
    <div class="row justify-content-center my-3">
        <div class="col-sm-4 d-flex align-items-center">
            <img src="<?php echo BASE_URL."images/barang/$row[gambar]"; ?>" class="w-100 shadow-sm">
        </div>
        <div class="col-sm-7">
            <div class="row text-center border-bottom py-2">
                <h4 class="col"><?php echo $row['nama_barang']; ?></h4>
            </div>
            <div class="row mt-3 justify-content-around">
                <div class="col-8">
                    <h4 class="text-danger"><?php echo rupiah($row['harga']); ?></h4>
                    <p class="font-small">Stok tersedia:<?php echo $row['stok']; ?></p>
                </div>
                <div class="col-4">
                    <?php
                        if ($row['stok']>1){
                            echo "<a href='#' class='btn btn-sm btn-success mb-2 disabled mr-3 float-right' style='opacity: 100%;'>Ready Stock</a>";
                        } else {
                            echo "<a href='#' class='btn btn-sm btn-dark text-white mb-2 disabled mr-3 float-right'>Stock Empty</a>";
                        }
                    ?>
                </div>
            </div>
            <div class="row py-3 border-bottom">
                <div class="col">
                    <?php
                        if($row['stok']>1){
                            echo "<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]' class='btn btn-secondary text-white'>Tambah ke Keranjang</a>";
                        } else {
                            echo "<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]' class='btn btn-secondary text-white disabled'>Tambah ke Keranjang</a>";
                        }
                    ?>
                </div>
            </div>
            <div class="row pt-3 pb-0">
                <div class="col px-3">
                    <p class="font-weight-bold" >Keterangan:</p>
                    <p><?php echo $row['spesifikasi']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
