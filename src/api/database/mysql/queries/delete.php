<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: DELETE");

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/utils.php';

function delete(string $query, array $args): array
{
    try {
        $connection = connection();
        if ($error = modifyRecords($query, $args, $connection)) {
            return ['deleted' => false, 'error' => $error];
        }
        $connection->close();
        return ['deleted' => true, 'error' => null];
    } catch (mysqli_sql_exception $exception) {
        return ['deleted' => false, 'error' => $exception->getMessage()];
    }
}

// $json_str = file_get_contents('php://input');
// $data = json_decode($json_str) ?? $_POST;
