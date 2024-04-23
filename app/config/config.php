<?php
//EXIBIR MENSAGEM DE ALERTA DE ERRO EM TELA

ob_start();

ini_set('display_errors', true);

date_default_timezone_set('America/Sao_Paulo');

//CONSTANTES GLOBAIS
//CONSTANTES COM O ENDEREÇO DA APLICAÇÃO
define("URL", "http://localhost/financas");

//CONSTANTES COM O ENDEREÇO DA APLICAÇÃO MÓDULO ADMIN
define("URLADMIN", "http://localhost/financas/admin");

//CONSTANTE COM O E-MAIL DO ADMINISTRADOR DA APLICAÇÃO
define("EMAIL", "rrubens.meirelles@gmail.com.br");

//CONSTANTES DE CONEXÃO COM O BANCO DE DADOS
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'financas');
define('PORT', 3306);

// try{
//     $conexao = new PDO('mysql:host=localhost;dbname=cake_blog', 'root', '');
//     $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $erro) {
//     echo "Erro => ". $erro->getMessage();
// }