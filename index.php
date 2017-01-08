<?php # @author iosif miclaus

// connect to database

// select data from database

$data = ['some@email.com', 'office@email.org'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Database Form</title>
</head>
<body>
  <h1>Database Form</h1>
  <form method="post" action="action.php">
    <input 
      type="email" 
      name="email" 
      placeholder="Type your email address"
    />
    <input 
      type="submit"
      name="save_email"
      value="Save"
     />
  </form>
  
  <h2>Email addresses</h2>
  <div>
    <?php
      foreach ($data as $key => $email) {
        ?><div class="field"><?php 
          echo $email; 
        ?></div><?php
      }
    ?>
  </div>
</body>
</html>
