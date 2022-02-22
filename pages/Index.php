<?php

include('../config/App.php');
include('../codes/Auth_Code.php');

$auth->isAdmin();

include '../layouts/Header.php';
include('../layouts/SideNav.php');

?>
<div class="main-content" id="panel">
    <?php include('../layouts/Navbar.php'); ?>

    <div class="container">
        <br>
        <?php
        if (isset($_SESSION['message'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php include('../codes/Messages.php') ?>
            </div>
        <?php
        }
        ?>
    </div>

    <?php include('../layouts/Footer.php') ?>