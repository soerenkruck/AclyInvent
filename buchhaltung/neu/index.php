<!DOCTYPE html>
<html lang="de">
<head>

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
    include "access/RechnungsHandler.php";
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
        <img src="../../web_image/logo.png" style="max-width: 8em">
    </div>
</div>

<div class="space-large"></div>

<div class="main t-8 rm-4 lm-4">
    <div class="slim-fit">

        <form action="../access/RechnungsErsteller.php" method="post" class="half-width">
            <section class="layout">
                <div><span>Name (Firma)</span></div>
                <div class="col1Last1 mb"><input class="" name="name" type="text"></div>

                <div><span>Adresse</span></div>
                <div class="col1Last1"><textarea class="" name="adress" type="text"></textarea></div>

                <div class="space-small col1Last1"></div>
                <div><span>Rechnungsdatum</span></div>
                <div class="col1Last1"><input class="" style="width: auto" name="date" type="date"></div>

                <div class="space-small col1Last1"></div>
                <div><span>Rechnungssumme in €</span></div>
                <div class="col1Last1"><input class="" name="sum" type="number"></div>

                <div class="space-small col1Last1"></div>
                <input style="width: max-content;"type="submit" value="Generieren">
            </section>
        </form>

    </div>
</div>

<div class="space-medium"></div>

<footer class="full-width">
    <div class="footer">
        <div class="links">
            <a href="../../">Startseite</a>
        </div>
        <div class="right">
            <span>&COPY; 2022 krukk productions.</span>
        </div>
    </div>
</footer>

</body>

</html>