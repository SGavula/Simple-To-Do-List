<?php

  //Import database from separated file
  include("php/db.php");

  //Declarated variable notes
  $notes = "";

  //Declarated sql command
  $sql = "SELECT id, note FROM notes";

  //Connect to databse and performs a query on the database
  $result = mysqli_query($db, $sql);

  //Saved data from database to variable notes
  $notes = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your favorite task list</title>
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
        <div class="input-field">
          <input type="text" id="text" name="message" class="validate">
          <label for="text">Here, you can write your task</label>
        </div>
        <p class="warning"></p>
        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
      </form>

      <div class="notes">

        <!-- Listed all data (notes) from notes to html elements -->
        <?php foreach ($notes as $note): ?>
          <div class="note row">
            <p class="col s12 m11"><?php echo $note["note"] ?></p>
            <a class="col s12 m1" href="">  <i class="material-icons">close</i></a>
          </div>
         <?php endforeach; ?>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Ajax script -->
    <script src="js/ajax.js"></script>
    <!-- Script for frontend -->
    <script src="js/script.js"></script>
  </body>
</html>
