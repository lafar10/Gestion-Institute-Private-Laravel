<?php


include_once('../controllers/UserController.php');
include_once('../controllers/LoginController.php');
$auth = new LoginController;

if(isset($_POST['create_user']))
{

    $dataInput = [
        'name' => validateInput($db->conn,$_POST['name']),
        'email' => validateInput($db->conn,$_POST['email']),
        'password' => validateInput($db->conn,$_POST['password']),
        'role_as' => validateInput($db->conn,$_POST['role_as']),
        'status' => validateInput($db->conn,$_POST['status']),
    ];

    $user = new UserController;

    if($_POST['name'] != null && $_POST['email'] != null && $_POST['password'] != null && $_POST['role_as'] != null)
    {
        $create_user = $user->CreateUser($dataInput);

        if($create_user)
        {
            redirectTo('User Created With Success ^+^','pages/Add_Users.php');
        }
        else
        {
            redirectTo('Something Went Wrong !!','pages/Add_Users.php');
        }
    }
    else
    {
        redirectTo('inputs fields required !','pages/Add_Users.php');
    }
}

if(isset($_POST['update_user']))
{

    $user_id = validateInput($db->conn,$_POST['user_id']);

    $dataInput = [
        'name' => validateInput($db->conn,$_POST['name']),
        'email' => validateInput($db->conn,$_POST['email']),
        'password' => validateInput($db->conn,$_POST['password']),
        'role_as' => validateInput($db->conn,$_POST['role_as']),
        'status' => validateInput($db->conn,$_POST['status']),
    ];

    

    if($_POST['name'] != null && $_POST['email'] != null && $_POST['password'] != null && $_POST['role_as'] != null)
    {
        $user = new UserController;
        $create_user = $user->UpdateUser($dataInput,$user_id);

        if($create_user)
        {
            redirectTo('User Updated With Success ^+^','pages/Users.php');
        }
        else
        {
            redirectTo('Something Went Wrong !!','pages/Edit_Users.php');
        }
    }
    else
    {
        redirectTo('inputs fields required !','pages/Edit_Users.php');
    }
}



if(isset($_POST['delete_user']))
{
    $user_id = validateInput($db->conn,$_POST['delete_user']);

    $users = new UserController;

    $result = $users->DeleteUser($user_id);

    if($result)
    {
        redirectTo('User Deleted With Success ^-^','pages/Users.php');
    }
    else
    {
        return false;
    }
}


?>