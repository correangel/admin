<?php
$enlace = mysqli_connect("tresolu.com", "tresoluc_gobiern", "1256ard_._", "tresoluc_kineshub");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>