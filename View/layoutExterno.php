<?php

function PrintCss()
{
    echo '<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auto Repuestos Grillo - Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Styles/estilos.css" rel="stylesheet">
        </head>';
}

function PrintScript()
{
    echo '
            <script src="../Scripts/jquery.min.js"></script>
            <script src="../Scripts/bootstrap.bundle.min.js"></script>
            <script src="../Scripts/jquery.easing.min.js"></script>
            <script src="../Scripts/sb-admin-2.min.js"></script>
            <script src="../Scripts/comunes.js"></script>';
}

?>