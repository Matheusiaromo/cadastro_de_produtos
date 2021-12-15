<?php 

require("./bd/conexao.php");

$lista = [];

$sql = $pdo->query('SELECT * FROM produto');

if ( $sql->rowCount() > 0 ) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Modal cadastro-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <?php include("form_cadastro.php") ?>
        </div>
        
        </div>
    </div>
    </div>

    
    <div class="container mt-5">
       
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 ">
    
                <h1 class="mb-3">Lista de produtos</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Cadastrar produto
                </button>               
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Perecível</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data/hora</th>
                        <th scope="col">Açoes</th>
                
                        </tr>
                    </thead>
                    <tbody>
            
                        <?php foreach($lista as $produto): ?>
                            <tr>
                                <td><?=$produto['id'];?></td>
                                <td><?=$produto['nome'];?></td>
                                <td><?=$produto['valor'];?></td>
                                <td><?=$produto['perecivel'];?></td>
                                <td><?=$produto['categoria'];?></td>
                                <td><?=$produto['dt_criacao'];?></td>
                                <td>
                                    <a href="editar.php?id=<?=$produto['id'];?>" class="btn btn-primary">Editar</a>
                                    <a href="excluir.php?id=<?=$produto['id'];?>" class="btn btn-danger">x</a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>