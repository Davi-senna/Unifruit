<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once('config.php');
require_once('mysqlComands.php');


try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
    }


    if (isset($data["name"]) && isset($data["user"]) && isset($data["password"]) && isset($data["token"])) {

        if ($data["token"] == 'd2f8a1e0b7c3c9e4b6a5') {

            insertClient($data["name"], $data["user"], $data["password"]);

            $client = selectClient($data["user"], $data["password"]);

            if(count($client) != 0){

                $result = [
                    "success" => true,
                    "message" => "Registro inserido com sucesso",
                    "data" => $client
                ];
                http_response_code(200);
                die(json_encode($result));
            } else {
                $result = [
                    "success" => false,
                    "message" => "Credenciais inválidas"
                ];
                http_response_code(401);
                die(json_encode($result));
            }

            http_response_code(200);
            die(json_encode($result));

        } else {
            $result = [
                "success" => false,
                "message" => "Credenciais inválidas"
            ];
            http_response_code(401);
            die(json_encode($result));
        }
    } else {
        $result = [
            "success" => false,
            "message" => "Algum parâmetro obrigatório não foi enviado."
        ];
        http_response_code(400);
        die(json_encode($result));
    }
    
} catch (Exception $e) {
    $result = [
        "success" => false,
        "message" => $e->getMessage()
    ];
    http_response_code(500);
    die(json_encode($result));
}