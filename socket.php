<?php 

error_reporting(E_ALL | E_NOTICE | E_STRICT);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// set some variables
$host = "192.168.10.25"; // server IP goes here
$port = 8500; // port thats listening goes here

// don't timeout!
set_time_limit(0);

// Create a TCP Stream socket
$sock = socket_create(AF_INET, SOCK_STREAM, 0);

// Bind the socket to an address/port
socket_bind($sock, $host, $port) or die('Could not bind to address ' . socket_last_error());

// Start listening for connections
socket_listen($sock);

// Accept incoming connections
$client = socket_accept($sock);

// Send message to user
$message = "This is a test message";
socket_write($client, $message);

// Read user input and loop until
// it says 'quit'
$messageback = socket_read($client, 1024);

echo $messageback;

// Close the client (child) socket
socket_close($client);

// Close the master sockets
socket_close($sock);

?>
