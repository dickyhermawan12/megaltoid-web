<?php
    define("BASE_URL", "http://localhost/myproject/");

    $arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang Di Validasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran Di Tolak";

    function rupiah($nilai = 0){
        $string = "Rp".number_format($nilai);
        return $string;
    }

    function kategori($kategori_id = false){
        global $koneksi;
        
        $string = "<div class='col-sm-3 mb-4'>
        <div class='list-group shadow-sm'>";
            
        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

        if($kategori_id){
            $string .= "<a href='".BASE_URL."index.php' class='list-group-item list-group-item-action'>All</a>";
        } else {
            $string .= "<a href='".BASE_URL."index.php' class='list-group-item list-group-item-action active red-accent'>All</a>";
        }
        
        while($row=mysqli_fetch_assoc($query)){
            if($kategori_id == $row['kategori_id']){
                $string .= "<a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='list-group-item list-group-item-action active red-accent'>$row[kategori]</a>";
            }else{
                $string .= "<a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='list-group-item list-group-item-action'>$row[kategori]</a>";
            }
        }

        $string .= "</div>
        </div>";		
		
		return $string;
    }
    
    function admin_only($module, $level){
        if($level != "superadmin"){
            $admin_pages = array("kategori", "barang", "kota", "user", "banner");
            if(in_array($module, $admin_pages)){
                header("location: ".BASE_URL);
            }
        }
    }

    function pagination($query, $data_per_halaman, $pagination, $url){
        global $koneksi;
        $total_data = mysqli_num_rows($query);
        $total_halaman = ceil($total_data / $data_per_halaman);

        $batasPosisiNomor = 6;
        $batasJumlahHalaman = 10;
        $mulaiPagination = 1;
        $batasAkhirPagination = $total_halaman;

        echo "<ul class='pagination'>";

        if($pagination > 1){
            $prev = $pagination - 1;
            echo "<li><a href='".BASE_URL."$url&pagination=$prev'><< Prev </a></li>";
        }

        if($total_halaman >= $batasJumlahHalaman){
            if($pagination > $batasPosisiNomor){
                $mulaiPagination = $pagination - ($batasPosisiNomor - 1);
            }

            $batasAkhirPagination = ($mulaiPagination - 1) + $batasJumlahHalaman;
            if($batasAkhirPagination > $total_halaman){
                $batasAkhirPagination = $total_halaman;
            }
        }

        for($i = $mulaiPagination; $i <= $batasAkhirPagination; $i++){
            if($pagination == $i){
                echo "<li><a class='active' href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
            }else{
                echo "<li><a href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
            }
        }

        if($pagination < $total_halaman){
            $next = $pagination + 1;
            echo "<li><a href='".BASE_URL."$url&pagination=$next'>Next >></a></li>";
        }

        echo "</ul>";
    }