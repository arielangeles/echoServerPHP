<?php

// Set variables
$host = "localhost";
$port = 1234;

// No timeout
set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");

$socket_binded = socket_bind($socket, $host, $port) or die("Could not bind socket to port\n");

$socket_listened = socket_listen($socket, SOMAXCONN) or die("Could not set up socket listener\n");

$socket_accepted = socket_accept($socket) or die("Could not accept socket\n");
do{
    $input = socket_read($socket_accepted, 1024) or die("Could not read socket input\n");

    $input = trim($input);

    echo "Client message: ", $input, PHP_EOL;

    socket_write($socket_accepted, $input, strlen($input)) or die("Could not write socket input\n");
    
}while(true);

socket_close($socket_accepted);
socket_close($socket);

?>