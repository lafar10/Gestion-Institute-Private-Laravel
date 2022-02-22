<?php

include('../controllers/RegisterController.php');
include('../controllers/LoginController.php');

$auth = new LoginController;


if(isset($_POST['btn_register']))
{
    $name = validateInput($db->conn,$_POST['name']);
    $email = validateInput($db->conn,$_POST['email']);
    $password = validateInput($db->conn,$_POST['password']);
    $confirm_password = validateInput($db->conn,$_POST['confirm_password']);

    $register = new RegisterController;

    if($name != '' || $email !='' || $password != '')
    {

        $result = $register->Confirmation_Password($password,$confirm_password);
        if($result)
        {
            $result_email = $register->IsUserExists($email);

            if($result_email)
            {
                redirectTo('Email Already Exists!!','pages/Register.php');
            }
            else
            {
                $register_result = $register->Registration($name,$email,$password);
                if($register_result)
                {
                    redirectTo('Registration With Success','pages/Login.php');
                } 
                else
                {
                    redirectTo('Something Went Wrong !!','pages/Register.php');
                }
            }

        }
        else
        {
            redirectTo('Confirm Password Does Match !!','pages/Register.php');
        }
    }
    else
    {
        redirectTo('fields Required','pages/Register.php');
    }

}

if(isset($_POST['btn_login']))
{
    $email = validateInput($db->conn,$_POST['email']);
    $password = validateInput($db->conn,$_POST['password']);

    $result = $auth->userAuthentication($email,$password);

    if($email != '' || $password != '')
    {
        if($result)
        {
            if($_SESSION['user_role_as'] == 1)
            {
                redirectTo("Loggin With Success","pages/Dashboard.php");
            }
            else
            {
                redirectTo("Loggin With Success","pages/Home.php");
            }

        }
        else
        {
            redirectTo("Invalid Credentials !!","pages/Login.php");
        }
    }
    else
    {
        redirectTo("Input Fields Required","pages/Login.php");
    }
}

if(isset($_POST['button_logout']))
{
    $logout = $auth->LogoutUser();

    if($logout)
    {
        redirectTo("Logout With Success","pages/Login.php");
    }
    
}

?>