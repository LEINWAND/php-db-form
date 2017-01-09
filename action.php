<?php

$post_action = isset($_POST['action']) && ! empty($_POST['action']) ? $_POST['action'] : null;

if ( ! is_null($post_action)) {
  switch ($post_action) {
    case 'add_email':
      $address = isset($_POST['email']) && ! empty($_POST['email']) ? $_POST['email'] : null;
      if ( ! is_null($address)) {
        add_email($address);
      } else {
        show_index('invalid email address !');
      }
      break;
    default:
      show_index();
      break;
  }
} else {
  show_index();
}


/// functions

function add_email() {
  // connect to database (NOTE: configure as needed)
  $host = 'localhost';
  $db = 'php-db-form';
  $user = 'root';
  $pass = 'root';

  $pdo = new PDO("pgsql:host=$host;port=8889;dbname=$db;user=$user;password=$pass");

  $stmt = $pdo->prepare('INSERT INTO emails (address, created_at) VALUES (:address, :created_at)');
  // $stmt->bindParam(':address', );

  // create prepared statement, save to db

  show_index();
}

function show_index($msg = null) {
  if ( is_null($msg)) {
    header('Location: index.php');
  } else {
    header('Location: index.php?error' . $msg);
  }
}
