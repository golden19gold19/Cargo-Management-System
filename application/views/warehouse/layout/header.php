<?php

if ($this->session->userdata('warehouse') === NULL) {
	$access_level = $this->session->userdata('warehouse');
	if ($access_level !== 500) {
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
    <title>Warehouse</title>

    <title>Warehouse</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/styles.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>fonts/font-awesome.min.css">
     <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/datatable/datatables.min.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg sticky-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="<?php echo base_url('warehouse/dashboard'); ?>">Cargo Management System</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('warehouse/dashboard'); ?>">Dashboard</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('warehouse/delivery'); ?>">Delivery</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url('welcome/logout'); ?>">logout</a></li>

                </ul>
        </div>
        </div>
    </nav>
