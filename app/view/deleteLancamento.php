<?php
include_once '../config/config.php';
include_once '../config/connection.php';

$id = filter_input(INPUT_POST, FILTER_DEFAULT);

if (!empty($id)) {
    $query = "DELETE FROM lancamentos WHERE id =". $id;
    mysqli_query($conn, $query);
}