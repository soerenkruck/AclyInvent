<!DOCTYPE html>
<html lang="de">
<head>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/sizes.css">
    <link rel="stylesheet" href="../style/texts.css">
    <link rel="stylesheet" href="../style/cards.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .layout {
            width: 100%;

            display: flex;
            gap: 16px;

            align-content: center;
            justify-content: center;
        }

        .marginLeft { margin-left: auto; }

        .grow1 { flex-grow: 1; }

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
        <span class="h4">Buchhaltung</span>
    </div>


    <div class="logo">
        <img src="../../web_image/logo.png" style="max-width: 8em">
    </div>
</div>

<div class="space-large"></div>

<div class="main t-8 rm-4 lm-4">
    <div class="slim-fit">
        <section class="layout">
            <div>
                <h2 style="margin: 0">Rechnungen</h2>
            </div>
            <div class="marginLeft">
                <button style="border-radius: 1em" onclick="nav(1)">
                    <div style="text-align: center; display: flex">
                        <img src="../web_image/post_add_FILL0_wght100_GRAD-25_opsz48.svg" style="width: 24px">
                        <span style="align-self: center; margin-left: 1em">Hinzufügen</span>
                    </div>
                </button>
            </div>
        </section>

        <div class="space-small"></div>

        <div class="">
            <table style="font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%; text-align: left">
                <tr>
                    <th>Adresse</th>
                    <th>Rechnungsnummer</th>
                    <th>Rechnungsdatum</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php
                echo loadBills();
                ?>
            </table>


            <div class="space-large"></div>

        </div>

    </div>

</div>
<footer class="full-width">
    <div class="footer">
        <div class="links">
            <a href="../">Startseite</a>
        </div>
        <div class="right">
            <span>&COPY; 2022 krukk productions.</span>
        </div>
    </div>
</footer>
<script>
    function nav(i) {
        switch (i) {
            case 0: window.location.href = "inventar";
                break;
            case 1: window.location.href = "neu";
                break;
        }
    }

    function navToBill(id) {
        window.location.href = "rechnung/index.php?id=" + id;
    }
</script>

</body>

</html>