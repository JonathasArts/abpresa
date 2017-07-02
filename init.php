<?php
// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));
define('RAIZ_PATH', "/abpresa"); // pasta raiz da aplicação
 
// credenciais de acesso ao Banco MySQL
define('MYSQL_HOST', '127.0.0.1');
define('MYSQL_USER', 'postgres'); // usuario do banco
define('MYSQL_PASS', 'postgres'); // senha do banco
define('MYSQL_DBNAME', 'bd_abpresa'); // nome do banco
 
// configurações do PHP
ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');