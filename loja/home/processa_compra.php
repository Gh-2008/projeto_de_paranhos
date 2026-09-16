<?php
if (!isset($_SESSION)) {
    session_start();
} 

extract($_POST);

$_SESSION['COMPRA'] = 'COMPRA';
$compra = $_SESSION['COMPRA'];
echo($compra);

header("Location: ../login/cad.php");
?>
