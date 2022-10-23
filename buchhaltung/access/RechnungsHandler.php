<?php

include "../inventar/handler/credentials.php";

function loadBills()
{
    $pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);
    $sql = "SELECT * FROM `rechnungen` WHERE `status`=0 ORDER BY `rechnungsdatum` DESC";

    foreach ($pdo->query($sql) as $row) {
        $sent = ($row["send_status"] == '1');
        $path = $row["file"];
        $result_string = $result_string .
            '<tr style="margin-bottom: 2em">
                    <td><span style="align-self: center">'.substr($row["rechnungsadresse"], 0, 36).'</span></td>
                    <td><span style="align-self: center">'.$row["rechnungsnummer"].'</span></td>
                    <td><span style="align-self: center">'.$row["rechnungsdatum"].'</span></td>
                    <td><span style="align-self: center">'.statusToText($row["status"]).'</span></td>
                    <td><span style="align-self: flex-end">'. getCloudImage($path) .'</span></td>
                    <td><span style="align-self: flex-end">'. getSentImage($sent) .'</span></td>
                    <td style="width: 1em"><button onclick="navToBill('.$row["id"].')" class="image-button rm" style="margin-top: 1em; margin-bottom: 1em"><img src="../web_image/wysiwyg_FILL0_wght100_GRAD-25_opsz48.svg" style="width: 24px"></button></td>
            </tr>
            ';
        $length++;
    }

    $pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);
    $sql = "SELECT * FROM `rechnungen` WHERE `status`!=0 ORDER BY `rechnungsdatum` DESC";

    foreach ($pdo->query($sql) as $row) {
        $sent = ($row["send_status"] == '1');
        $path = $row["file"];
        $result_string = $result_string .
            '<tr style="margin-bottom: 2em">
                    <td><span style="align-self: center">'.substr($row["rechnungsadresse"], 0, 36).'</span></td>
                    <td><span style="align-self: center">'.$row["rechnungsnummer"].'</span></td>
                    <td><span style="align-self: center">'.$row["rechnungsdatum"].'</span></td>
                    <td><span style="align-self: center">'.statusToText($row["status"]).'</span></td>
                    <td><span style="align-self: flex-end">'. getCloudImage($path) .'</span></td>
                    <td><span style="align-self: flex-end">'. getSentImage($sent) .'</span></td>
                    <td style="width: 1em"><button onclick="navToBill('.$row["id"].')" class="image-button rm" style="margin-top: 1em; margin-bottom: 1em"><img src="../web_image/wysiwyg_FILL0_wght100_GRAD-25_opsz48.svg" style="width: 24px"></button></td>
            </tr>
            ';
        $length++;
    }

    if ($length == 0) {
        return '<div class="top-holder">
            <div class="card full-width">
                <div class="card-content">
                    <span class="card-title">Kein Inventar</span>
                </div>
            </div>
        </div>';
    } else {
        return $result_string;
    }

}

function getSentImage($s) {
    if ($s) {
        return "<img style='width: 36px' src='../../web_images/mark_email_read_FILL0_wght100_GRAD-25_opsz48.svg'>";
    } else {
        return "<img style='width: 36px' src='../../web_images/sms_failed_FILL0_wght100_GRAD-25_opsz48.svg'>";
    }
}
function getCloudImage($p) {
    if (strlen($p) > 0) {
        return "<img style='width: 36px' src='../../web_images/cloud_done_FILL0_wght100_GRAD-25_opsz48.svg'>";
    } else {
        return "<img style='width: 36px'";
    }
}

function statusToText($status) {
    switch ($status) {
        case '0': return "<span class='danger'>nicht bezahlt</span>";
        case '1': return "<span class='ok'>bezahlt</span>";
        case '2': return "<span class='warning'>storniert</span>";
    }
}

?>