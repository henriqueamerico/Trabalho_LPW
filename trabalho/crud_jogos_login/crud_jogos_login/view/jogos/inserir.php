<?php

require_once(__DIR__ . "/../../model/Jogo.php");
require_once(__DIR__ . "/../../model/Genero.php");
require_once(__DIR__ . "/../../model/Classificacao.php");
require_once(__DIR__ . "/../../controller/JogoController.php");

$msgErro = "";
$jogo = NULL;

//Verificação: formulário já foi submetido?
if(isset($_POST['nome'])) {
    //1- Capturar os dados preenchidos no formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $ano = is_numeric($_POST['ano']) ? $_POST['ano'] : NULL;
    $multi = trim($_POST['multiplayer']) ? trim($_POST['multiplayer']) : NULL;
    $idGenero = is_numeric($_POST['genero']) ? $_POST['genero'] : NULL;
    $idClassificacao = is_numeric($_POST['classificacao']) ? $_POST['classificacao'] : NULL;

    //2- Criar um objeto Jogo para persistí-lo
    $jogo = new Jogo();
    $jogo->setId(0);
    $jogo->setNome($nome);
    $jogo->setAno($ano);
    $jogo->setMultiplayer($multi);

    $genero = new Genero();
    $genero->setId($idGenero);
    $jogo->setGenero($genero);

    $classificacao = new Classificacao();
    $classificacao->setId($idClassificacao);
    $jogo->setClassificacao($classificacao);

    //3- Validar os dados
    //4- Persistir o objeto
    $jogoCont = new JogoController();
    $erros = $jogoCont->inserir($jogo);

    if(empty($erros)) 
        header("location: listar.php");
    else
        $msgErro = implode("<br>", $erros);
}

require_once(__DIR__ . "/form.php");
?>
