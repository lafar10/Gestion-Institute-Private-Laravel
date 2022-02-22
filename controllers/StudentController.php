<?php



class StudentController
{
    public function __construct()
    {
        $db = new DBConnection;

        $this->conn = $db->conn;
    }

    public function CreateStudent($data)
    {
        $dataInput = "'" . implode("','", $data) . "'";

        $query = "INSERT INTO students (nom,prenom,age,telephone,niveau,module,abonnement,etat) VALUES($dataInput)";

        $query_result = $this->conn->query($query);

        if ($query_result) {
            return true;
        } else {
            return false;
        }
    }

    public function Index()
    {
       /*  $parPage = 10;

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        }

        $start_from = ($currentPage-1)*10; */

        $students = "SELECT * FROM students";

        $students_query = $this->conn->query($students);

        if ($students_query->num_rows > 0) {
            return $students_query;
        } else {
            return false;
        }
    }

    public function DeleteStudent($id)
    {
        $student_is = validateInput($this->conn, $id);

        $query_s = "DELETE FROM students WHERE id='$student_is' LIMIT 1";

        $result_q = $this->conn->query($query_s);

        if ($result_q) {
            return true;
        } else {
            return false;
        }
    }

    public function GetUser($id)
    {
        $student_id = validateInput($this->conn, $id);

        $query_get = "SELECT * FROM students WHERE id='$student_id' LIMIT 1";

        $result_query = $this->conn->query($query_get);

        if ($result_query->num_rows == 1) {
            $data = $result_query->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function UpdateStudent($dataInput, $student_id)
    {
        $id = validateInput($this->conn, $student_id);

        $nom = $dataInput['nom'];
        $prenom = $dataInput['prenom'];
        $age = $dataInput['age'];
        $telephone = $dataInput['telephone'];
        $niveau = $dataInput['niveau'];
        $module = $dataInput['module'];
        $abonnement = $dataInput['abonnement'];
        $etat = $dataInput['etat'];

        $query_update = "UPDATE students SET nom='$nom',prenom='$prenom',age='$age',telephone='$telephone',niveau='$niveau',module='$module',abonnement='$abonnement',etat='$etat' WHERE id='$id'";

        $result = $this->conn->query($query_update);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
