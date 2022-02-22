<?php 

class RegisterController
{
    public function __construct()
    {
        $db = new DBConnection;

        $this->conn = $db->conn;
    }

    public function Registration($name,$email,$password)
    {
        $register_query = "INSERT INTO users (name,email,password) VALUES('$name','$email','$password')";
        $result = $this->conn->query($register_query);
        return $result;
    }

    public function IsUserExists($email)
    {
        $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";

        $result = $this->conn->query($check_email);

        if($result->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function Confirmation_Password($password,$confirm_password)
    {
        if($password == $confirm_password)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}


?>