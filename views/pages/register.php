<div id="bg-reg"></div>
<section class="login-inner">
  <div class="login-middle">
    <div class="login-details">
      <img src="<?=LOCAL;?>/CDN/img/logo.svg" class="profile-img-card">
      <form>
        <?php echo form_open_multipart('pages/submit_register') ?>
        <div class="form-group">
          <label for="uname">Nama Pengguna:</label>
          <input type="text" name="uname" class="form-control" placeholder="Masukkan username">
        </div>
        <div class="form-group">
          <label>Nama anda:</label>
          <input type="text" name="name" class="form-control" placeholder="Masukkan nama anda">
          <small class="form-text text-muted">Nama anda akan ditampilkan dalam beberapa kategori saja</small>
        </div>
        <div class="form-group">
          <label for="InputUname">Email address</label>
          <input type="email" class="form-control" placeholder="Masukkan email" name="email">
          <small id="emailHelp" class="form-text text-muted">Kami tidak akan memberitahukan email anda pada siapapun.</small>
        </div>
        <div class="form-group">
          <label>Nomor telepon/ponsel:</label>
          <input type="text" name="telp" class="form-control">
        </div>
        <div class="form-group">
          <label for="InputPassword">Password</label>
          <input type="passwd" class="form-control" placeholder="Masukkan kata sandi">
        </div>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input form-control" id="checked">
            <label class="custom-control-label" for="customCheck1">Saya setuju dengan <a href="#"> Syarat dan Ketentuan</a> yang telah ditentukan</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">DAFTAR</button>
        <?php echo form_close(); ?>
      </form>
    </div>
  </div>
</section>