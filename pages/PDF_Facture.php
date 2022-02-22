<?php

include('../config/App.php');
include('../codes/Facture_Code.php');

$auth->isAdmin();

require_once '../vendor/autoload.php';
?>

<?php


if (isset($_GET["id"])) {
    $id_fac = validateInput($db->conn, $_GET["id"]);
    $facture = new FactureController;

    $factures = $facture->PDFFacture($id_fac);

    if ($factures) {

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage("L");
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $stylesheet = file_get_contents('../Assets/css/stylees.css');
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML('
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>

        <body>
           
                    <div align="center">
                        <img src="../Assets/img/50.jpg" width="110px" height="100px" >
                    </div>
                        <h3 id="title" align="center"><strong style="color:red">SUP</strong>-<strong style="color:gold">SKY</strong> Institut Private </h3>
                        <h6 align="center">Reçu N° ' . $factures["id"] . ' | Date Payment : ' . $factures["created_at"] . '</h6>
                

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <table align="center" >
                            <tr>
                                <th><h4>Nom : ' . $factures["nom"] . '</h4><br></th>
                                <th>&nbsp;</th>
                                <th><h4>Prenom : ' . $factures["prenom"] . '</h4></th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            <tr>
                                <th><h4>Telephone : ' . $factures["telephone"] . ' </h4></th>
                                <th>&nbsp;</th>
                                <th><h4>Article Scolaire : ' . $factures["module"] . '</h4></th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            <tr>
                                <th><h4>Date Proch Payment : ' . $factures["date_proch_payment"] . '</h4></th>
                                <th>&nbsp;&nbsp;&nbsp;</th>
                                <th><h3 style="color:grey">Abonnement : ' . $factures["abonnement"] . ' DHs</h3></th>
                            </tr>
                        </table>
                    
             
           
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <hr>
                <br>
                <br>
                <table width="100%">
                    <tr>
                        <th><h5><img src="../Assets/img/address.png" width="20px" height="20px"> Boulevard mohamed v</h5> </th>
                        <th><h5>&nbsp;&nbsp;<img src="../Assets/img/email.png" width="20px" height="20px"> SUP-SKY@gmail.com</h5></th>
                        <th><h5>&nbsp;&nbsp;<img src="../Assets/img/phone-call.png" width="20px" height="20px"> +21265398745</h5></th>
                        <th><h5><img src="../Assets/img/facebook.png" width="20px" height="20px"> SUP-SKY Private Institut </h5></th>
                    </tr>
                </table>
        </body>
    </html>
', \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();
    } else {
        echo '<h4 class="display-6">No Records Found</h4>';
    }
}

?>