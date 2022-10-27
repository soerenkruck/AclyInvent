<!DOCTYPE html>
<html lang="de">
<head>

    <link rel="stylesheet" href="https://use.typekit.net/qqr0irn.css">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/sizes.css">
    <link rel="stylesheet" href="../../style/texts.css">
    <link rel="stylesheet" href="../../style/cards.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .layout {
            width: 100%;

            display: grid;
            grid-template-rows: repeat(auto-fill, 1fr);
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .col1Last1 { grid-column: 1 / -1; }

        input {
            width: 100%;
        }
        textarea {
            width: 100%;
        }

        table {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        th {
            border-bottom: 1px solid black;
            width: max-content;
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        td {
            width: auto;
        }
        tr {
            border-bottom: 1px grey;
            border-bottom-style: dashed;
        }
    </style>

    <?php
    include "../access/Rechnung.php";

    $id = $_GET["id"];
    ?>

    <title>AclyInvent</title>
</head>

<body>

<div class="header-bar">
    <div>
        <span class="header-title">AclyInvent</span><br>
        <span class="h4">Neue Rechnung</span>
    </div>


    <div class="logo">
        <img src="../../web_images/logo.png" style="max-width: 8em">
    </div>
</div>

<div class="space-medium"></div>

<div class="main t-8 rm-4 lm-4">
    <div class="slim-fit">

        <div class="space-medium"></div>

        <div class="center half-width" style="width: max-content">
            <div class="center">
                <span class="small16">Es wurde eine neue Rechnung mit folgender Rechnungsnummer generiert:</span><br>
                <span class="h3"><?php echo $id?></span>
            </div>
            <div class="space-small"></div>
            <button style="float: right; width: 6rem; justify-content: center" onclick="go()">
                <span class="light">Weiter</span>
                <img src="../../web_images/arrow_forward_FILL0_wght100_GRAD-25_opsz48.svg" style="height: 24px; margin-left: .5rem">
            </button>
        </div>


        <!-- TODO: Implement optional File-Upload
        <form class="half-width" style="padding-right: 4rem" method="post" action="../../data/upload.php" enctype="multipart/form-data">
            <div class="title-holder">
                <img src="../../web_images/file_upload_FILL0_wght100_GRAD-25_opsz48.svg">
                <div>
                    <span class="h4">Neue Datei hochladen</span>
                </div>
            </div>
            <span class="small2 translate-y-8-up">Wenn eine neue Datei hochgeladen wird, wird die vorhandene Kopie ersetzt.</span>

            <div class="space-small"></div>

            <input style="margin-top: 8px" type="file" name="rechnungsdatei">
            <input type="hidden" name="id" value="<?php echo $rechnungsID?>">
            <input style="width: max-content; margin-top: 8px" name="submit" type="submit" value="Speichern">
        </form>
        -->

    </div>
</div>

<div class="space-medium"></div>

<footer class="full-width" style="z-index: 0">
    <div class="footer">
        <div class="links">
            <a href="../../">Startseite</a>
        </div>
        <div class="right">
            <span>&COPY; 2022 krukk productions.</span>
        </div>
    </div>
</footer>

<script>
    function go() {
        window.location.href = "../";
    }
</script>
</body>

</html>