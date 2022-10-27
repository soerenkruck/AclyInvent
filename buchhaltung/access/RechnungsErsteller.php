<?php

include "../../inventar/handler/credentials.php";

$pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);
$statement = "SELECT COUNT(rechnungsnummer) FROM `rechnungen`";

$datum = $_POST["date"];
$adress = $_POST["name"] . ";" . $_POST["adress"];
$sum = $_POST["sum"];
$type = $_POST["type"];

$number = "";

foreach ($pdo->query($statement) as $row) {
    $n = $row["COUNT(rechnungsnummer)"];

    for ($i = 0; $i < 3 - (intdiv($n + 1, 10)); $i++) {
        $number = $number . "0";
    }
    $number = $number . ($n + 1);
}

$rechnungsnummer = $type . "-" . substr($datum, 2, 2) . "-" . $number;

$insertRequest = "INSERT INTO `rechnungen` (`id`, `rechnungsnummer`, `rechnungsadresse`, `rechnungsdatum`, `summenwert`, `status`, `send_status`, `file`) 
VALUES (NULL, '".$rechnungsnummer."', '".$adress."', '".$datum."', ".$sum.", '0', '0', NULL)";

echo "Redireceting after proceeding...";

$insert = $pdo->prepare($insertRequest);
$insert->execute();

header("Location: ../neu/ready.php?id=". $rechnungsnummer);
die();
?>
