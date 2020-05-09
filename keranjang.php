<?php

    echo "<div class='container-fluid shadow-sm pb-3 d-flex flex-column justify-content-around'>";

    if ($totalBarang == 0){
        echo "<div class='col mt-3'>
        <div class='alert alert-warning text-center' role='alert'>Saat ini belum ada data di dalam keranjang belanja anda</div>
        </div>";
    } else {
        echo "<div class='container-fluid text-center pb-3'><h2>Keranjang Belanja</h2></div>";
        $no=1;
        echo "<div class='table-responsive my-3'>
                <table class='table table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>No</th>
                            <th scope='col'>Image</th>
                            <th scope='col'>Nama Barang</th>
                            <th scope='col' style='min-width: 60px; max-width: 80px;'>Qty</th>
                            <th scope='col'>Harga Satuan</th>
                            <th scope='col'>Total</th>
                        </tr>
                    </thead>
                    <tbody>";
        
        $subtotal = 0;
        foreach($keranjang AS $key => $value){
            $barang_id = $key;

            $nama_barang = $value["nama_barang"];
            $quantity = $value["quantity"];
            $gambar = $value["gambar"];
            $harga = $value["harga"];

            if(empty($quantity)){
                $quantity = 0;
            }
            $total = $quantity * $harga;
            $subtotal = $subtotal + $total;

            echo "<tr class='text-center'>
                    <th scope='row'>$no</td>
                    <td><img src='".BASE_URL."images/barang/$gambar' id='table-image'></td>
                    <td>$nama_barang</td>
                    <td style='min-width: 60px; max-width: 80px;'><input class='update-quantity form-control text-right pr-1' type='text' name='$barang_id' value='$quantity'></td>
                    <td class='text-left'>".rupiah($harga)."</td>
                    <td class='text-left'>
                        <p>".rupiah($total)."</p>
                        <a href='".BASE_URL."hapus_item.php?barang_id=$barang_id' class='btn btn-sm btn-danger'>Hapus</a>
                    </td>
                </tr>";
            
            $no++;
        }

        echo "<tr>
                <th class='bg-dark text-light text-center' scope='row' colspan='5'><b>Sub Total</b></td>
                <td class='text-left'><b>".rupiah($subtotal)."</b></td>
            </tr>
        </tbody>
        </table>
        </div>";
    }

    echo "<div class='container'>
            <div class='row justify-content-between'>
                <div class='col-3'><a href='".BASE_URL."index.php' class='btn btn-secondary text-white'>Lanjut Belanja</a></div>";
                if($totalBarang == 0){
                    echo "<div class='col-3'><a href='".BASE_URL."index.php?page=data_pemesanan' class='btn btn-secondary text-white disabled' style='float: right;'>Lanjut Pemesanan</a></div>";
                } else {
                    echo "<div class='col-3'><a href='".BASE_URL."index.php?page=data_pemesanan' class='btn btn-secondary text-white' style='float: right;'>Lanjut Pemesanan</a></div>";
                }
        echo "</div>
        </div>
        </div>";
?>

<script>

    $(document).ready(function(e) {
        var timer;
        $(".update-quantity").bind('keydown').on("input", function(e){
            var barang_id = $(this).attr("name");
            var value = $(this).val();
            
            clearTimeout(timer);
            timer = setTimeout(function(){
                $.ajax({
                    method: "POST",
                    url: "update_keranjang.php",
                    data: "barang_id="+barang_id+"&value="+value
                })
                .done(function(data){
                    location.reload();
                });
            }, 1000);
            
        });   
    });

</script>