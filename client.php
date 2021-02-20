<?php

// Set variables
$host = "localhost";
$port = 1234;

// No timeout
set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");

socket_connect($socket, $host, $port) or die("Could not connect to socket\n");

do{
    $message = readline("Enter a message: ");

    socket_write($socket, $message, strlen($message)) or die("Could not write message input\n");

    $output = socket_read($socket, 1024) or die("Could not read socket message from server\n");

    echo "Reply from server: ", $output, PHP_EOL;
}while(true);

socket_close($socket);

?>