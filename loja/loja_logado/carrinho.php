<?php

if (!isset($_SESSION)) {
    session_start();
}

$carrinho = json_decode(file_get_contents("php://input"), true);
$nome = $_SESSION["Nome"];

$pasta = "../login/usuario/";
$carrinho_pasta = $pasta . $nome . "/carrinho_json.json";

file_put_contents(
    $carrinho_pasta,
    json_encode($carrinho, JSON_PRETTY_PRINT)
);

?>