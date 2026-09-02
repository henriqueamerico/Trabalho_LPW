<?php

require_once(__DIR__ . "/../../controller/JogoController.php");

//1- Receber o ID do jogo a ser excluído
//1.1- Validar o ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    //2- Proceder a exclusão chamando o JogoController
    $jogoCont = new JogoController();
    $erro = $jogoCont->excluir($id);

    if(! $erro) {
        //3- Redirecionar para a listagem
        header("location: listar.php");  
    } else {
        echo $erro;
        echo "<br><a href='listar.php'>Voltar</a>";
    }
    
    
} else {
    echo "ID do jogo não informado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}

