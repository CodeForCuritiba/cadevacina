<?php

// constantes com as credenciais de acesso ao banco MySQL
$host = "localhost:8889";
$user = "root";
$pass = "root";
$banco = "vacina";
$versao = "3.3.5";
define('DB_HOST', $host);
define('DB_USER', $user);
define('DB_PASS', $pass);
define('DB_NAME', $banco);

function dbcon()
{
    @mysql_connect($host, $user, $user) or die(mysql_error());
    @mysql_select_db($banco) or die(mysql_error());
}


ini_set('display_errors', true);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');
require_once 'functions.php';

?>