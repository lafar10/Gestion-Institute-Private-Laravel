<?php

include('../config/App.php');
include('../codes/Student_Code.php');

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
                                <h3 class="mb-0">Update Students</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['id'])) {
                            $student_id = validateInput($db->conn, $_GET['id']);

                            $students = new StudentController;

                            $get_student = $students->GetUser($student_id);

                            if ($get_student) { ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $get_student['id'] ?>" >
                                    <h6 class="heading-small text-muted mb-4">Student information</h6>
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
                                                    <label class="form-control-label" for="input-username">Nom</label>
                                                    <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?= $get_student['nom'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Prenom</label>
                                                    <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="<?= $get_student['prenom']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Age</label>
                                                    <input type="date" name="age" class="form-control" value="<?= $get_student['age']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Téléphone</label>
                                                    <input type="text" name="telephone" class="form-control" value="<?= $get_student['telephone']; ?>" placeholder="623793549">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">élève Niveau</label>
                                                    <select class="form-control" name="niveau" value="<?= $get_student['niveau']; ?>">
                                                        <option>primaire 1</option>
                                                        <option>primaire 2</option>
                                                        <option>primaire 3</option>
                                                        <option>primaire 4</option>
                                                        <option>primaire 5</option>
                                                        <option>primaire 6</option>
                                                        <option>----------</option>
                                                        <option>Collège 1</option>
                                                        <option>Collège 2</option>
                                                        <option>Collège 3</option>
                                                        <option>----------</option>
                                                        <option>5 éme</option>
                                                        <option>6 éme</option>
                                                        <option>Bac</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Article scolaire</label>
                                                    <select class="form-control" name="module" value="<?= $get_student['module']; ?>">
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
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Abonnement DH's</label>
                                                    <input type="text" name="abonnement" class="form-control" value="<?= $get_student['abonnement']; ?>" placeholder="1000">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Etat éléve</label>
                                                    <select class="form-control" name="etat" value="<?= $get_student['etat']; ?>">
                                                        <option>Non</option>
                                                        <option>Oui</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="col-lg-12" align="center">
                                        <button name="update_student" type="submit" class="btn btn-primary">
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