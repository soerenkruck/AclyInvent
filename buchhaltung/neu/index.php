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
        <img src="../../web_images/logo.png" style="max-width: 8em">
    </div>
</div>

<div class="space-medium"></div>

<div class="main t-8 rm-4 lm-4">
    <div class="slim-fit">

        <form action="../access/RechnungsErsteller.php" method="post" class="half-width center">
            <section class="center">

                <div class="title-holder hm-1">
                    <img src="../../web_images/contact_mail_FILL0_wght100_GRAD-25_opsz48.svg">
                    <div>
                        <span class="h4" style="margin-left: 0.5em">Adressinformationen</span>
                    </div>
                </div>
                <div class="light-border">
                    <div><span>Name (Firma)</span></div>
                    <div class="col1Last1 mb rm-2" style="margin-top: 8px"><input class="" name="name" type="text"></div>

                    <div><span>Adresse</span></div>
                    <div class="col1Last1 rm-2" style="margin-top: 8px"><textarea class="" name="adress" type="text"></textarea></div>

                    <div class="space-small"></div>
                    <input type="radio" id="a" name="type" value="A" class="min-width">
                    <label for="a">Geschäftskunde</label><br>
                    <input type="radio" id="b" name="type" value="B" class="min-width">
                    <label for="b">Privatkunde</label>
                </div>

                <div class="space-small"></div>

                <div class="title-holder hm-1">
                    <img src="../../web_images/receipt_long_FILL0_wght100_GRAD-25_opsz48.svg">
                    <div>
                        <span class="h4" style="margin-left: 0.5em">Rechnungsdetails</span>
                    </div>
                </div>
                <div class="light-border">
                    <div><span>Rechnungsdatum</span></div>
                    <div class="mb"><input class="" style="width: auto" name="date" type="date"></div>

                    <div><span>Rechnungssumme in €</span></div>
                    <div class="col1Last1"><input class="" name="sum" type="number"></div>
                </div>

                <div class="space-small"></div>
                <div style="width: 100%">
                    <input style="width: 8rem; z-index: 5; justify-content: center; float: right" type="submit" value="Generieren">
                </div>
                <div class="space-large"></div>
            </section>
        </form>

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

</body>

</html>