<?php

  //Import database from separated file
  include("db.php");

  //Fetch note from ajax and save it
  $note = $_POST["note"];

  //Declarated sql command
  $sql = "DELETE FROM notes WHERE note = '$note'";

  //Connect to databse and performs a query on the database
  $result = mysqli_query($db, $sql);

 ?>
