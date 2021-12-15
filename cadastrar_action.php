<?php 

require('./bd/conexao.php');


$nome = filter_input(INPUT_POST, 'nome');
$valor = filter_input(INPUT_POST, 'valor');
$perecivel = filter_input(INPUT_POST, 'perecivel');
$categoria = filter_input(INPUT_POST, 'categoria');


if ($nome && $valor) {

    $sql = $pdo->prepare( "SELECT FROM produto WHERE nome = :nome" );
    $sql->bindValue(":nome", $nome);
    
    if ($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO produto (nome, valor, perecivel, categoria) VALUES (:nome, :valor, :perecivel, :categoria)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':perecivel', $perecivel);
        $sql->bindValue(':categoria', $categoria);

        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        
        header("Location: index.php");
        exit;
    }

} else {
    echo ($nome);
    echo ($valor);
    echo ($perecivel);
    echo ($categoria);
    
    
}