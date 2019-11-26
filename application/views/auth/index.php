<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="card-box">
        <div class="panel-heading">
            <h4 class="text-center"> Sign In </h4>
        </div>
        <!-- <?= $this->session->flashdata('message') ?> -->
        <div class="p-20">
            <form class="form-horizontal m-t-20" method="post" action="<?= base_url('auth'); ?>">
                <div class="form-group ">
                    <div class="col-12">
                        <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In
                        </button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-12">
                        <a href="recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Lupa Password?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>Tidak Punya Akun? <a href="<?= base_url('auth/registration'); ?>" class="text-primary m-l-5"><b>Sign Up</b></a>
            </p>

        </div>
    </div>

</div>