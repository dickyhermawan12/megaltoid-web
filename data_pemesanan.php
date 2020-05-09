<?php
    if ($user_id == false){
        $_SESSION["proses_pesanan"] = true;

        header("location: ".BASE_URL."index.php?page=login");
        exit;
    }
?>

<div class="container py-4 border shadow-sm">
    <div class="row">
        <div class="col-sm-7 px-5">
            <form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">

                <h3 class="text-center mt-3 mb-4">Form Pengiriman Barang</h3>

                <div class="form-group">
                    <label for="inputNama">Nama Penerima</label>
                    <input type="text" class="form-control" id="inputNama" name="nama_penerima">
                </div>
                <div class="form-group">
                    <label for="inputNoHP">Nomor Telepon</label>
                    <input type="text" class="form-control" id="inputNoHP" name="nomor_telepon">
                </div>
                <div class="form-group">
                    <label for="inputAlamat">Alamat Pengiriman</label>
                    <textarea class="form-control" id="inputAlamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control" name="kota">
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kota WHERE status='on'");

                            while ($row = mysqli_fetch_assoc($query)){
                                echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary text-white" value="register">Submit</button>
                </div>

            </form>
        </div>

        <div class="col-sm-5">
            <h3 class="text-center mt-3 mb-4">Detail Order</h3>

            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $no = 1;
                        $subtotal = 0;

                        foreach ($keranjang as $key => $value){
                            $barang_id = $key;
                            
                            $nama_barang = $value["nama_barang"];
                            $harga = $value["harga"];
                            $quantity = $value["quantity"];
                            
                            $total = $quantity * $harga;
                            $subtotal = $subtotal + $total;
                            
                            echo  "<tr class='text-center'>
                                    <th scope='row'>$no</td>
                                    <td>$nama_barang</td>
                                    <td>$quantity</td>
                                    <td class='text-left'>".rupiah($total)."</td>
                                    </tr>";


                            $no++;
                        }

                        echo "<tr>
                                <th class='bg-dark text-light text-center' scope='row' colspan='3'><b>Sub Total</b></td>
                                <td class='text-left'><b>".rupiah($subtotal)."</b></td>
                            </tr>
                        </tbody>
                        </table>";
                    ?>
            </div>
        </div>
    </div>
</div>