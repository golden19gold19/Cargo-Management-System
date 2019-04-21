<?php $this->load->view('welcome/layout/header');?>

    <main class="page cv-page">
        <div class="container-fluid">
            <div class="row mh-100vh">
                <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                    <div class="m-auto w-lg-75 w-xl-50">
                        <h2 class="text-info font-weight-light mb-5">&nbsp;LOGIN</h2>
                        <?php echo form_open('welcome/login'); ?>
                            <div class="form-group">
                                <label class="text-secondary">User Name</label>
                                <input class="form-control" type="text" name="username"  value="<?php echo set_value('username'); ?>">
                                <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
                            </div>
                            <div class="form-group"><label class="text-secondary">Password</label>
                                <input class="form-control" type="password"  name="password">
                                <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>

                            </div><button class="btn btn-info mt-2" type="submit">Log In</button>
                        <hr>
                        <?php echo form_close(); ?>

                        <?php echo form_open('welcome/forgotPassword'); ?>
                            <h4 class="text-info font-weight-light mb-5" style="height:2px;">&nbsp;Forgot Password</h4>
                            <div style="margin-top:27px;">
                                <div class="form-group"><label class="text-secondary">Email</label>
                                    <input class="form-control" type="text" name="email" >
                                <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>

                                </div><button class="btn btn-info mt-2" type="submit">
                                Reset</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div><div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(<?php echo base_url('assets/img'); ?>/volv.png);background-size:cover;background-position:center center;"></div></div>
        </div>
    </main>

<?php $this->load->view('welcome/layout/footer');?>
