<!DOCTYPE html>
<html lang="de">
<head>

    <link rel="stylesheet" href="https://use.typekit.net/qqr0irn.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/sizes.css">

    <link rel="stylesheet" href="../style/texts.css">
    <link rel="stylesheet" href="../style/cards.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AclyInvent - Inventar</title>
</head>

<?php
include "handler/AccessHandler.php";
?>

<body>

    <div class="header-bar">
        <span class="header-title">AclyInvent</span><br>
        <span class="h4">Inventar</span>
    </div>


<div class="main">
    <div class="space-medium"></div>
    <div class=" lm-4 rm-4">

        <div class="space-large"></div>
        <div class="space-small"></div>

        <div class="list-view wrap">
            <?php
            echo getAllInvents();
            ?>
        </div>


    </div>

</div>

</body>

</html>