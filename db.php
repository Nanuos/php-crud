<?php

session_start();

$conn = mysqli_connect(
'localhost',
'root',
'',
'PHPCRUD',
);

if (isset($conn)) {
    echo 'DB is connected';
}

?>