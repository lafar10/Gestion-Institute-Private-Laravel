<?php 

class UserController
{
    public function __construct()
    {
        $db = new DBConnection;

        $this->conn = $db->conn;
    }

    public function CreateUser($dataInput)
    {
        $data = "'". implode("','",$dataInput) ."'";

        $create_query = "INSERT INTO users (name,email,password,role_as,status) VALUES($data)";

        $check_query = $this->conn->query($create_query);
        
        if($check_query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function index()
    {
        /* $parPage = 5;

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        }

        $start_from = ($currentPage-1)*05; */

        $users = "SELECT * FROM users";

        $result = $this->conn->query($users);

        if($result->num_rows > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function editUser($id)
    {
        $user_id = validateInput($this->conn,$id);
        $user_query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";

        $result = $this->conn->query($user_query);

        if($result->num_rows == 1)
        {
            $data = $result->fetch_assoc();
            return $data; 
        }
        else
        {
            return false;
        }
    }

    public function UpdateUser($dataInput,$id)
    {
        $user_id = validateInput($this->conn,$id);

        $name = $dataInput['name'];
        $email = $dataInput['email'];
        $password = $dataInput['password'];
        $role_as = $dataInput['role_as'];
        $status = $dataInput['status'];

        $create_query = "UPDATE users set name='$name',email='$email',password='$password',role_as='$role_as',status='$status' WHERE id='$user_id' LIMIT 1";

        $check_query = $this->conn->query($create_query);
        
        if($check_query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function DeleteUser($id)
    {
        $user_id = validateInput($this->conn,$id);

        $user_query = "DELETE FROM users WHERE id='$user_id' LIMIT 1";

        $result = $this->conn->query($user_query);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_users_new()
    {
        $date = date('y-m-d');
        $query_us = "SELECT * FROM users WHERE status='non'";

        $res = $this->conn->query($query_us);

        if($res->num_rows > 0)
        {
            return $res;
        }
        else
        {
            return false;
        }
    }

}





?>