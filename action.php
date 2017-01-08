<?php

$post_action = isset($_POST['action']) && ! empty($_POST['action'] ? $_POST['action'] : null;

if ( ! is_null($post_action)) {
  switch ($post_action) {
    case 'save_email': 
      save_email(); 
      break;
    default: 
      show_index();
      break;
  }
} else {
  show_index();
}


/// functions

function save_email() {
  // connect to database
  
  // create prepared statement, save to db
  
  show_index():
}

function show_index() {
  header('Location: index.php');
}
