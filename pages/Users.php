<?php

include('../config/App.php');
include('../codes/User_Code.php');

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
                        <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Records</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?= base_url('pages/Add_Users.php') ?>" class="btn btn-sm btn-neutral">New</a>
                        <a href="<?=  base_url('pages/Users.php') ?>" class="btn btn-sm btn-neutral">Refresh</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <br>
                    <?php
                    if (isset($_SESSION['message'])) {
                    ?>
                        <div class="container">
                            <div class="alert alert-success" role="alert">
                                <?php include('../codes/Messages.php') ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <br>
                    <div class="table-responsive">
                        <table id="myTable" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">#ID</th>
                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                    <th scope="col" class="sort" data-sort="status">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col" class="sort" data-sort="completion">Role As 0=user 1=admin</th>
                                    <th scope="col" class="sort" data-sort="completion">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php

                                $users = new UserController;

                                $result = $users->index();

                                if ($result) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $row['id']; ?>
                                            </th>
                                            <td>
                                                <?= $row['name']; ?>
                                            </td>
                                            <td>
                                                <?= $row['email']; ?>
                                            </td>
                                            <td>
                                                <?= $row['password']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $row['role_as']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $row['status']; ?>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="../pages/Edit_Users.php?id=<?= $row['id']; ?>"><i class="ni ni-settings text-primary"></i> Edit</a>

                                                        <form action="" method="POST" onsubmit="return confirm('are you sure ?!')">
                                                            <button type="submit" name="delete_user" value="<?= $row['id']; ?>" class="dropdown-item" href="#"><i class="ni ni-fat-remove text-danger"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo 'No Records Founds !!';
                                }

                                ?>

                            </tbody>
                        </table>
                        <br>
                    </div>
                    <br>
                
                </div>
            </div>
        </div>
    </div>


    <?php include('../layouts/Footer.php') ?>