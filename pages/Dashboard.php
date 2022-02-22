<?php

include('../config/App.php');
include('../codes/Dashboard_Code.php');

$auth->isAdmin();

include '../layouts/Header.php';
include('../layouts/SideNav.php');

?>
<div class="main-content" id="panel">
    <?php include('../layouts/Navbar.php'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Today Earn</h4>
                                        <span class="h2 font-weight-bold mb-0">
                                            <?php

                                            $st = new DashboardController;

                                            $student = $st->today_earn();
                                                
                                            echo $student;

                                            ?>
                                            DH</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Total users</h4>
                                        <span class="h2 font-weight-bold mb-0">
                                            <?php
                                            $tot_user = new DashboardController;

                                            $total = $tot_user->num_users();
                                            if ($total > 0) {
                                                echo $total;
                                            } else {
                                                echo '0';
                                            }

                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-circle-08"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Students</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <?php
                                            $tot_student = new DashboardController;

                                            $total = $tot_student->num_students();
                                            if ($total > 0) {
                                                echo $total;
                                            } else {
                                                echo '0';
                                            }

                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-badge"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Factures</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <?php
                                            $tot_factures = new DashboardController;

                                            $total = $tot_factures->num_factures();
                                            if ($total > 0) {
                                                echo $total;
                                            } else {
                                                echo '0';
                                            }

                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-single-copy-04"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include('../layouts/Footer.php') ?>