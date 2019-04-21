<?php

if ($this->session->userdata('admin') === NULL) {
	$access_level = $this->session->userdata('admin');
	if ($access_level !== 900) {
		session_unset();
		session_destroy();
		redirect('welcome/login');
	}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/styles.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>fonts/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/datatable/datatables.min.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<style type="text/css">
    /*toastr positioning*/
    .toast-top-center {
    top: 70px;
    margin: 0 auto;
    right: 0%;
}
</style>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg sticky-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">Cargo Management System</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo base_url('admins/'); ?>">Dashboard</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('admins/cargo'); ?>">Cargo</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('admins/delivery'); ?>">Delivery</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('admins/tracking'); ?>">Tracking</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('welcome/logout'); ?>">logout</a></li>

                </ul>
        </div>
        </div>
    </nav>