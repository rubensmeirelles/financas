<?php

try{
    $conexao = new PDO('mysql:host=localhost;dbname=cake_blog', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $erro) {
    echo "Erro => ". $erro->getMessage();
}