<?php

session_start();

include_once('./config.php');

$id = $_GET['id'];

$query_delete = "DELETE FROM usuario WHERE id={$id}";

if ($conexao->query($query_delete) === TRUE) {
    echo "Record deleted successfully";
    header("Location: ./?p=admin");
} else {
    echo "Error deleting record: " . $conexao->error;
}