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
                                <h3 class="mb-0">Add New Students</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
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
                                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Prenom</label>
                                            <input type="text" name="prenom" class="form-control" placeholder="Prenom">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Date Payment</label>
                                            <input type="date" name="date_payment" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Téléphone</label>
                                            <input type="text" name="telephone" class="form-control" placeholder="623793549">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Abonnement DH's</label>
                                            <input type="text" name="abonnement" class="form-control" placeholder="1000">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Etat Facture</label>
                                            <select class="form-control" name="status">
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
                                            <select class="form-control" name="module">
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
                                <button name="create_facture" type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include('../layouts/Footer.php') ?>