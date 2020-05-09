<?php
    session_start();

    include_once("./function/koneksi.php");
    include_once("./function/helper.php");

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
    
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>megaltoid | toko merch</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/bootstrap/bootstrap.min.css"; ?>">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/mdb.min.css"; ?>">
        <!-- My CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/style.css"; ?>">

        <script src="<?php echo BASE_URL."js/jquery-3.5.1.min.js"; ?>"></script>
        <script src="<?php echo BASE_URL."ckeditor/ckeditor.js"; ?>"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="maincontainer">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark red-accent">
                    <div class="container">
                        <a class="navbar-brand" href="<?php echo BASE_URL."index.php"; ?>">Megaltoid</a>
                        <div class='mr-auto border-left ml-2 pl-3'>
                            <a class="nav-item mr-auto" href="<?php echo BASE_URL."index.php?page=keranjang"; ?>">
                                <img src="<?php echo BASE_URL."./images/png/put-in-cart.png"; ?>" width=30px alt="cart" id="button-keranjang">
                            </a>
                            <?php
                                echo "<span class='badge badge-pill badge-dark position-relative' style='right: 15px; top: 10px;'>$totalBarang</span>";
                            ?>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <?php
                                    if($user_id){
                                        echo "<li class='nav-item'>
                                            <a class='nav-link disabled text-white mr-3' href='#' tabindex='-1'>Hi, <b>$nama</b></a>
                                            </li>
                                            <li class='nav-item'>
                                            <a class='nav-link' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                                            </li>
                                            <li class='nav-item'>
                                            <a class='nav-link' href='".BASE_URL."logout.php'>Logout</a>
                                            </li>";
                                    } else {
                                        echo "<li class='nav-item'>
                                            <a class='nav-link' href='".BASE_URL."index.php?page=login'>Login</a>
                                            </li>
                                            <li class='nav-item'>
                                            <a class='nav-link' href='".BASE_URL."index.php?page=register'>Register</a>
                                            </li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <main>
                <div class="container my-5" style="min-height: 300px;">
                    <?php
                        $filename = "$page.php";

                        if (file_exists($filename)){
                            include_once($filename);
                        } else {
                            include_once("main.php");
                        }
                    ?>
                </div>
            </main>

            <footer class="page-footer text-center font-small info-color-dark">

                <div class="red-accent">
                    <div class="pt-4">
                    <a class="btn btn-outline-white" href="<?php echo BASE_URL."index.php?page=about" ?>" role="button">About Us<i class="fas fa-users ml-2"></i>
                    </a>
                    </div>

                    <hr class="my-4">

                    <div class="pb-4">
                    <a href="#">
                        <i class="fab fa-facebook-f mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-twitter mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-youtube mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-google-plus-g mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-dribbble mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-pinterest mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-github mr-3"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-codepen mr-3"></i>
                    </a>
                    </div>

                    <div class="footer-copyright py-3">
                    © 2020 Copyright:
                    <a href="#"> Megaltoid Project </a>
                    </div>

                </div>

            </footer>
        </div>
        <script src="<?php echo BASE_URL."js/bootstrap.bundle.min.js"; ?>"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>

</html>