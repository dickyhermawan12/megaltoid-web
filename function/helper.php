<?php
    define("BASE_URL", "http://localhost/myproject/");

    function rupiah($nilai = 0){
        $string = "Rp".number_format($nilai);
        return $string;
    }

    function kategori($kategori_id = false){
        global $koneksi;
        
        $string = "<div class='list-group col-3'>";
            
                $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
                
                while($row=mysqli_fetch_assoc($query)){
                    if($kategori_id == $row['kategori_id']){
                        $string .= "<a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='ml-3 list-group-item list-group-item-action active red-accent'>$row[kategori]</a>";
                    }else{
                        $string .= "<a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='ml-3 list-group-item list-group-item-action'>$row[kategori]</a>";
                    }
                }
        
        $string .= "</div>";		
		
		return $string;
	}