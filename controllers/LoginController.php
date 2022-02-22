<?php

class LoginController
{

    public function __construct()
    {
        $db = new DBConnection;

        $this->conn = $db->conn;
    }

    function isLogged()
    {
        if (isset($_SESSION['authentication']) === TRUE) {
            redirectTo('You Are Already Login !!', 'pages/Home.php');
        } else {
            return false;
        }
    }

    function isAdmin()
    {
        if ($_SESSION['user_role_as'] === '1') {
            return true;
        } else {
            redirectTo('Access Denied As You Are An Admin', 'pages/Dashboard.php');
        }
    }
    public function userAuthentication($email, $password)
    {
        $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $result = $this->conn->query($login_query);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->userAuth($data);
            return true;
        } else {
            return false;
        }
    }

    private function userAuth($data)
    {
        $_SESSION['authentication'] = TRUE;
        $_SESSION['user_role_as'] = $data['role_as'];
        $_SESSION['user_auth'] = [
            'user_id' => $data['id'],
            'user_name' => $data['name'],
            'user_email' => $data['email'],
        ];
    }

    public function LogoutUser()
    {
        if (isset($_SESSION['authentication']) === TRUE) {

            unset($_SESSION['authentication']);
            unset($_SESSION['user_role_as']);
            unset($_SESSION['user_auth']);
            return true;
            
        } else {
            return false;
        }
    }

}
