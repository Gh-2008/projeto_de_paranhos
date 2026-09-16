<?php

include "../login/banco/cons.php";
require_once "../login/banco/DLL.php";

session_start();

if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] !== 'LOGADO') {
    header("Location: ../login/login.php");
    exit;
}

if (!isset($_SESSION['ID_USU'])) {
    echo "Usuário não identificado.";
    exit;
}

$_SESSION['COMPRA'] = "NAO";

$id_usu = (int) $_SESSION['ID_USU'];

$consulta_carrinho = "
    SELECT Id
    FROM carrinhos
    WHERE Usuario_id = '$id_usu'
    LIMIT 1
";

$resultado_carrinho = banco(
    $server,
    $user,
    $password,
    $db,
    $consulta_carrinho
);

if (!$resultado_carrinho) {
    echo "Erro ao buscar o carrinho.";
    exit;
}

$carrinho = $resultado_carrinho->fetch_assoc();

if (!$carrinho) {
    echo "Carrinho não encontrado.";
    exit;
}

$carrinho_id = (int) $carrinho['Id'];

$consulta_itens = "
    SELECT
        ci.Produto_id,
        ci.Quantidade,
        p.Preco
    FROM carrinho_itens AS ci
    INNER JOIN produtos AS p
        ON p.Id = ci.Produto_id
    WHERE ci.Carrinho_id = '$carrinho_id'
";

$resultado_itens = banco(
    $server,
    $user,
    $password,
    $db,
    $consulta_itens
);

if (!$resultado_itens) {
    echo "Erro ao buscar os itens do carrinho.";
    exit;
}

$val_comp = 0;

while ($item = $resultado_itens->fetch_assoc()) {
    $quantidade = (int) $item['Quantidade'];
    $preco_unitario = (float) $item['Preco'];

    $val_comp += $quantidade * $preco_unitario;
}

date_default_timezone_set("America/Sao_Paulo");

$data_atual = date("Y-m-d H:i:s");

$inserir_compra = "
    INSERT INTO compras
        (Usuario_id, Data_compra, Valor_total, Status_compra)
    VALUES
        ('$id_usu', '$data_atual', '$val_comp', 'Aprovado')
";

$resultado_compra = banco(
    $server,
    $user,
    $password,
    $db,
    $inserir_compra
);

if (!$resultado_compra) {
    echo "Erro ao registrar a compra.";
    exit;
}

$_SESSION['COMPRA'] = "SIM";

echo "Compra registrada com sucesso.";
sleep(4);
header("Location: ../loja_logado/index.php");

?>