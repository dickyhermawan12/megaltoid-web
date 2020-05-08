<?php

    if($user_id){
        header("location: ".BASE_URL);
    }

?>

<div class="container py-4" id="container-user-akses">

    <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">

        <?php

            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

            if($notif == true){
                echo "<div class='alert alert-warning' role='alert'>Maaf, email atau password yang kamu masukkan tidak cocok</div>";
            }
        
        ?>

        <h2 class="text-center">Log In</h2>

        <div class="form-group element-form">
            <label for="inputEmail">Alamat Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email">
        </div>
        <div class="form-group element-form">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="form-group element-form">
            <button type="submit" class="btn btn-danger" value="register">Login</button>
        </div>

    </form>

</div>