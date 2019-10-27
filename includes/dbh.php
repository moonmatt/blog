<?php

// This file should be included in every page where the database is used

$dbServername = "***"; // Your database ip
$dbUsername = "***"; // Your database username
$dbPassword = "***"; // Your database password
$dbName = "blog"; // Your database table
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); // The connection to the db