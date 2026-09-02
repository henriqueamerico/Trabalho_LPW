<?php
require_once(__DIR__ . "/util/config.php");

require_once(__DIR__ . "/view/include/header.php");
require_once(__DIR__ . "/view/include/menu.php");
?>


<div class="row mt-3 justify-content-center">
    <div class="col-3">
        <div class="card text-center">
            <img class="card-image-top mx-auto"
                src="img/polystation.jpg"
                style="max-width: 100%; height: auto;" />

            <div class="card-body">
                <h5 class="card-title">Jogos</h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/jogos/listar.php" 
                            class="card-link">
                        Listagem de Jogos</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<?php
require_once(__DIR__ . "/view/include/footer.php");
?>
