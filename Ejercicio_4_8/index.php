<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php


ini_set("session.use_cookies", 1); //el SID se transmite por cookie
ini_set("session.use_only_cookies", 0); // el SID se pasa en la URL
ini_set("session.use_trans_sid", 1);
require_once "include.php";
Session::startSession();
Controlador::init();

?>

</body>
</html>