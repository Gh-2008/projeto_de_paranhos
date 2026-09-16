<?php

include "../login/banco/cons.php";
require_once "../login/banco/DLL.php";

extract($_POST);

if (!isset($_SESSION))
    SESSION_START();

if (isset($cad)) {
    if (
        $nome != ""
        && $cpf != ""
        && $email != ""
        && $cidade != "" &&
        $estado != "" &&
        $cep != "" &&
        $senha != "" &&
        $confirmarsenha != ""
    ) {
        $nome = preg_replace('/\s+/', ' ', trim($nome));
        if (strpos($nome, " ")) {
            $nome = str_replace(" ", "space", $nome);
            $nome_liberado = true;
        } else {
            $nome_liberado = false;
        }

        /* nome */

        if (!ctype_alpha($nome)) {
            echo "Nome incompatível, apenas letras";
            $error_nome = true;
        } else if (!$nome_liberado) {
            echo "Digite o nome completo, ex: José Gabriel da Silva";
            $error_nome = true;
        } else {
            $error_nome = false;
            $nome = str_replace("space", " ", $nome);
            $nome = mb_convert_case($nome, MB_CASE_TITLE, "UTF-8");
            $nome = str_replace(
                [" Da ", " De ", " Do ", " Dos ", " Das ", " E "],
                [" da ", " de ", " do ", " dos ", " das ", " e "],
                $nome
            );
        }


        /* email */

        if (isset($email)) {
            if ($error_nome) {
                exit;
            }
            $email = trim($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $consulta = "SELECT * FROM usuario WHERE  Email = '$email'";
                $resultado = banco($server, $user, $password, $db, $consulta);

                if ($resultado->num_rows == 0) {
                    $error_email = false;
                } else {
                    $error_email = true;
                    echo "já existe outra conta com este email <br>";
                }
            } else {
                $error_email = true;
                echo "email inválido <br>";
            }
        }
        /* cpf */

        if (isset($cpf)) {
            if ($error_nome || $error_email) {
                exit;
            }
            $cpf = preg_replace(['/\.+/', '/\s+/', '/\-+/'], '', trim($cpf));
            if (strlen($cpf) == 11) {

                $consulta = "SELECT * FROM usuario WHERE  Cpf = '$cpf'";
                $resultado = banco($server, $user, $password, $db, $consulta);

                if (($resultado->num_rows == 0)) {

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
                    echo "CPF já cadastrado";
                }
            } else {
                $error_cpf = true;
                echo "cpf incorreto <br>";
            }
        }

        if (isset($estado)) {
            if ($error_nome || $error_email || $error_email)
                $estado = preg_replace(['/\s/', '/\d/'], '', trim($estado));

            if (strlen($estado) == 2) {
                $error_estado = false;
            } else {
                $error_estado = true;
                echo "Estado inválido";
                exit;
            }
        }

        if (isset($cidade)) {
            if ($error_nome || $error_email || $error_cpf || $error_estado) {
                exit;
            }

            $cidade = preg_replace('/\s/', ' ', trim($cidade));
            $cidade = preg_replace('/\d/', '', trim($cidade));
            $dados = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"), true);

            if (
                mb_strtoupper(trim($estado), "UTF-8") !== $dados["uf"] ||
                mb_strtolower(trim($cidade), "UTF-8") !== mb_strtolower($dados["localidade"], "UTF-8")
            ) {
                $error_cidade = true;
                echo "Cidade ou estado incompatíveis com o CEP.";
                exit;
            } else {
                $error_cidade = false;
            }
        }

        if (isset($bairro)) {
            if ($error_nome || $error_email || $error_cpf || $error_estado || $error_cidade) {
                exit;
            }

            $bairro = preg_replace('/\d+/', '', trim($bairro));
            $bairro = preg_replace('/\s+/', ' ', trim($bairro));
            $dados = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"), true);

            if (
                mb_strtolower($bairro, "UTF-8") !== mb_strtolower($dados["bairro"])
            ) {
                $error_bairro = true;
                echo "Bairro não compatível com o cep";
                exit;
            } else {
                $error_bairro = false;
            }
        }
        if (isset($rua)) {
            if ($error_nome || $error_email || $error_cpf || $error_estado || $error_cidade || $error_bairro) {
                exit;
            }
            $rua = preg_replace('/\s+/', ' ', trim($rua));
            $dados = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"), true);

            if (
                mb_strtolower($rua, "UTF-8") !== mb_strtolower($dados["logradouro"])
            ) {
                $error_rua = true;
                echo "rua não compatível com o cep";
                exit;
            } else {
                $error_rua = false;
            }
        }

        if (isset($numero)) {
            if ($error_nome || $error_email || $error_cpf || $error_estado || $error_cidade || $error_bairro || $error_rua) {
                exit;
            }
            if (ctype_digit($numero)) {
                $error_numero = false;
            } else {
                $error_numero = true;
                echo "Digite um número no campo número";
                exit;
            }
        }

        if (isset($cep)) {
            if ($error_nome || $error_email || $error_cpf || $error_estado || $error_cidade || $error_bairro || $error_rua || $error_numero) {
                exit;
            }
            $cep = preg_replace(['/\D/', '/\s/'], '', trim($cep));

            if (strlen($cep) != 8) {
                echo "Cep inválido";
                exit;
            } else {
                $url = "https://viacep.com.br/ws/$cep/json/";
                $resposta = file_get_contents($url);
                $dados = json_decode($resposta, true);

                if (isset($dados["erro"])) {
                    $error_cep = true;
                    echo "CEP inexistente.";
                    exit;
                }

                $error_cep = false;

            }
        }

        if (isset($senha)) {
            if (strlen($senha) >= 8) {
                if ($senha == $confirmarsenha) {
                    if (ctype_alnum($senha)) {
                        $options = [
                            "memory_cost" => 65536, //64 mb de consumo
                            "time_cost" => 3, // numero de vezes que o algoritmo é 'montado' e 'desmontado'
                            "threads" => 4, // numero de núcleos ocupados
                        ];

                        $pass = password_hash($senha, PASSWORD_ARGON2ID, $options);

                        $consulta = "INSERT INTO usuario (Nome, Email, Cpf, Estado, Cidade, Cep, Bairro, Rua, Numero, Senha) VALUES ( '$nome', '$email', '$cpf', '$estado', '$cidade', '$cep', '$bairro', '$rua', '$numero', '$pass')";
                        banco($server, $user, $password, $db, $consulta);

                        $consulta_id_usuario = "SELECT * FROM usuario WHERE  Cpf = '$cpf'";
                        $resultado_usuario = banco($server, $user, $password, $db, $consulta_id_usuario);
                        $linha_usuario = $resultado_usuario->fetch_assoc();
                        $linha_id_usuario = $linha_usuario['Id'];

                        date_default_timezone_set("America/Sao_Paulo");
                        $data_moment = date("Y-m-d H:i:s");

                        $inseir_carrinhos = "INSERT INTO carrinhos (Usuario_id, Criado_em) VALUES ('$linha_id_usuario', '$data_moment')";
                        banco($server, $user, $password, $db, $inseir_carrinhos);

                        $consulta_carrinhos = "SELECT Id FROM carrinhos WHERE  Usuario_id = '$linha_id_usuario'";
                        $resultado_carrinhos = banco($server, $user, $password, $db, $consulta_carrinhos);
                        $linha_carrinhos = $resultado_carrinhos->fetch_assoc();
                        $linha_id_carrinhos = $linha_carrinhos['Id'];

                        $carrinho = json_decode($carrinho_escondido, true);
                        $ids = array_keys($carrinho);


                        for ($i = 0; $i < count($carrinho); $i++) {
                            $produto_id = $ids[$i];
                            $produto_qtd  = $carrinho[$ids[$i]];

                            $inserir_itens_no_carrinho = "INSERT INTO carrinho_itens (Carrinho_id, Produto_id, Quantidade) VALUES ($linha_id_carrinhos, '$produto_id', '$produto_qtd')";
                            banco($server, $user, $password, $db, $inserir_itens_no_carrinho);
                        }



                        echo "Cadastrado " . $ids[0];
                        exit;
                    } else {
                        echo "senha incorreta <br>";
                        exit;
                    }
                } else {
                    echo "senha s diferentes <br>";
                    exit;
                }


            } else {
                echo "senha de No mínimo 8 dígitos <br>";
                exit;
            }
        }
    } else {
        echo "Preencha os campos";
        exit;
    }

}