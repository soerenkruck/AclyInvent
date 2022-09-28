<!DOCTYPE html>
<html lang="de">
<head>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/sizes.css">

    <link rel="stylesheet" href="style/texts.css">
    <link rel="stylesheet" href="style/cards.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

        /*
        body {
            background: url("./web_image/pexels-fiona-art-5186869.jpeg") no-repeat center;
            background-size: cover;
        }

         */

        .middle {
            width: 50%;

            display: flex;
            gap: 128px;

            justify-content: center;
            align-items: center;
        }
    </style>

    <title>AclyInvent</title>
</head>

<body>

<div class="header-bar">
    <div>
        <span class="header-title">AclyInvent</span><br>
        <span class="h4">Rechnung</span>
    </div>
    <div class="logo">
        <img src="../../web_image/logo.png" style="max-width: 8em">
    </div>
</div>

<div class="space-large"></div>

<div class="main t-8">
    <div class="slim-fit">

        <section class="middle center">
                <div class="navigation-card" onclick="nav(1)">
                    <div class="nc-content">
                        <div class="top">
                            <img class="center" src="web_image/inventory_FILL0_wght100_GRAD-25_opsz48.svg"><br>
                        </div>
                        <div class="bottom">
                            <span class="h4">Inventar</span>
                        </div>
                    </div>
                </div>
                <div class="navigation-card" onclick="nav(2)">
                    <div class="nc-content">
                        <div class="top">
                            <img class="center" src="web_image/library_books_FILL0_wght100_GRAD-25_opsz48.svg"><br>
                        </div>
                        <div class="bottom">
                            <span class="h4">Buchhaltung</span>
                        </div>
                    </div>
                </div>

    </div>
</div>

<script>
    function nav(i) {
        switch (i) {
            case 1:
                window.location.href = "inventar";
                break;
            case 2:
                window.location.href = "buchhaltung";
        }
    }
</script>

</body>

</html>