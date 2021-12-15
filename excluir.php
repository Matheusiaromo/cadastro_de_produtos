<?php


require("./bd/conexao.php");

$produto = [];

$id = filter_input(INPUT_GET, 'id');

if ( $id ) {
    $sql = $pdo->prepare("SELECT * FROM produto WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ( $sql->rowCount() > 0 ) {
        $sql = $pdo->prepare("DELETE FROM produto WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

?>