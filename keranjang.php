<?php

    if($totalBarang == 0){
        echo "<div class='alert alert-warning' role='alert'>Saat ini belum ada data di dalam keranjang belanja anda</div>";
    }else{

        $no=1;
        echo "<table class='table table-bordered'>";

        echo "<thead class='thead-dark'>
                <tr>
				<th scope='col'>No</th>
                <th scope='col'>Image</th>
                <th scope='col'>Nama Barang</th>
				<th scope='col' style='width: 90px;'>Qty</th>
                <th scope='col'>Harga Satuan</th>
                <th scope='col'>Total</th>
                </tr>
             </thead>";
        echo "<tbody>";
        
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
                    <td><img src='".BASE_URL."images/barang/$gambar' height='100px'></td>
                    <td>$nama_barang</td>
                    <td style='width: 90px;'><input class='update-quantity form-control text-right pr-1' type='text' name='$barang_id' value='$quantity'></td>
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
                </tr>";

        echo "</tbody>";
        echo "</table>";
    }

    echo "<div class='container'>
            <div class='row justify-content-between'>
                <a href='".BASE_URL."index.php' class='btn btn-danger col-2'>Lanjut Belanja</a>";
                if($totalBarang == 0){
                    echo "<a href='".BASE_URL."index.php?page=data_pemesanan' class='btn btn-danger disabled col-2'>Lanjut Pemesanan</a>";
                } else {
                    echo "<a href='".BASE_URL."index.php?page=data_pemesanan' class='btn btn-danger col-2'>Lanjut Pemesanan</a>";
                }
            echo "</div>
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