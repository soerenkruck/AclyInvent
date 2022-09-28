<?php

include "../inventar/handler/credentials.php";

$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["rechnungsdatei"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$id = $_POST["id"];

echo "<code>";

echo "ID=" . $id . "<br>";
echo '<pre>'; print_r($_FILES); echo '</pre>';
echo "Datei=" . $target_file . "<br><br>";

// Check if file already exists

mkdir($target_dir);
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "pdf") {
    echo "Only PDF-Files are allowed.<br>";
    $uploadOk = 0;
}
echo "full_path=" . $_FILES["rechnungsdatei"]["full_path"] . "<br>";
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['rechnungsdatei']['tmp_name'], $target_dir . $_FILES['rechnungsdatei']['name'])) {
        echo "The file ". htmlspecialchars( basename( $_FILES["rechnungsdatei"]["name"])). " has been uploaded.";
        saveToDatabase($target_file, $id);
        header("Location: ../buchhaltung/rechnung/index.php?id=" . $id);
        die();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo "</code>";

function saveToDatabase(string $fileName, int $i) {
    $pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);
    $statement = "UPDATE `rechnungen` SET `file` ='".$fileName."' WHERE `rechnungen`.`id` = " . $i . ";";
    if ($pdo->query($statement) === TRUE) {
    }
}
?>