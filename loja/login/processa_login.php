<?php

include "../login/banco/cons.php";
require_once "../login/banco/DLL.php";

extract($_POST);

if (!isset($_SESSION)) {
    SESSION_START();
}

if (isset($btn_logar)) {
    if ($cpf == "" || $senha == "") {
        echo "Preencha os campos";
        exit;
    }
    if (isset($cpf)) {
        $cpf = preg_replace(['/\.+/', '/\s+/', '/\-+/'], '', trim($cpf));
        if (strlen($cpf) == 11) {

            $consulta = "SELECT * FROM usuario WHERE  Cpf = '$cpf'";
            $resultado = banco($server, $user, $password, $db, $consulta);

            if (($resultado->num_rows != 0)) {

                $cad_liberado = true;
                $cont = 10;
                $soma = 0;
                $resto = 0;

                for ($i = 0; $i < 9; $i++) {
                    $veri_1 = $cpf[$i] * $cont;
                    $cont -= 1;
                    $soma += $veri_1;
                }

                $resto = $soma % 11;

                if ($resto < 2) {
                    $digito_10 = 0;
                } else {
                    $digito_10 = 11 - $resto;
                }

                $cont_2 = 11;
                $soma_2 = 0;
                $resto_2 = 0;

                for ($i = 0; $i < 10; $i++) {
                    $veri_2 = $cpf[$i] * $cont_2;
                    $cont_2 -= 1;
                    $soma_2 += $veri_2;
                }

                $resto_2 = $soma_2 % 11;

                if ($resto_2 < 2) {
                    $digito_11 = 0;
                } else {
                    $digito_11 = 11 - $resto_2;
                }
                if ($cpf[9] == $digito_10 && $cpf[10] == $digito_11) {
                    $error_cpf = false;

                } else {
                    echo "cpf incorreto <br>";
                    $error_cpf = true;
                }
            } else {
                $error_cpf = true;
                echo "CPF não encontrado, cadastre-se";
            }
        } else {
            $error_cpf = true;
            echo "cpf incorreto <br>";
        }
    }

    if (isset($senha)) {
        if ($error_cpf) {
            exit;
        }
        if (strlen($senha) >= 8) {
            if (ctype_alnum($senha)) {
                $consulta = "SELECT * FROM usuario WHERE Cpf = '$cpf'";
                $resultado = banco($server, $user, $password, $db, $consulta);
                $resultado = $resultado->fetch_assoc();
                $senha_banco = $resultado['Senha'];
                $id_usu = $resultado['Id'];
                $nome_usu = $resultado['Nome'];


                if (password_verify($senha, $senha_banco)) {
                    $_SESSION['NOME_USU'] = $nome_usu;
                    $_SESSION['ID_USU'] = $id_usu;

                    $_SESSION["LOGADO"] = "LOGADO";
                    echo "REDIRECT:http://localhost/loja/loja_logado/index.php";
                    exit;
                } else {
                    $_SESSION["LOGADO"] = "NONE";
                    $_SESSION["COMPRA"] = "NONE";
                    echo "Senha incorreta";
                    exit;
                }

                echo "Logado";
                exit;
            } else {
                echo "senha incorreta <br>";
                exit;
            }

        } else {
            echo "senha de No mínimo 8 dígitos <br>";
            exit;
        }
    }
}

?>