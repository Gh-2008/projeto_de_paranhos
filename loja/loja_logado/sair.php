<?php
extract($_POST);

if (!isset($_SESSION)) {
    SESSION_START();
}

SESSION_DESTROY();
header("Location: ../home/index.php");

?>