<?php

require_once(__DIR__ . "/../../controller/JogoController.php");

$msgErro = "";
$jogo = NULL;

$jogoCont = new JogoController();

//Verificação se o usuário já clicou no gravar
if(isset($_POST['nome'])) {
    //Atualizar os dados do jogo no banco de dados
    
    //1- Capturar os dados preenchidos no formulário
    $id = $_POST["id"];
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $ano = is_numeric($_POST['ano']) ? $_POST['ano'] : NULL;
    $multi = trim($_POST['multiplayer']) ? trim($_POST['multiplayer']) : NULL;
    $idGenero = is_numeric($_POST['genero']) ? $_POST['genero'] : NULL;
    $idClassificacao = is_numeric($_POST['classificacao']) ? $_POST['classificacao'] : NULL;

    //2- Criar um objeto Jogo para persistí-lo
    $jogo = new Jogo();
    $jogo->setId($id);
    $jogo->setNome($nome);
    $jogo->setAno($ano);
    $jogo->setMultiplayer($multi);

    $genero = new Genero();
    $genero->setId($idGenero);
    $jogo->setGenero($genero);

    $classificacao = new Classificacao();
    $classificacao->setId($idClassificacao);
    $jogo->setClassificacao($classificacao);

    //3- Validar os dados e salvar no banco
    $erros = $jogoCont->alterar($jogo);
    
    if(empty($erros)) 
        header("location: listar.php");
    else
        $msgErro = implode("<br>", $erros);
} else {
    //Carregar os dados do jogo a ser alterado
    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];
    
    $jogo = $jogoCont->buscarPorId($id);
    if(! $jogo) {
        echo "ID do jogo inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>"; 
        exit;
    }
}

require_once(__DIR__ . "/form.php");
