<?= $this->include('inc_mbr/head.php') ?>
<div class="container-fluid" style="width: 30%; margin-top: 100px; margin-bottom: 175px; box-shadow: 0 2px 20px rgba(0,0,0,0.5); padding: 40px;">
    <form class="form-signin" method="post" action="sign/verifikasi">

        <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
        <?php if (!empty(session()->getFlashdata('fail'))) { ?>
            <div class="alert alert-warning">
                <?php echo session()->getFlashdata('fail') ?>
            </div>
        <?php } ?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <p></p>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <p></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
        <a href="<?= base_url('sign/daftar') ?>"><small>Belum Punya Akun ?</small></a>
    </form>
</div>
<?= $this->include('inc_mbr/foot.php') ?>