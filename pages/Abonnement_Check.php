<?php

include('../config/App.php');
include('../codes/Facture_Code.php');

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
                        <h6 class="h2 text-white d-inline-block mb-0">Factures</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">facture Day</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Records</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?= base_url('pages/Add_Facture.php') ?>" class="btn btn-sm btn-neutral">New</a>
                        <a href="<?=  base_url('pages/Factures.php') ?>" class="btn btn-sm btn-neutral">Refresh</a>
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
                                    <th scope="col">#ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col" class="sort">Date Payment</th>
                                    <th scope="col" class="sort">Date Prochaine Payment</th>
                                    <th scope="col" class="sort">Abonnement DH's</th>
                                    <th scope="col" class="sort">Article Scolaire</th>
                                    <th scope="col" class="sort">status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php

                                $facture = new FactureController;

                                $factures = $facture->get_factures_day();

                                if ($factures) {
                                    foreach ($factures as $row) {
                                ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $row['id']; ?>
                                            </th>
                                            <td>
                                                <?= $row['nom']; ?>
                                            </td>
                                            <td>
                                                <?= $row['prenom']; ?>
                                            </td>
                                            <td>
                                                <?= $row['telephone']; ?>
                                            </td>
                                            <td>
                                                <?= $row['date_payment']; ?>
                                            </td>
                                            <td>
                                                <?= $row['date_proch_payment']; ?>
                                            </td>
                                            <td>
                                                <?= $row['abonnement']; ?>
                                            </td>
                                            <td>
                                                <?= $row['module']; ?>
                                            </td>
                                            <td>
                                                <?= $row['status']; ?>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="../pages/Edit_Facture.php?id=<?= $row['id']; ?>"><i class="ni ni-settings text-primary"></i> Edit</a>

                                                        <form action="" method="POST" onsubmit="return confirm('are you sure ?!')">
                                                            <button type="submit" name="delete_facture" value="<?= $row['id']; ?>" class="dropdown-item" href="#"><i class="ni ni-fat-remove text-danger"></i> Delete</button>
                                                        </form>
                                                        <a class="dropdown-item" href="../pages/PDF_Facture.php?id=<?= $row['id']; ?>"><i class="ni ni-single-copy-04 text-success"></i> PDF</a>
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