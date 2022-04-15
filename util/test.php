<?php
// echo "yahoo";

// $array = $_POST['name'];
// foreach ($array as $i) {
//     echo $i;
// }
include "../Database/db_conn.php";

if (isset($_POST['checkbox_list'])) {
    $array = $_POST['checkbox_list'];
    $ticket_ids = "";
    echo $ticket_ids;
    foreach ($array as $element) {
        $ticket_ids .= ($element . ",");
    }

    $ticket_ids = substr_replace($ticket_ids, "", -1);
    echo "<script>console.log('Debug Objects: " . $ticket_ids . "' );</script>";

    $query = "SELECT tickets_list.customer_name,tickets_list.no_adult,tickets_list.no_child,tickets_list.date_issued,ride_list.ride_name,ride_list.ride_description FROM tickets_list inner join ride_list  on  tickets_list.ride_id=ride_list.ride_id WHERE tickets_list.ticket_id in ($ticket_ids)";
    $result = mysqli_query($conn, $query);
    $content = '';
    if ($result->num_rows > 0) {
        $content .= '
        <h2>Generated Tickets</h2>
        <table style="width: 100%;" border="1">
        <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
           $content.='
            <tr>
            <td style="text-align:center;vertical-align:middle;width: 10%"rowspan="6"><strong>Sr No.</strong></td>
            <td style="width: 30%; text-align: left;"><strong>Customer Name</strong></td>
            <td style="width: 60%;">'.$row["customer_name"].'</td>
            </tr>
            <tr>
            <td style="width: 30%; text-align: left;"><strong>Ride Name</strong></td>
            <td style="width: 60%;">'.$row["ride_name"].'</td>
            </tr>
            <tr>
            <td style="width: 30%; text-align: left;"><strong>Ride Descripton</strong></td>
            <td style="width: 60%;">'.$row["ride_description"].'</td>
            </tr>
            <tr>
            <td style="width: 30%; text-align: left;"><strong>No of Adult</strong></td>
            <td style="width: 60%;">'.$row["no_adult"].'</td>
            </tr>
            <tr>
            <td style="width: 30%; text-align: left;"><strong>No of children</strong></td>
            <td style="width: 60%;">'.$row["no_child"].'</td>
            </tr>
            <tr>
            <td style="width: 30%; text-align: left;"><strong>Date Issued</strong></td>
            <td style="width: 60%;">'.$row["date_issued"].'</td>
            </tr>      
            ';
            $content.='</tbody>
            </table>';
        }
    }
    require_once('../vendor/TCPDF-main/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    $obj_pdf->writeHTML($content);
    ob_end_clean();
    $obj_pdf->Output('ticket.pdf', 'I');
} else {
    echo "nothing";
} ?>