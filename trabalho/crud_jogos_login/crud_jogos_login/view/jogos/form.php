<?php

require_once(__DIR__ . "/../../controller/GeneroController.php");
require_once(__DIR__ . "/../../controller/ClassificacaoController.php");

$generoCont = new GeneroController();
$generos = $generoCont->listar();

$classificacaoCont = new ClassificacaoController();
$classificacoes = $classificacaoCont->listar();

require_once(__DIR__ . "/../include/header.php");

require_once(__DIR__ . "/../include/menu.php");
?>

<h3><?= $jogo && $jogo->getId() > 0 ? "Alterar" : "Inserir" ?> jogo</h3>

<div class="row">

    <div class="col-6">

        <form action="" method="POST">

            <div>
                <label for="txtNome" class="form-label">Nome: </label>
                <input type="text" id="txtNome" name="nome" 
                    placeholder="Informe o nome" 
                    class="form-control"
                    value="<?= $jogo ? $jogo->getNome() : '' ?>">
            </div>

            <div>
                <label for="txtAno" class="form-label">Ano de lançamento: </label>
                <input type="number" id="txtAno" name="ano" 
                    placeholder="Informe o ano" class="form-control"
                    value="<?= $jogo ? $jogo->getAno() : '' ?>">
            </div>

            <div>
                <label for="selMulti" class="form-label">Multiplayer: </label>
                <select name="multiplayer" id="selMulti" class="form-select">
                    <option value="">----Selecione-----</option>
                    <option value="S" <?= $jogo && $jogo->getMultiplayer() == 'S' ? 'selected' : '' ?> >
                        Sim</option>
                    <option value="N" <?= $jogo && $jogo->getMultiplayer() == 'N' ? 'selected' : '' ?> >
                        Não</option>
                </select>
            </div>

            <div>
                <label for="selGenero" class="form-label">Gênero: </label>
                <select name="genero" id="selGenero" class="form-select">
                    <option value="">----Selecione-----</option>

                    <!-- Gêneros criados de forma dinâmica -->
                    <?php foreach($generos as $g): ?>
                        <option value="<?= $g->getId() ?>"
                            <?php 
                                if($jogo && $jogo->getGenero()->getId() == $g->getId())
                                    echo "selected";
                            ?>
                        >
                        <?= $g ?></option>        
                    <?php endforeach; ?>    

                </select>
            </div>

            <div>
                <label for="selClassificacao" class="form-label">Classificação: </label>
                <select name="classificacao" id="selClassificacao" class="form-select">
                    <option value="">----Selecione-----</option>

                    <!-- Classificações criadas de forma dinâmica -->
                    <?php foreach($classificacoes as $c): ?>
                        <option value="<?= $c->getId() ?>"
                            <?php 
                                if($jogo && $jogo->getClassificacao()->getId() == $c->getId())
                                    echo "selected";
                            ?>
                        >
                        <?= $c ?></option>        
                    <?php endforeach; ?>    

                </select>
            </div>

            <div>
                <input type="hidden" name="id" 
                    value="<?= $jogo ? $jogo->getId() : 0 ?>">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gravar</button>
            </div>
        </form>

    </div> <!-- Fim div-col -->

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger mt-3">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>
    </div> <!-- Fim div-col -->

</div> <!-- Fim div-row -->

<a href="listar.php" class="btn btn-outline-secondary mt-3">Voltar</a>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
