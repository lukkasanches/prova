<?php
header("content-Type: application/json; charset=utf-8"); // define a resposta em json
header("Access-Control-Allow-Origin: *"); // permite qualquer origem de frontend ou apenas o dominio que usa
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // mwtodos que sao permitidos


// config do banco
$host = "localhost";
$user = "root";
$pass = "";
$db = "mercado";

// cria a conexao com o mysql/mariadb
$conn = new mysql($host, $user, $pass, $mercado);

// verifica erro
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error => "falha na coneção: " . $conn->connect_error"]);
    exit;
}

// essa linha detecta o metedo utilizado (post, get, delete ou put)
$method = $_SERVER['REQUEST_METHOD'];
