<?php

require('./bd/conexao.php');

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$valor = filter_input(INPUT_POST, 'valor');
$perecivel = filter_input(INPUT_POST, 'perecivel');
$categoria = filter_input(INPUT_POST, 'categoria');

if ($id && $nome && $valor && $categoria && $perecivel) {
    $sql = $pdo->prepare("UPDATE produto SET nome = :nome, valor = :valor, perecivel = :perecivel, categoria = :categoria WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":valor", $valor);
    $sql->bindValue(":perecivel", $perecivel);
    $sql->bindValue(":categoria", $categoria);

    $sql->execute();
    header("Location: index.php");
    exit();
} else {
    //header("Location: index.php");
   // exit();
   echo $id;
   echo $nome;
   echo $valor;
   echo $perecivel;
   echo $categoria;
}

