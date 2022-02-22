<?php 


class FactureController
{
    public function __construct()
    {
        $db = new DBConnection;

        $this->conn = $db->conn;
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

        $factures = "SELECT * FROM factures ";

        $query_facture = $this->conn->query($factures);

        if($query_facture->num_rows > 0)
        {
            return $query_facture;
        }
        else
        {
            return false;
        }
    }

    public function AddFacture($dataInput)
    {
        $data = "'". implode("','",$dataInput) ."'";

        $query_add = "INSERT INTO factures (nom,prenom,telephone,date_payment,date_proch_payment,abonnement,module,status) VALUES($data)";

        $query_exe = $this->conn->query($query_add);

        if($query_exe)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function DeleteFacture($facture_id)
    {
        $id = validateInput($this->conn,$facture_id);

        $query_del = "DELETE FROM factures WHERE id='$id' LIMIT 1";

        $result = $this->conn->query($query_del);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function EditFacture($id)
    {
        $id_facture = validateInput($this->conn,$id);

        $query_ed = "SELECT * FROM factures WHERE id='$id_facture' LIMIT 1";

        $query_exe = $this->conn->query($query_ed);

        if($query_exe->num_rows == 1)
        {
            $data = $query_exe->fetch_assoc();

            return $data;
        }
        else
        {
            return false;
        }
    }

    public function UpdateFacture($dataInput,$id_facture)
    {
        $id = validateInput($this->conn, $id_facture);

        $nom = $dataInput['nom'];
        $prenom = $dataInput['prenom'];
        $telephone = $dataInput['telephone'];
        $date_payment = $dataInput['date_payment'];
        $date_proch_payment = $dataInput['date_proch_payment'];
        $abonnement = $dataInput['abonnement'];
        $module = $dataInput['module'];
        $status = $dataInput['status'];

        $query_update = "UPDATE factures SET nom='$nom',prenom='$prenom',telephone='$telephone',date_payment='$date_payment',date_proch_payment='$date_proch_payment',abonnement='$abonnement',module='$module',status='$status' WHERE id='$id'";

        $result = $this->conn->query($query_update);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function PDFFacture($id)
    {
        $id_facture = validateInput($this->conn,$id);

        $query_ed = "SELECT * FROM factures WHERE id='$id_facture' LIMIT 1";

        $query_exe = $this->conn->query($query_ed);

        if($query_exe->num_rows == 1)
        {
            $data = $query_exe->fetch_assoc();

            return $data;
        }
        else
        {
            return false;
        }
    }

    public function get_factures_day()
    {
        $date = date('y-m-d');
        $query_us = "SELECT * FROM factures WHERE date_proch_payment='$date'";

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