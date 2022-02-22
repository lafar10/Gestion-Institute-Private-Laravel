<?php

include('../config/App.php');
include('../codes/Facture_Code.php');

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
                                <h3 class="mb-0">Update Facture</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php

                        if (isset($_GET['id'])) {
                            $facture = new FactureController;

                            $factures = $facture->EditFacture(validateInput($db->conn, $_GET['id']));

                            if ($factures) { ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="facture_id" value="<?= $factures['id'] ?>">
                                    <h6 class="heading-small text-muted mb-4">Facture information</h6>
                                    <br>
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
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
                                                    <label class="form-control-label" for="input-username">Nom</label>
                                                    <input type="text" name="nom" value="<?= $factures['nom'] ?>" class="form-control" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Prenom</label>
                                                    <input type="text" name="prenom" value="<?= $factures['prenom'] ?>" class="form-control" placeholder="Prenom">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Date Payment</label>
                                                    <input type="date" name="date_payment" value="<?= $factures['date_payment'] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Téléphone</label>
                                                    <input type="text" name="telephone" value="<?= $factures['telephone'] ?>" class="form-control" placeholder="623793549">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Date Prochaine Payment</label>
                                                    <input type="date" name="date_proch_payment" value="<?= $factures['date_proch_payment'] ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Abonnement DH's</label>
                                                    <input type="text" name="abonnement" value="<?= $factures['abonnement'] ?>" class="form-control" placeholder="1000">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Etat Facture</label>
                                                    <select class="form-control" value="<?= $factures['status'] ?>" name="status">
                                                        <option><?= $factures['status'] ?></option>
                                                        <option>Non</option>
                                                        <option>Oui</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Article scolaire</label>
                                                    <select class="form-control" value="<?= $factures['module'] ?>" name="module">
                                                        <option><?= $factures['module'] ?></option>
                                                        <option>Arab</option>
                                                        <option>Français</option>
                                                        <option>Anglais</option>
                                                        <option>Math</option>
                                                        <option>Physique</option>
                                                        <option>Sciences Vie / Terre</option>
                                                        <option>Philosophie</option>
                                                        <option>Éducation islamique</option>
                                                        <option>Informatique</option>
                                                        <option>Economie</option>
                                                        <option>Autres</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="col-lg-12" align="center">
                                        <button name="update_facture" type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                        <?php }
                        } else {
                            echo '<h1>No Records Found !!</h1>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include('../layouts/Footer.php') ?>