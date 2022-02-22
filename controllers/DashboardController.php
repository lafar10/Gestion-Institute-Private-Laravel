<?php



class DashboardController
{
    public function __construct()
    {
        $db = new DBConnection;

        $this->conn = $db->conn;
    }

    public function num_users()
    {
        $query = "SELECT * FROM users ";

        $query_exe = $this->conn->query($query);

        if ($query_exe) {
            $count = mysqli_num_rows($query_exe);

            return $count;
        } else {
            return false;
        }
    }

    public function num_students()
    {
        $query = "SELECT * FROM students";

        $query_exe = $this->conn->query($query);

        if ($query_exe) {
            $count = mysqli_num_rows($query_exe);

            return $count;
        } else {
            return false;
        }
    }

    public function num_factures()
    {
        $query = "SELECT * FROM factures";

        $query_exe = $this->conn->query($query);

        if ($query_exe) {
            $count = mysqli_num_rows($query_exe);

            return $count;
        } else {
            return false;
        }
    }

    public function today_earn()
    {
        $date = DATE('y-m-d');
        $sql_qry = "SELECT sum(abonnement) AS total FROM factures WHERE date_payment='$date' ";

        $duration = mysqli_query($this->conn, $sql_qry);

        while ($row = mysqli_fetch_assoc($duration)) {
            return $row['total'];
        }
    }

    

}
