<?php 

include('../controllers/FactureController.php');
include('../controllers/LoginController.php');

$auth = new LoginController;

if(isset($_POST['create_facture']))
{
    $ladate = $_POST['date_payment'];
    $datao = date('Y-m-d',strtotime('+1 month',strtotime($ladate)));

    $dataInput = [
        'nom' => validateInput($db->conn,$_POST['nom']),
        'prenom' => validateInput($db->conn,$_POST['prenom']),
        'telephone' => validateInput($db->conn,$_POST['telephone']),
        'date_payment' => validateInput($db->conn,$_POST['date_payment']),
        'date_proch_payment' => validateInput($db->conn,$datao),
        'abonnement' => validateInput($db->conn,$_POST['abonnement']),
        'module' => validateInput($db->conn,$_POST['module']),
        'status' => validateInput($db->conn,$_POST['status']),
    ];

    if($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['telephone'] != null && $_POST['date_payment'] != null && $_POST['abonnement'] != null && $_POST['status'] != null)
    {
        $facture = new FactureController;

        $query_add = $facture->AddFacture($dataInput);

        if($query_add)
        {
            redirectTo('Facture Created With Success ^-^','pages/Factures.php');
        }
        else
        {
            redirectTo('Something Went Wrong !!','pages/Add_Facture.php');
        }

    }
    else
    {
        redirectTo('Fields Requireds !!','pages/Add_Facture.php'); 
    }
}


if(isset($_POST['update_facture']))
{
        $id_facture = validateInput($db->conn,$_POST['facture_id']);
        $dataInput = [
            'nom' => validateInput($db->conn,$_POST['nom']),
            'prenom' => validateInput($db->conn,$_POST['prenom']),
            'telephone' => validateInput($db->conn,$_POST['telephone']),
            'date_payment' => validateInput($db->conn,$_POST['date_payment']),
            'date_proch_payment' => validateInput($db->conn,$_POST['date_proch_payment']),
            'abonnement' => validateInput($db->conn,$_POST['abonnement']),
            'module' => validateInput($db->conn,$_POST['module']),
            'status' => validateInput($db->conn,$_POST['status']),
        ];


    if($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['telephone'] != null && $_POST['date_payment'] != null && $_POST['abonnement'] != null && $_POST['status'] != null)
    {
        $facture = new FactureController;

        $query_add = $facture->UpdateFacture($dataInput,$id_facture);

        if($query_add)
        {
            redirectTo('Facture Updated With Success ^-^','pages/Factures.php');
        }
        else
        {
            redirectTo('Something Went Wrong !!','pages/Edit_Facture.php');
        }

    }
    else
    {
        redirectTo('Fields Requireds !!','pages/Edit_Facture.php'); 
    }
}




if(isset($_POST['delete_facture']))
{
    $facture_id = validateInput($db->conn,$_POST['delete_facture']);

    $facture_del = new FactureController;

    $facture_exe = $facture_del->DeleteFacture($facture_id);

    if($facture_exe)
    {
        redirectTo('Facture Deleted With Success ^-^','pages/Factures.php');
    }
    else
    {
        redirectTo('Something Went Wrong !!','pages/Factures.php');
    }
}



?>