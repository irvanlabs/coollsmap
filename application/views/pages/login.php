<div id="bg-login"></div>
<section class="login-inner">
    <div class="login-middle">
        <div class="login-details">
            <img src="<?= LOCAL;?>/CDN/img/logo.svg" class="profile-img-card">
            <form method="post" action="<?php echo base_url('pages/login');?>">
                <div class="form-group">
                    <label for="InputEmail">
                        Email address
                    </label>
                    <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan email">
                    <small id="emailHelp" class="form-text text-muted">
                        Kami tidak akan memberitahukan email anda pada siapapun.
                    </small>
                </div>
                <div class="form-group">
                    <label for="InputPassword">
                        Password
                    </label>
                    <input type="password" class="form-control"placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="forgot">
                        <a href="#">
                            Lupa kata sandi ?
                        </a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</section>