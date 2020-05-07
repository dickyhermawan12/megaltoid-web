<div class="container my-3">
        <?php
            echo kategori($kategori_id);
        ?>

    <div class="col-9">
        <?php
            $barang_id = $_GET['barang_id'];

            $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
            $row = mysqli_fetch_assoc($query);

            echo "<div class='detail-barang'>
                    <h2>$row[nama_barang]<h2>
                    <div class='frame-gambar'>
                        <img src='".BASE_URL."images/barang/$row[gambar]' />
                    </div>
                    <div class='frame-harga'>
                        <span>".rupiah($row['harga'])."</span>
                        <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>+tambah ke keranjang</a>
                    </div>
                    <div class='keterangan'>
                        <b>Keterangan : </b> $row[spesifikasi]
                    </div>
                </div>"
        ?>
    </div>
</div>
