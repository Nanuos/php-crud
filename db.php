<!-- CODIGO DE CONEXION A BD -->

<?php
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'phpcrud'
);

?>