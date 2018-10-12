<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<!--        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png" sizes="32x32">
        <link href="<?php echo base_url(); ?>assets/css/footer.css" rel="stylesheet">


        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url(); ?>assets/css/morris.css" rel="stylesheet">
        <!-- Datatables CSS -->
        <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/dataTables.responsive.css" rel="stylesheet">

        <title>Payment Management System</title>
        <style>
            .navbar{
                border-radius: 0px;
                background: #343A40 !important;
            }
            #submit_btn:hover{
                width:100px;
                height: 40px;
                color: #2368AF;
                font-size: 16px
            }
            #submit_btn{
                width:100px;
                height: 40px;
                text-decoration: black;
                border-color: black;
                font-size: 16px
            }
        </style>
    </head>
    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a style="color:white" class="navbar-brand" href="#"><b>P.M.S</b></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li id="header-nav"><a href="#">Home</a></li>
                            <li><a href="#">Payments</a></li>
                            <li><a href="<?php echo site_url() ?>/all_client">Clients</a></li>
                            <li><a href="#">Report</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img style="border-radius: 100%; width:23px; height:23px" src="<?php echo base_url(); ?>files/no_profile.jpeg" alt="user" class="userpicture defaultuserpic" width="100" height="100" />
                                    <?php foreach ($info->result() as $value) { ?>
                                    <?php echo ucfirst($value->FirstName); ?>
                                    <?php echo ucfirst($value->Lastname); ?>
                                    <?php } ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url() ?>/profile"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                                    <li><a href="<?php echo site_url() ?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--        ===========================Start of Side Nav========================-->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url() ?>/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>/all_payment"><i class="fa fa-money fa-fw"></i> Payments</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>/all_client"><i class="fa fa-users fa-fw"></i> Clients</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-line-chart fa-fw"></i> Reports</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-lock fa-fw"></i>  Account<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url() ?>/add_consultant"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Consultant</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() ?>/profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
