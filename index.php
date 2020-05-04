<?php
    include_once("./function/helper.php");
    $page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/bootstrap/bootstrap.min.css"; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/styles.css"; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>megaltoid | toko merch</title>
    </head>
    <body>
        <div class="maincontainer">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                    <div class="container">
                        <a class="navbar-brand" href="<?php echo BASE_URL."index.php"; ?>">Megaltoid</a>
                        <a class="nav-item mr-3" href="<?php echo BASE_URL."index.php?page=keranjang"; ?>">
                            <img src="<?php echo BASE_URL."./images/png/put-in-cart.png"; ?>" width=30px alt="cart" id="button-keranjang">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASE_URL."index.php?page=register"; ?>">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </header>

            <main>
                <div id="content">
                    <?php
                        $filename = "$page.php";

                        if (file_exists($filename)){
                            include_once($filename);
                        } else {
                            echo "<p class='mt-3'>Maaf, file tersebut tidak ada di dalam sistem!</p>";
                        }
                    ?>
                </div>
            </main>

            <footer>
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                    <div class="container d-flex justify-content-center">
                        <p class="nav-item text-white">Copyright Megaltoid 2020</p>
                    </div>
                </nav>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="<?php echo BASE_URL."js/bootstrap.bundle.min.js"; ?>"></script>
    </body>

</html>