<?php

$post_action = isset($_POST['action']) && ! empty($_POST['action']) ? $_POST['action'] : null;

if ( ! is_null($post_action)) {
  switch ($post_action) {
    case 'add':
      $address = isset($_POST['email']) ? trim($_POST['email']) : '';
      $address = ! empty($address) ? $address : null;
      
      if ( ! is_null($address)) {
        add_email($address);
      } else {
        show_index('invalid email address !');
      }
      break;
    default:
      show_index('unknown action');
      break;
  }
} else {
  show_index('no action triggered !');
}


/// functions

function add_email($address) {
  require_once 'config.php';

  // connect to mysql database
  try {
    $dns = 'mysql:host=' . HOST . ';dbname=' . DB;
    $pdo = new PDO($dns, USER, PASS);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    show_index('mysql connection failed: ' . $e->getMessage());
  }

  // insert into database
  $timestamp = time();
  $stmt = $pdo->prepare('INSERT INTO emails (address, created_at) VALUES (:address, :created_at)');
  $stmt->bindParam(':address', $address, PDO::PARAM_STR);
  $stmt->bindParam(':created_at', $timestamp, PDO::PARAM_INT);
  $inserted = $stmt->execute();

  if ($inserted) {
    show_index();
  } else {
    show_index('something went wrong, please try again!');
  }
}


function show_index($msg = null) {
  if ( is_null($msg)) {
    header('Location: index.php');
  } else {
    header('Location: index.php?error' . $msg);
  }
}
