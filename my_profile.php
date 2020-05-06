<?php

    if($user_id){
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
    } else {
        header("location: ".BASE_URL."index.php?page=login");
    }
?>

<div class="container pt-4 pb-4" id="bg-page-profile">
    <div class="row justify-content-center" id="menu-profile">
        <div class="list-group col-3">
            <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list"; ?>" class="list-group-item list-group-item-action <?php if($module == "kategori"){ echo "active red-accent"; } ?>">Kategori</a>
            <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>" class="list-group-item list-group-item-action <?php if($module == "barang"){ echo "active red-accent"; } ?>">Barang</a>
            <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>" class="list-group-item list-group-item-action <?php if($module == "kota"){ echo "active red-accent"; } ?>">Kota</a>
            <a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>" class="list-group-item list-group-item-action <?php if($module == "user"){ echo "active red-accent"; } ?>">User</a>
            <a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list"; ?>" class="list-group-item list-group-item-action <?php if($module == "banner"){ echo "active red-accent"; } ?>">Banner</a>
            <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>" class="list-group-item list-group-item-action <?php if($module == "pesanan"){ echo "active red-accent"; } ?>">Pesanan</a>
        </div>
        <div class="col-9 border">
            <?php
                $file = "module/$module/$action.php";
                if(file_exists($file)){
                    include_once($file);
                }else{
                    echo "<h3>Maaf, halaman tersebut tidak ditemukan</h3>";
                }
		    ?>
        </div>
    </div>

</div>