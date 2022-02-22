<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" style="color:red" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55 text-yellow" ></i> 
                            <?php 
                                                        
                                $query = "SELECT * FROM users WHERE status='non'";

                                $res = $db->conn->query($query);
                         
                                $date = date('y-m-d');

                                $query_a = "SELECT * FROM factures WHERE date_proch_payment='$date'";

                                $res_a = $db->conn->query($query_a);

                                if($res_a  && $res)
                                {
                                    $data1 = mysqli_num_rows($res);
                                    $data2 = mysqli_num_rows($res_a);
                                    echo $data1+$data2;
                                }

                                                       

                            ?>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                        <div class="list-group list-group-flush">
                            <a href="<?= base_url('pages/Abonnement_Check.php') ?>" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">&nbsp;<i class="ni ni-money-coins"></i>&nbsp;&nbsp; Abonnement Check (
                                                    <?php 
                                                        
                                                        $date = date('y-m-d');

                                                        $query = "SELECT * FROM factures WHERE date_proch_payment='$date'";

                                                        $res = $db->conn->query($query);

                                                        if($res)
                                                        {
                                                            $data = mysqli_num_rows($res);
                                                            echo $data;
                                                        }
                                                        else
                                                        {
                                                            echo '0';
                                                        }

                                                    ?>
                                                )</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= base_url('pages/Check_New_Users.php') ?>" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">&nbsp;<i class="ni ni-circle-08"></i>&nbsp;&nbsp; New Users (
                                                    <?php 
                                                        
                                                        $query = "SELECT * FROM users WHERE status='non'";

                                                        $res = $db->conn->query($query);

                                                        if($res)
                                                        {
                                                            $data = mysqli_num_rows($res);
                                                            echo $data;
                                                        }
                                                        else
                                                        {
                                                            echo '0';
                                                        }

                                                    ?>
                                                )</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> 
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="../Assets/img/theme/team-4.jpg">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['user_auth']['user_name'];  ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="" method="POST">
                            <button type="submit" name="button_logout" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>