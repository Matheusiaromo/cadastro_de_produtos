<?php

require("./bd/conexao.php");

$produto = [];

$id = filter_input(INPUT_GET, 'id');

if ( $id ) {
    $sql = $pdo->prepare("SELECT * FROM produto WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ( $sql->rowCount() > 0 ) {
        $produto = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>

<!-- Modal edit-->
 
<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Editar produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <form method="POST" action="editar_action.php">

                <input type="hidden" name='id' value="<?= $produto['id']; ?>">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?= $produto['nome']; ?>">
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">valor</label>
                    <input type="number" class="form-control" name="valor" step=".01" id="valor" value="<?= $produto['valor']; ?>">
                </div>
                <label for="" class="mb-2 form-label">Perecível</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="perecivel" value="1" <?php if ($produto['perecivel'] == '1') {echo ' checked ';} ?> id="true">
                    <label class="form-check-label" for="true">
                        Sim
                    </label>    
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="perecivel" value="0"  <?php if ($produto['perecivel'] == '0') {echo ' checked ';} ?> id="false">
                    <label class="form-check-label" for="false">
                        Não
                    </label>
                </div>
                <label for="" class="mb-2 mt-3 form-label">Categoria</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria" value="alimentacao" <?php if ($produto['categoria'] == 'alimentacao') {echo ' checked ';} ?> id="alimentacao">
                    <label class="form-check-label" for="alimentacao">
                        Alimentação
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria" value="vestimenta" <?php if ($produto['categoria'] == 'vestimenta') {echo ' checked ';} ?> id="vestimenta">
                    <label class="form-check-label" for="vestimenta">
                        Vestimenta
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria" value="outros" <?php if ($produto['categoria'] == 'outros') {echo ' checked ';} ?> id="outros">
                    <label class="form-check-label" for="outros">
                        Outros
                    </label>
                </div>
                
                <button type="submit" nome="editar" class="btn btn-primary mt-3">Cadastrar</button>
            </form>


        </div>
        
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>