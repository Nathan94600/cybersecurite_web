<?php
$env = parse_ini_file('.env');

// Create connection
$conn = new mysqli($env["SERVERNAME"], $env["USERNAME"], $env["PASSWORD"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$query = "CREATE DATABASE IF NOT EXISTS {$env["DATABASE"]}";
$conn->query($query);

$query = "USE {$env["DATABASE"]}";
$conn->query($query);

$query = "CREATE TABLE IF NOT EXISTS user (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, email VARCHAR(255), password VARCHAR(255))";
$conn->query($query);

$query = "INSERT INTO user (email, password) VALUES ('johndoe@gmail.com', 'yellowstone')";
$conn->query($query);

$conn->close();