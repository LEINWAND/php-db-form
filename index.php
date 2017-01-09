<?php

// connect to database

// select data from database

$data = ['some@email.com', 'office@email.org'];

$error = isset($_GET['error']) && ! empty($_GET['error']) ? $_GET['error'] : null;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Database Form</title>

  <style>
    .DBForm {
      border: 2px solid #222;
      border-radius: 2px;
      padding: 1rem;
    }
    .DBForm .input {
      width: 222px;
    }
    .DBForm .error {
      color: tomato;
      padding-top: 0.4rem;
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
      name="add_email"
      value="add"
     />
     <div class="error">
       <?php echo $error; ?>
     </div>
  </form>

  <h2>Email addresses</h2>
  <div class="Fields">
    <?php
      foreach ($data as $key => $email) {
        ?><div class="field"><?php
          echo $key . ' – ' . $email;
        ?></div><?php
      }
    ?>
  </div>
</body>
</html>
