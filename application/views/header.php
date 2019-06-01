<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Web Transaksi</title>
    <!-- Icons-->
    <link href="<?= base_url(); ?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/js/jque.js"></script>
    <link href="<?= base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>

  <link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">  
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar" style="background-color: #f0f3f5">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="img/brand/logo.svg" width="89" height="25" alt="Admin">
        <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="Admin">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      
     
    </header>
    <div class="app-body" style="background-color: #fff">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
            <!-- <li class="nav-title">Transaksi</li>
             <li class="nav-item">
              <a class="nav-link" href="<?= base_url('welcome/modals'); ?>">
                <i class="nav-icon fa fa-dollar"></i> Set Modal</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('welcome/perhari'); ?>">
                <i class="nav-icon fa fa-money"></i> Transaksi Per Hari</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('welcome/akumulasi'); ?>">
                <i class="nav-icon fa fa-pie-chart"></i> Akumulasi Per Bulan</a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
     
  
