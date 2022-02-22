<?php 

$page ='';

?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="../Assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('pages/Dashboard.php'); ?>">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pages/Users.php'); ?>">
                            <i class="ni ni-badge text-orange"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo (basename($_SERVER['PHP_SELF']) == "http://localhost/PHP_POO/pages/Students.php") ? "active" :  ""; ?>" >
                        <a class="nav-link" href="<?= base_url('pages/Students.php') ?>">
                            <i class="ni ni-hat-3 text-primary"></i>
                            <span class="nav-link-text">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pages/Factures.php'); ?>">
                            <i class="ni ni-single-copy-04 text-yellow"></i>
                            <span class="nav-link-text">Factures</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>