<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<!-- Import File CSS Internal -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets';?>/css/layoutlogin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets';?>/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Import File Javascript Internal Dan External -->
  <script src="<?php echo base_url().'assets';?>/js/jquery-3.3.1.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
    <div class="d-flex justify-content-center h-100">
      <?php echo form_open('login_controller/cek_login','id="FormLogin"');?>
      <div class="text-center mb-4">
        <img src="<?php echo base_url().'assets';?>/img/user.png" width="100" height="100">
      </div>
      <div class="input-group form-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="username" placeholder="Masukkan Username" class="form-control" autocomplete="off" required="">
      </div>
      <div class="input-group form-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
        </div>
        <input type="password" name="password"
        placeholder="Masukkan Password" class="form-control" autocomplete="off" required="">
      </div>
      <div class="form-group">
        <input type="reset" style="margin-right: 5px;" value="Batal" class="btn float-right btn-danger"><input type="submit" style="margin-right: 5px;" value="Login" class="btn float-right btn-primary">
      </div>
      <br>
      <br>
      <br>
      <div class="card-footer">
      <div class="d-flex justify-content-center links" role="alert"><p style="margin-right: 10px;">Belum Memiliki Akun?</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistrasi">Daftar
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- MODAL REGISTRATION BOOTSTRAP -->
<div class="modal fade" id="ModalRegistrasi" tabindex="-1" role="dialog" aria-labelledby="myModalRegistrasi">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalRegistrasi">Registrasi Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('login/registrasi_akun');?>
        <div class="input-group form-group">
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>        
          <input name="username" class="form-control" type="text" id="username" placeholder="Masukkan Username Baru" autocomplate="off"  required="">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
        </div>          
          <input name="email" class="form-control" type="text" id="email" placeholder="Masukkan Email Baru" autocomplate="off"  required="">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
        </div>          
          <input name="password" class="form-control" type="password" id="password" placeholder="Masukkan Password Baru" required="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Daftar</button><button type="reset" class="btn btn-danger">Batal</button>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
  // UNTUK MEMFOKUSKAN CURSOR PADA INPUT FIRST NAME
  $('#ModalRegistrasi').on('shown.bs.modal', function () {
    $('#newFirstName').trigger('focus')});
  $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>