<?php
      
  $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>

<h4 class="mt-3 text-center bg-secondary text-white py-3 rounded">Update User</h4>


<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST" class="mt-3">

	<div class="form-group">
        <label for="inputNama">Nama Lengkap</label>
        <input type="text" class="form-control" id="inputNama" name="nama" value="<?php echo $nama; ?>">
	</div>

	<div class="form-group">
		<label for="inputEmail">Alamat Email</label>
		<input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $email; ?>">
	</div>

	<div class="form-group">
		<label for="inputNoHP">Nomor Telepon</label>
		<input type="text" class="form-control" id="inputNoHP" name="phone" value="<?php echo $phone; ?>">
	</div>

	<div class="form-group">
		<label for="inputAlamat">Alamat</label>
		<textarea class="form-control" id="inputAlamat" name="alamat"><?php echo $alamat; ?></textarea>
	</div>

	<div class="row">
      <legend class="col-form-label col-sm-1 pt-0">Level</legend>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="level" id="radioStatusAdmin" value="superadmin" <?php if($level == "superadmin"){ echo "checked='true'"; } ?>>
          <label class="form-check-label" for="radioStatusAdmin">
            Superadmin
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="level" id="radioStatusCustomer" value="customer" <?php if($level == "customer"){ echo "checked='true'"; } ?>>
          <label class="form-check-label" for="radioStatusCustomer">
            Customer
          </label>
        </div>
      </div>
    </div>

	<div class="row">
      <legend class="col-form-label col-sm-1 pt-0">Status</legend>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="radioStatusOn" value="on" <?php if($status == "on" || $status == ""){ echo "checked='true'"; } ?>>
          <label class="form-check-label" for="radioStatusOn">
            On
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="radioStatusOff" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?>>
          <label class="form-check-label" for="radioStatusOff">
            Off
          </label>
        </div>
      </div>
    </div>
	  
	<button type="submit" class="form-group btn btn-secondary" name="button" value="<?php echo $button; ?>"><?php echo $button; ?></button>
</form>