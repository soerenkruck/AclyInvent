<?php

include "../../inventar/handler/credentials.php";

$datum = $_POST["date"];
$adress = $_POST["name"] . ";" . $_POST["adress"];
$sum = $_POST["sum"];
$status = $_POST["paystatus"];
$sendStatus = $_POST["sendstatus"];

$id = $_GET["id"];

echo $datum;
echo "<br>";
echo $adress;
echo "<br>";
echo $sum;
echo "<br>";
echo $status;
echo "<br>";
echo $sendStatus;
echo "<br>";
echo $id;

$pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);
$statement = "UPDATE `rechnungen` SET `summenwert` = '".$sum."', `status` = '".$status."', `rechnungsdatum` = '".$datum."', `rechnungsadresse` = '".$adress."', `send_status` = '".$sendStatus."' WHERE `rechnungen`.`id` = ".$id;

if ($pdo->query($statement) === TRUE) {
}

header("Location: ../");
die();

?>
