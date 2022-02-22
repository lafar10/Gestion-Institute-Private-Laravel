<?php

include('../config/App.php');
include('../codes/User_Code.php');

$auth->isAdmin();

include '../layouts/Header.php';
include('../layouts/SideNav.php');

?>
<div class="main-content" id="panel">
    <?php include('../layouts/Navbar.php'); ?>


    <br>
    <div class="container-fluid mt--1">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Update User </h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <?php

                        if (isset($_GET['id'])) {
                            $user_id = validateInput($db->conn, $_GET['id']);

                            $users = new UserController;

                            $user_data = $users->editUser($user_id);

                            if ($user_data) {
                        ?>

                                <form action="" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user_data['id'] ?>">
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
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
                                    <br>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Username</label>
                                                    <input type="text" name="name" class="form-control text-dark" value="<?= $user_data['name'] ?>" required placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email address</label>
                                                    <input type="email" name="email" class="form-control text-dark" value="<?= $user_data['email'] ?>" required placeholder="jesse@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Password</label>
                                                    <input type="password" name="password" class="form-control text-dark" value="<?= $user_data['password'] ?>" required placeholder="First name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Role As 0=user 1=admin</label>
                                                    <select class="form-control text-dark" value="<?= $user_data['role_as'] ?>" name="role_as" required>
                                                        <option><?= $user_data['role_as'] ?></option>
                                                        <option>0</option>
                                                        <option>1</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Status</label>
                                                    <select class="form-control text-dark" value="<?= $user_data['status'] ?>" name="status" required>
                                                        <option><?= $user_data['status'] ?></option>
                                                        <option>oui</option>
                                                        <option>non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="col-lg-12" align="center">
                                        <button name="update_user" type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                        <?php

                            } else {
                                echo '<h3>No Records Found !!</h3>';
                            }
                        } else {
                            echo 'Something Went Wrong';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include('../layouts/Footer.php') ?>