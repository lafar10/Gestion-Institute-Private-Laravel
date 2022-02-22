<?php 
use CommonMark\Node\Document;

include('../controllers/StudentController.php');
include('../controllers/LoginController.php');
$auth = new LoginController;

if(isset($_POST['create_student']))
{

    $data = [
        'nom' => validateInput($db->conn,$_POST['nom']),
        'prenom' => validateInput($db->conn,$_POST['prenom']),
        'age' => validateInput($db->conn,$_POST['age']),
        'telephone' => validateInput($db->conn,$_POST['telephone']),
        'niveau' => validateInput($db->conn,$_POST['niveau']),
        'module' => validateInput($db->conn,$_POST['module']),
        'abonnement' => validateInput($db->conn,$_POST['abonnement']),
        'etat' => validateInput($db->conn,$_POST['etat']),
    ];

    $students = new StudentController;

    if($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['age'] != null && $_POST['telephone'] != null && $_POST['niveau'] != null && $_POST['module'] != null && $_POST['abonnement'] != null && $_POST['etat'] != null)
    {
        $students_query = $students->CreateStudent($data);

        if($students_query)
        {
            redirectTo('Student Created With Success ^+^','pages/Students.php');
        }
        else
        {
            redirectTo('Something Went Wrong','pages/Add_Student.php');
        }
    }
    else
    {
        redirectTo('Fields Requireds','pages/Add_Student.php');
    }

}

if(isset($_POST['delete_student']))
{
    $student_id = validateInput($db->conn,$_POST['delete_student']);

    $student = new StudentController;

    $result = $student->DeleteStudent($student_id);

    if($result)
    {
        redirectTo('Student Deleted With Success ^+^','pages/Students.php');
    }
    else
    {
        redirectTo('Smething Went Wrong !!','pages/Students.php');
    }
}

if(isset($_POST['update_student']))
{
    $student_id = validateInput($db->conn,$_POST['student_id']);
    $dataInput = [
        'nom' => validateInput($db->conn,$_POST['nom']),
        'prenom' => validateInput($db->conn,$_POST['prenom']),
        'age' => validateInput($db->conn,$_POST['age']),
        'telephone' => validateInput($db->conn,$_POST['telephone']),
        'niveau' => validateInput($db->conn,$_POST['niveau']),
        'module' => validateInput($db->conn,$_POST['module']),
        'abonnement' => validateInput($db->conn,$_POST['abonnement']),
        'etat' => validateInput($db->conn,$_POST['etat']),
    ];   

    $students = new StudentController;

    $student_query = $students->UpdateStudent($dataInput,$student_id);

    if($student_query)
    {
        redirectTo('Student Updated With Success ^-^','pages/Students.php');
    }
    else
    {
        redirectTo('Something Went Wrong ?!','pages/Students.php');
    }
}


?>