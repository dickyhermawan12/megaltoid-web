<?php
    define("BASE_URL", "http://localhost/myproject/");

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