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
    foreach ($array as $element) {
        $ticket_ids .= ($element . ",");
    }
    $ticket_ids = substr_replace($ticket_ids, "", -1);
    $query = "SELECT * FROM tickets_list WHERE ticket_id in ($ticket_ids)";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $content = '<style>
			body {
				font-size: 16px;
				margin: 0;
			}
			.container {
				width: 602px;
				height: 200px;
				margin: 0 auto;
				border-radius: 4px;
				background-color: #4537de;
				box-shadow: 0 8px 16px rgba(35, 51, 64, 0.25);
			}
			.column-1 {
				float: left;
				width: 400px;
				height: 200px;
				border-right: 2px dashed #fff;
			}
			.column-2 {
				float: right;
				width: 200px;
				height: 200px;
			}
			.text-frame {
				padding: 40px;
				height: 120px;
			}
			.qr-holder {
				position: relative;
				width: 160px;
				height: 160px;
				margin: 20px;
				background-color: #fff;
				text-align: center;
				line-height: 30px;
				z-index: 1;
			}
			.qr-holder > img {
				margin-top: 20px;
			}
			.event {
				font-size: 24px;
				color: #fff;
				letter-spacing: 1px;
			}
			.date {
				font-size: 18px;
				line-height: 30px;
				color: #a8bbf8;
			}
			.name,
			.ticket-id {
				font-size: 16px;
				line-height: 22px;
				color: #fff;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="column-1">
				<div class="text-frame">
					<div class="event">PSPDFKit TALENT SHOW</div>
					<div class="date">26 August, 2021</div>
					<br />
					<div class="name">John Smith</div>
					<div class="ticket-id">#123456</div>
				</div>
			</div>

			<div class="column-2">
				<div class="qr-holder">
					<img src="qr-code.png" width="120px" height="120px" />
				</div>
			</div>
		</div>  ';
        }
    }
}

// require_once('../vendor/TCPDF-main/tcpdf.php');
// $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $obj_pdf->SetCreator(PDF_CREATOR);
// $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
// $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
// $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// $obj_pdf->SetDefaultMonospacedFont('helvetica');
// $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
// $obj_pdf->setPrintHeader(false);
// $obj_pdf->setPrintFooter(false);
// $obj_pdf->SetAutoPageBreak(TRUE, 10);
// $obj_pdf->SetFont('helvetica', '', 12);
// $obj_pdf->AddPage();
// $obj_pdf->writeHTML($content);
// ob_end_clean();
// $obj_pdf->Output('ticket.pdf', 'I');
?>
<style>
    body {
        font-size: 16px;
        margin: 0;
    }

    .container {
        width: 602px;
        height: 200px;
        margin: 0 auto;
        border-radius: 4px;
        background-color: #4537de;
        box-shadow: 0 8px 16px rgba(35, 51, 64, 0.25);
    }

    .column-1 {
        float: left;
        width: 400px;
        height: 200px;
        border-right: 2px dashed #fff;
    }

    .column-2 {
        float: right;
        width: 200px;
        height: 200px;
    }

    .text-frame {
        padding: 40px;
        height: 120px;
    }

    .qr-holder {
        position: relative;
        width: 160px;
        height: 160px;
        margin: 20px;
        background-color: #fff;
        text-align: center;
        line-height: 30px;
        z-index: 1;
    }

    .qr-holder>img {
        margin-top: 20px;
    }

    .event {
        font-size: 24px;
        color: #fff;
        letter-spacing: 1px;
    }

    .date {
        font-size: 18px;
        line-height: 30px;
        color: #a8bbf8;
    }

    .name,
    .ticket-id {
        font-size: 16px;
        line-height: 22px;
        color: #fff;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="column-1">
            <div class="text-frame">
                <div class="event">PSPDFKit TALENT SHOW</div>
                <div class="date">26 August, 2021</div>
                <br />
                <div class="name">John Smith</div>
                <div class="ticket-id">#123456</div>
            </div>
        </div>

        <div class="column-2">
            <div class="qr-holder">
                <img src="qr-code.png" width="120px" height="120px" />
            </div>
        </div>
    </div>