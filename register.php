<?php

    if($user_id){
        header("location: ".BASE_URL);
    }

?>

<div class="container pt-4" id="container-user-akses">

    <form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">

        <div class="form-group element-form">
            <label for="inputNama">Nama Lengkap</label>
            <input type="text" class="form-control" id="inputNama" name="nama_lengkap">
        </div>
        <div class="form-group element-form">
            <label for="inputEmail">Alamat Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email">
        </div>
        <div class="form-group element-form">
            <label for="inputNoHP">Nomor Telepon</label>
            <input type="text" class="form-control" id="inputNoHP" name="phone">
        </div>
        <div class="form-group element-form">
            <label for="inputAlamat">Alamat</label>
            <textarea class="form-control" id="inputAlamat" name="alamat"></textarea>
        </div>
        <div class="form-group element-form">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="form-group element-form">
            <label for="inputRePassword">Re-type Password</label>
            <input type="password" class="form-control" id="inputRePassword" name="re_password">
        </div>
        <div class="form-group element-form">
            <button type="submit" class="btn btn-danger" value="register">Submit</button>
        </div>

    </form>

</div>