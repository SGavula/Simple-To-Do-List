<?php

  include("php/db.php");

  $notes = "";

  $sql = "SELECT id, note FROM notes";

  $result = mysqli_query($db, $sql);

  $notes = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

    <div class="container">

      <form class="submit-form" action="php/add.php" method="post">
        <input type="text" id="text" name="message" placeholder="Here, you can write your task">
        <p class="warning"></p>
        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
      </form>

      <div class="notes">

        <?php foreach ($notes as $note): ?>
          <div class="note row">
            <p class="col s11"><?php echo $note["note"] ?></p>
            <a class="col s1" href="">  <i class="material-icons">close</i></a>
          </div>
         <?php endforeach; ?>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
