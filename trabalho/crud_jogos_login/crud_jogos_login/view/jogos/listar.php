<?php

require_once(__DIR__ . "/../../controller/JogoController.php");

//Buscar os jogos -> origem: base de dados
$jogoCont = new JogoController();
$jogos = $jogoCont->listar();

//Inclui o cabeçalho da página
require_once(__DIR__ . "/../include/header.php");

require_once(__DIR__ . "/../include/menu.php");
?>

<h3>Listagem de jogos</h3>

<a href="inserir.php" class="btn btn-primary">Inserir</a>

<table class="table table-striped mt-3">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ano</th>
        <th>Multiplayer</th>
        <th>Gênero</th>
        <th>Classificação</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach($jogos as $j): ?>
        <tr>
            <td><?= $j->getId() ?></td>
            <td><?= $j->getNome() ?></td>
            <td><?= $j->getAno() ?></td>
            <td><?= $j->getMultiplayerDesc() ?></td>
            <td><?= $j->getGenero() ?></td>
            <td><?= $j->getClassificacao() ?></td>
            <td>
                <a href="alterar.php?id=<?= $j->getId() ?>">
                    <img src="../../img/btn_editar.png" alt="">
                </a>    
            </td>
            <td>
                <a href="excluir.php?id=<?= $j->getId() ?>"
                    onclick="return confirm('Cofirma a exclusão?');" >
                    <img src="../../img/btn_excluir.png" alt="">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    

</table>


<?php
//Inclui o rodapé da página
require_once(__DIR__ . "/../include/footer.php");
?>
