<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cargo Management System</title>
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/styles.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/toastr/toastr.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg sticky-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="<?php echo base_url('/'); ?>">Cargo Management System</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo base_url('/') ?>">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo base_url('login') ?>">Login</a></li>
                </ul>
        </div>
        </div>
    </nav>