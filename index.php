<?php

require_once 'config.php';

$error = isset($_GET['error']) && ! empty($_GET['error']) ? $_GET['error'] : null;

// connect to mysql database
try {
  $dns = 'mysql:host=' . HOST . ';dbname=' . DB;
  $pdo = new PDO($dns, USER, PASS);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo '<p style="color:red">mysql connection failed: ' . $e->getMessage() . '</p>';
  echo '<p>try to refresh</p>';
}

// select data from database
$stmt = $pdo->prepare('SELECT * from emails ORDER BY created_at DESC');
$stmt->execute();

$emails = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Database Form</title>

  <style>
    .DBForm,
    .Fields {
      border: 2px solid #222;
      border-radius: 2px;
    }

    .DBForm {
      padding: 1rem;
    }
    .DBForm .input {
      width: 222px;
    }

    .Error {
      color: tomato;
      margin-top: 0.6rem;
    }

    .Fields .field {
      border-bottom: 1px solid #222;
      padding: 1rem;
    }
  </style>
</head>
<body>
  <h1>Database Form</h1>
  <form
    method="post"
    action="action.php"
    class="DBForm"
  >
    <input
      type="email"
      name="email"
      placeholder="Type your email address"
      class="input"
    />
    <input
      type="submit"
      name="action"
      value="add"
     />
  </form>

  <div class="Error">
    <?php if ( ! is_null($error)) echo 'error: ' . $error; ?>
  </div>

  <h2>Email addresses</h2>
  <div class="Fields">
    <?php
      foreach ($emails as $key => $email) {
        ?><div class="field"><?php
          $created_date = date('d.m.Y', $email['created_at']);
          echo $created_date . ' – ' . $email['address'];
        ?></div><?php
      }
    ?>
  </div>
</body>
</html>
