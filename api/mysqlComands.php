<?php


function insertClient($name, $user, $password){
    $connection = connectDb();
    $sql =  "INSERT INTO client(name, user, password) VALUES ('$name', '$user', '$password')";

    $stmt = $connection->prepare($sql);
    mysqli_stmt_execute($stmt);
    
}

function selectClient($user, $password)
{
    $connection = connectDb();
    
    $sql =  "SELECT * FROM client WHERE user = '$user' AND password = '$password' ";

    $query = mysqli_query($connection, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    return $result;
}

function selectFruits()
{
    $connection = connectDb();

    $sql =  "SELECT * FROM fruits";

    $query = mysqli_query($connection, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    return $result;
}


function insertTransaction($idFruit, $idClient, $quantityFruit){
    $connection = connectDb();
    $sql =  "INSERT INTO transactions(id_fruit, id_client, quantityFruits) VALUES ($idFruit, $idClient, $quantityFruit)";

    $stmt = $connection->prepare($sql);
    mysqli_stmt_execute($stmt);
    
}


function selectTransaction($idClient)
{
    $connection = connectDb();

    $sql =  "SELECT transactions.id, transactions.id_fruit, transactions.quantityFruits, fruits.name, fruits.value FROM transactions LEFT JOIN fruits on(fruits.id = transactions.id_fruit) where id_client = $idClient";

    $query = mysqli_query($connection, $sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    return $result;
}

function deleteTransaction($id_transaction,$id_client)
{
    $connection = connectDb();
    $sql =  "DELETE FROM transactions WHERE id = $id_transaction and id_client = $id_client";

    $stmt = $connection->prepare($sql);
    mysqli_stmt_execute($stmt);
}




function connectDb(){
    $connection = new mysqli(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_NAME);

    if($connection->connect_error){
        $result = [
            "success" => false,
            "error" => "Não foi possível se conectar ao banco de dados"
        ];
        http_response_code(500);
        die(json_encode($result));
    }else{
        return $connection;
    }
}

?>