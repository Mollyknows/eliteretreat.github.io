<?php

require 'db_connect.php'; // Include your database connection file (if applicable)

$users = [
    ["username" => "Asmith", "plain_text_password" => "password"],
    ["username" => "FPugh", "plain_text_password" => "password"],
    ["username" => "JJones", "plain_text_password" => "password"],
    ["username" => "AHarris", "plain_text_password" => "password"],
    ["username" => "JArmor", "plain_text_password" => "password"],
  ];
  
  foreach ($users as $user) {
    $hashed_password = password_hash($user["plain_text_password"], PASSWORD_BCRYPT);
    echo "Username: " . $user["username"] . ", Hashed Password: " . $hashed_password . PHP_EOL;
  }
?>
