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
            grid-template-columns: repeat(1, 1fr);
            gap: 8px;
        }

        .col1Last1 { grid-column: 1 / -1; }

        .main-split {
            width: 1366px;

            display: grid;
            grid: "sidebar body" 1fr / 1fr 5fr;
            gap: 8px;
        }
        .sidebar { grid-area: sidebar; }
        .body { grid-area: body; }

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
    include "../access/RechnungsHandler.php";
    include "../access/Rechnung.php";

    $rechnungsID = $_GET["id"];
    $rechnung = Rechnung::ladeRechnung($rechnungsID);
    ?>

    <title>AclyInvent</title>
</head>

<body>

<div class="header-bar">
    <div>
        <span class="header-title">AclyInvent</span><br>
        <span class="h4">Rechnung</span>
    </div>
    <div class="logo">
        <img src="../../web_images/logo.png" style="max-width: 8em">
    </div>
</div>

<div class="space-medium"></div>

<div class="main t-8 rm-4 lm-4">
    <div class="slim-fit">

        <div class="title-holder lm">
            <button class="image-button rm lm" onclick="back()"><img src="../../web_images/arrow_back_FILL0_wght100_GRAD-25_opsz48.svg"></button>
            <div class="">
                <p>
                    <span class="h3">Rechnung</span>
                    <br>
                    <span class="small16"><?php echo $rechnung->rechnungsnummer?></span>
                </p>
            </div>
        </div>

        <h4></h4>
        <section class="main-split">
            <div class="sidebar" style="text-align: center">

                <div id="sendStatusView">
                    <?php
                    switch ($rechnung->sendStatus) {
                        case 1: echo "<img src='../../web_images/mark_email_read_FILL0_wght100_GRAD-25_opsz48.svg'/><br>
                            <span>zugestellt</span>";
                            break;
                        case 0: echo "<img src='../../web_images/sms_failed_FILL0_wght100_GRAD-25_opsz48.svg'/><br>
                            <span>nicht zugestellt</span>";
                            break;
                    }
                    ?>
                </div>
                <br><button style='margin-top: 8px' class='top' onclick='changeSendStatus()'>Ändern</button>


                <br>
                <div id="paystatusview">
                    <?php
                    switch ($rechnung->status) {
                        case 0: echo "<h4 class='danger'>nicht bezahlt</h4>";
                            break;
                        case 1: echo "<h4 class='ok'>bezahlt</h4>";
                            break;
                        case 2: echo "<h4 class='warning'>storniert</h4>";
                            break;
                    }
                    ?>
                </div><button onclick="changePayStatus()">Ändern</button>

            </div>
            <div class="body">
                <section class="layout">
                    <div class="title-holder">
                        <img src="../../web_images/info_FILL0_wght100_GRAD-25_opsz48.svg">
                        <div>
                            <span style="margin: auto" class="h4">Informationen</span>
                        </div>
                    </div>
                    <form action="../access/RechnungUpdater.php?id=<?php echo $rechnungsID?>" method="post" style="padding-right: 4rem" class="light-border half-width">

                        <div><span>Name (Firma)</span></div>
                        <div class="col1Last1 mb" style="margin-top: 8px"><input class="" name="name" type="text" value="<?php echo explode(';', $rechnung->rechnungsadresse,5)[0]?>"></div>

                        <div><span>Adresse</span></div>
                        <div class="col1Last1" style="margin-top: 8px"><textarea class="" name="adress" type="text"><?php echo explode(';', $rechnung->rechnungsadresse,5)[1]?></textarea></div>

                        <div class="space-small col1Last1"></div>

                        <div class="col1Last1" style="display: flex">
                            <div style="flex: 0 0 auto;">
                                <div><span>Rechnungsdatum</span></div>
                                <div style="margin-top: 8px">
                                    <input class="" style="width: auto" name="date" type="date"
                                           value="<?php echo $rechnung->rechnungsdatum ?>">
                                </div>
                            </div>
                            <div style="flex: 1" class="lm">
                                <div><span>Rechnungssumme in €</span></div>
                                <div style="margin-top: 8px">
                                    <input class="" name="sum" type="number"
                                           value="<?php echo $rechnung->rechnungssumme?>">
                                </div>
                            </div>

                        </div>



                        <input id="paystatusinput" name="paystatus" type="hidden" value="<?php echo $rechnung->status?>">
                        <input id="sendstatusinput" name="sendstatus" type="hidden" value="<?php echo $rechnung->sendStatus?>">

                        <div class="space-small col1Last1"></div>
                        <input style="width: max-content;"type="submit" value="Speichern">

                    </form>

                    <form class="light-border" style="width: 50%; margin-top: 2em; padding-right: 4rem" method="post" action="../../data/upload.php" enctype="multipart/form-data">
                        <div style="margin-bottom: 1rem"><span class="h4">Rechnungsdatei</span></div>
                        <!-- TODO: Rechnungsdatei anzeigen -->

                        <?php
                            if (strlen($rechnung->filePath) > 0) {
                                echo '<iframe src="../../data/'. $rechnung->filePath .'" style="width: 105%; height: 555px"></iframe>';
                            }
                        ?>


                        <input style="margin-top: 8px" type="file" name="rechnungsdatei">
                        <input type="hidden" name="id" value="<?php echo $rechnungsID?>">
                        <input style="width: max-content; margin-top: 8px" name="submit" type="submit" value="Speichern">
                    </form>
                </section>
            </div>
        </section>
    </div>
</div>

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

<script>

    var payStatus = <?php echo $rechnung->status?>;
    var sendStatus = <?php echo $rechnung->sendStatus?>;

    function changePayStatus() {
        payStatus++;
        if (payStatus > 2) payStatus = 0;

        // TODO: Visibility change and hiddenvalue
        document.getElementById("paystatusinput").value = payStatus;

        if (payStatus == 0) {
            document.getElementById("paystatusview").innerHTML = "<h4 class='danger'>nicht bezahlt</h4>"
        } else if (payStatus == 1){
            document.getElementById("paystatusview").innerHTML = "<h4 class='ok'>bezahlt</h4>"
        } else if (payStatus == 2) {
            document.getElementById("paystatusview").innerHTML = "<h4 class='warning'>storniert</h4>"
        }
    }

    function back() {
        window.location.href = "../";
    }

    function changeSendStatus() {
        sendStatus++;
        if (sendStatus > 1) sendStatus = 0;

        // TODO: Visibilty and hiddenvalue
        document.getElementById("sendstatusinput").value = sendStatus;

        if (sendStatus == 1) {
            document.getElementById("sendStatusView").innerHTML = "<img src='../../web_images/mark_email_read_FILL0_wght100_GRAD-25_opsz48.svg'/><br><span>zugestellt</span><br>";
        } else {
            document.getElementById("sendStatusView").innerHTML = "<img src='../../web_images/sms_failed_FILL0_wght100_GRAD-25_opsz48.svg'/><br><span>nicht zugestellt</span>";
        }
    }
</script>

<div class="space-medium"></div>

</body>

</html>